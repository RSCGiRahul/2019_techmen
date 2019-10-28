<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Region;
use App\Models\Customer;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CustomerRegistrationController extends Controller
{
     public function register()
    {
        $regions = Region::pluck('name', 'id');
        return view('customer.registration', compact('regions'));
    }

    public function registration(Request $request)
    {
    	 DB::beginTransaction();
        try{
        $this->validate($request, [
            'phone' => 'required|unique:users',
            'name' => 'required|string',
            'email' => 'required|unique:users',
            // 'address' => 'required'
            // 'g-recaptcha-response' => 'required|captcha',
        ]); 
        $customerInput = array(
            'name' => $request->input('name' , NULL),
            'email' => $request->input('email' , NULL),
            'phone' => $request->input('phone' , NULL),
            'email_verified_at' => Carbon::now(),
            'verified' => 1,
            'password' =>  Hash::make('123456')
          );
        // dd( $customerInput);
       $customer =  Customer::create($customerInput);
// dd($customer )
       $addressData = [
            'region_id' => $request->input('region', NULL),
            // 'customer_id' => $customer->id, 
            'address' => $request->input('address', NULL), 
       ];
       Address::create($addressData);
        DB::commit();
        if (Auth::guard('customer')->attempt(['phone' => $request->phone, 'password' => '123456'])) {
            return redirect()->intended('customer/order');
        }
        return redirect(route('welcome'))->withAlert('Register successfully, please verify your email.');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Error Found');
        }
    }
}
