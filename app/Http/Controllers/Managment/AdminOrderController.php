<?php

namespace App\Http\Controllers\Managment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
class AdminOrderController extends Controller
{
   	/*
	This is where we will order
   	*/

   	public function index()
   	{
   		$orders = Order::with(['orderDetails','orderDiagnose', 'address','customer'])->get();
   		// dd($orders); 	
   		return view('managment.order.index', compact('orders'));
   	}

   	
}
