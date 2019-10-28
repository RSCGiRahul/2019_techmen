<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('hiii');
//        $this->middleware('guest');
        $this->middleware('guest',['except' => ['getVerification', 'getVerificationError']]);

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $token
     * @return \Illuminate\Http\Response
     */
    public function getVerification(Request $request, $token)
    {
       $userData =  User::where(['verification_token' => $token, 'verified' =>0])->first();
       if($userData){
        $email = $request->email;
        return View('auth.verify-account', compact('userData','token'));
       }	
       return redirect('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *Login after update account
     * @param  array  $token
     * @return \Illuminate\Http\Response
     */
    public function accountVerification(Request $request, $token)
    {

        $user =  User::where(['verification_token' => $token, 'verified' =>0])->first();
        if(!$user){
            return redirect('/');
        }
        $validator = Validator::make($request->toArray(), [
                    'password' => 'required|string|min:6|confirmed',
                ]);
        if ($validator->fails()) {
            return redirect('/');
        }        
        $user->verified = 1;
        $user->verification_token = NULL;
        $user->email_verified_at = Carbon::now();;
        $user->password =  bcrypt($request['password']);
        $user->save();
        Auth::login($user); 
         $roleId =  Auth::user()->firstRole()->id;
          if ($roleId == User::Admin_Level) {
                return redirect('/managment');
            } else if ($roleId == User::Manager_Level) {
                return redirect('/managment');
            }
            // else if($roleId == User::Human_Resource){
            //     return redirect('/hr');
            // }else if($roleId == User::Executive){
            //     return redirect('/executive');
            // }else if($roleId == User::Technician){
            //     return redirect('/technician');
            // }
        return redirect('/');     
    }
}
