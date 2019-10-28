<?php

namespace App\Http\Controllers\Managment;

use App\Http\Requests\UserRequest;
use App\Models\Region;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Jrean\UserVerification\Traits\VerifiesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Illuminate\Database\Eloquent\Builder;

use Auth;
use Illuminate\Support\Facades\Log;
// use trait\
class UserController extends Controller
{
    use RegistersUsers;
    use VerifiesUsers;

    public function index()
    {
       $users =  User::with('region')
               ->when(Auth::user()->firstRole()->id != User::Admin_Level,function ($query){
                           $query->whereHas('region', function($query){
                            return $query->whereIn('region_id', Auth::user()->region()->allRelatedIds());
                         });
               })->get();
        return View('managment.user.index', compact('users'));
    }

    public function create()
    {
        $allRole = Role::whereNotIn('id',[User::Admin_Level])
            ->when(Auth::user()->firstRole()->id == User::Manager_Level, function($query){
                return $query->whereIn('id', [User::Executive,User::Technician]);
            })
        ->pluck('display_name','id');
        
        $allRegion = Region::when(Auth::user()->firstRole()->id == User::Manager_Level, function($query){
            return $query->whereIn('id', [ User::find(Auth::user()->id)->region->pluck('id') ]);
        })->when(Auth::user()->firstRole()->id == User::Admin_Level, function($query){
            return $query->select('*');
        })->pluck( 'name', 'id');

        return View('managment.user.create',compact('allRole','allRegion'));
    }
    /*
     *params App\Http\Requests\UserRequest $request
     *return Redirect
     */

    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        try{
            $allRequest = $request->only('name', 'region', 'email', 'phone', 'role');
            $userData = array(
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'phone' => $request['phone']
                );
            $user =  User::create($userData);
            $user->roles()->sync($allRequest['role']);
            $user->region()->sync($allRequest['region']);

            UserVerification::generate($user);

           UserVerification::send($user, 'My Custom E-mail Subject');
           DB::commit();
            return redirect(route('managment.user.index'))->withAlert('Register successfully, please verify your email.');
        }catch (\Exception $e){
            // dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'Error Found');
        }

    }

    public function edit($id)
    {
       $user =  User::findOrFail($id);
       $allRole = Role::whereNotIn('id',[User::Admin_Level])->pluck('display_name','id');
       $allRegion = Region::all()->pluck('name','id');

                                                   
       return View('managment.user.edit', compact('user','allRole','allRegion'));
    }

    public function update(UserRequest $request, $id)
    {
        DB::beginTransaction();
        try{
            
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->roles->rold_id = $request['role'];
            $user->save();

            $user->roles()->sync( $request['role']);
            $user->region()->sync( $request['region']);
            DB::Commit();
            return redirect()->route('managment.user.index')->with('msg', 'Successfully Inserted');
        }catch(\Exception $e){
            dd($e);

            DB::rollBack();
            return redirect()->back()->with('error', 'Error Found');
        }
    }

    public function destroy($id)
    {
       $user =  User::findOrFail($id);
       $user->delete();
       $user->roles()->detach();
       $user->region()->detach();
       return redirect()->back()->with('success' , config('messages.delete'));
    }
}
