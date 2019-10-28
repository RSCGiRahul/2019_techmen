<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use App\Models\Region;
use App\helpers\tableHelper;
use Auth;
use App\Http\Controllers\Auth\LoginController;
class GuestController extends Controller
{
  public function __construct(){
    // dd(Auth::check());
     $this->middleware(['web'] );
  }

  public function aboutUs(){
    return View('guest.about-us');
  }

  public function contactUs(){
    return view('guest.contact-us');
  }


  public function welcome(Request $request)
  {
    if($request->cookie('city')){
      return view('welcome');
    }
    return $this->regionOption();
  }

  public function homepage(Request $request, $id = null)
  {
    if($id){
      $minutes = 100*60;
      $region =  Region::findOrfail($id);
      Cookie::queue(Cookie::make('city', $region->id, $minutes));
    }
    return view('welcome', compact('region'));
  }

  public function regionOption()
  {
    $regions  =  Region::get(['id', 'name']);
    return view('guest.region', compact('regions'));
  }

  public function userDetails(Request $request)
  {
// dd($request);
   return view('guest.user-details', compact('request'));
  }


  public function price(){
    // dd(Auth::check());
        $outputs = Brand::all();
        return view('guest.price',compact('outputs'));
  }

  public function getProducts($id){
    $outputs = Product::whereBrandId($id)->get();
    echo "<option value='' disabled selected>Choose your Model </option>";
    foreach($outputs as $output){
      echo "<option value = '$output->id'>  $output->name </option> ";
    }
}

public function getProductDiagnose($id){
    $product = Product::findOrfail($id);
    $outputs =  $product->productDignose()->with(['diagnose'])->get();
    $returns =  $outputs->map(function($output){
        return collect($output->toArray())
        ->only('diagnose')
        ->first();
    });

    if(count($returns) < 1){
      echo "<option> No Diagnose Found</option> ";
    }
    foreach($returns as $output){
      echo "<option value = {$output['id']} >  {$output['name']} </option> ";
    }

}
}
