<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use App\Mail\verifyCustomerMail;
use Mail;
use Carbon\Carbon;
class CustomerController extends Controller
{
    use AuthenticatesUsers;
    // use RegistersUsers;

    use VerifiesUsers;
	

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except' => ['getVerification', 'getVerificationError','logout']]);
    }


     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'required|unique:customers',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected  function register(Request $request)
    {
        $data =$this->validator($request->all())->validate();
        $customer =  Customer::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        UserVerification::generate( $customer);
        Mail::to($customer->email)->send(new verifyCustomerMail($customer));
        return back()->withAlert('Register successfully, please verify your email.');

    }

    public function verifyCustomer($token)
    {
        $verifyUser = Customer::where('verification_token', $token)->first();
        if(isset($verifyUser) ){
            // $user = $verifyUser->user;
            // if(!$verifyUser) {
                $verifyUser->verified = 1;
                $verifyUser->email_verified_at = Carbon::now();;
                $verifyUser->save();
                $status = "Your e-mail is verified. You can now login.";
            // }else{
            //     $status = "Your e-mail is already verified. You can now login.";
            // }
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('customer/login')->with('status', $status);
    }
}
