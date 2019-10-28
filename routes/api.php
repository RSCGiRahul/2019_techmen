<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});
Route::group(['middleware' => [], 'prefix'=>'permit','as'=>'permit.'], function() {
    Route::get('district/{id}', 'Api\RegionController@getDistrict')->name('distirct');
    Route::get('product/{id}', 'Api\RegionController@getBrandProduct')->name('brandproduct');
});

Route::group(['middleware' => [], 'prefix'=>'guest','as'=>'guest.'], function() {
    Route::get('products/{id}', 'Api\GuestController@getProducts')->name('products');
    Route::get('product/diagnose/{id}', 'Api\GuestController@getProductDiagnose')->name('products.diagnose');
      
});