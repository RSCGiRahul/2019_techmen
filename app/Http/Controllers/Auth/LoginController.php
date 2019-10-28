<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   use AuthenticatesUsers;
    // use RegistersUsers;

    use VerifiesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
     protected $redirectTo = '/managment';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
    public function __construct()

    {

        $this->middleware('guest',['except' => ['getVerification', 'getVerificationError','logout']]);

    }
    /**
     * Redirect after authenticate
     * 
     */
    protected function validator(array $data)

    {

        return Validator::make($data, [

            'name' => 'required|string|max:255',

            'email' => 'required|string|email|max:255|unique:users',

            'password' => 'required|string|min:6|confirmed',

        ]);

    }

    public function register(Request $request)

    {

        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        UserVerification::generate($user);

        UserVerification::send($user, 'My Custom E-mail Subject');

        return back()->withAlert('Register successfully, please verify your email.');

    }

   public function login(Request $request)
   {
       //validate the fields....

       $credentials = [ 'email' => $request->email , 'password' => $request->password,'verified' =>1 ];
      
       if(Auth::attempt($credentials,$request->remember)){ // login attempt
            $roleId =  Auth::user()->firstRole()->id;
//            dd($roleId);
            if ($roleId == User::Admin_Level) {
                return redirect('/managment');
            } else if ($roleId == User::Manager_Level) {
                return redirect('/manager');
            }
            //  else if($roleId == User::Human_Resource){
            //     return redirect('/hr');
            // }else if($roleId == User::Executive){
            //     return redirect('/executive');
            // }else if($roleId == User::Technician){
            //     return redirect('/technician');
            // }
       }
       return Redirect::back()->withInput()->withFlashMessage('Wrong username/password combination.');

       //login failed...
   }
}
