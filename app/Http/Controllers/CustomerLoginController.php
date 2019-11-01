<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Region;
use App\Models\Customer;
use App\Models\Address;
use Illuminate\Support\Facades\Cookie;
class CustomerLoginController extends Controller
{
	 use AuthenticatesUsers;

    public function __construct(){
            $this->middleware(['guest', 'guest:customer'], ['except' => ['logout']]);
    }
   
    
    public function showLogin(Request $request){
        // dd(session()->all(),$request);
    	return view('customer.login');
    }
   public function login(Request $request)
   {
        $this->validate($request, [
            'phone' => 'required',
            // 'password' => 'required|string',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);
        // if ($this->hasTooManyLoginAttempts($request)) {
        //     $this->fireLockoutEvent($request);
        //     return $this->sendLockoutResponse($request);
        // }

        if (Auth::guard('customer')->attempt(['phone' => $request->phone, 'password' => '123456'])) {
            if(session()->has('product_id')) {
                 return redirect()->route('customer.product-diagnose');
            }
            return redirect()->intended('customer/order');
        }
        //$this->incrementLoginAttempts($request);
        return redirect()->back();
        // $this->sendFailedLoginResponse($request);
    }

   
}
