<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'GuestController@welcome')->name('welcome');

Auth::routes(['verify' => true]);
Route::post('account/verification/{token}', 'Auth\RegisterController@accountVerification')->name('account.verification');

Route::get('/customer/verify/{token}', 'CustomerController@verifyCustomer')->name('customer.verify');



Route::get('homepage/{id}', 'GuestController@homepage')->name('homepage');

Route::get('guest/product/{id}', 'GuestController@getProducts')->name('guest.product');

Route::get('guest/region', 'GuestController@regionOption')->name('guest.region');

Route::get('guest/product-diagnose/{id}', 'GuestController@getProductDiagnose')->name('guest.diagnose');

Route::any('guest/user-details', 'GuestController@userDetails')->name('guest.user-details');

Route::post('customer/register', 'CustomerController@register')->name('customer.register');

Route::resource('manager', 'Managment\ManagerController');
Route::resource('hr', 'Managment\HrController');
Route::resource('executive', 'Managment\ExecutiveController');
Route::resource('technician', 'Managment\TechnicianController');

Route::group(['middleware' => ['verified'], 'prefix'=>'managment','as'=>'managment.'], function(){
    Route::get('/', 'Managment\AdminController@index')->name('dashboard');
    Route::get('/customer', 'Managment\AdminController@customer')->name('customer');
    Route::resource('user', 'Managment\UserController')->middleware('can:create-user');

    Route::get('user/', 'Managment\UserController@index')->name('user.index');
    // ->middleware('can:destroyAttachment,'.\App\Models\Application::class);
    

    Route::resource('region', 'Managment\RegionController');
    Route::get('/region/create','Managment\RegionController@create')->name('region.create')->middleware('can:create,'.\App\Models\Region::class );
    Route::group([], function(){
       Route::resource('gadget', 'Managment\GadgetController');
        Route::post('gadget/destroy/{id}', 'Managment\GadgetController@destroy')->name('gadget.destroy');

    });
    Route::resource('brand', 'Managment\BrandController');
    Route::resource('product', 'Managment\ProductController');
    Route::group(['prefix' => 'diagnose', 'as' => 'diagnose.'], function(){
        Route::get('/index/{id}/level/{catid?}', 'Managment\DiagnoseLevelController@index')->name('level.index');
        Route::get('/create/{id}/level/{catid?}', 'Managment\DiagnoseLevelController@create')->name('level.create');
        Route::post('/store/level/{id}/{catid?}', 'Managment\DiagnoseLevelController@store')->name('level.store');
        Route::get('/diagnose/level/{id}/edit', 'Managment\DiagnoseLevelController@edit')->name('level.edit');
        Route::post('/diagnose/level/{id}/update', 'Managment\DiagnoseLevelController@update')->name('level.update');
        Route::put('/store/level/{id}/{catid?}', 'Managment\DiagnoseLevelController@destroy')->name('level.destroy');
        Route::get('product', 'Managment\DiagnoseController@productDiagnose')->name('product');
        Route::post('product','Managment\DiagnoseController@saveProductDiagnose')->name('saveproduct');
    });

    Route::get('diagnose/addmore/', 'Managment\DiagnoseController@addMore')->name('diagnose.addmore');
    Route::resource('diagnose', 'Managment\DiagnoseController');

    Route::resource('inventory', 'Managment\InventoryController');
    Route::resource('coupen', 'Managment\CoupenController');

    Route::get('product/diagnose/all', 'Managment\ProductDiagnoseController@allProductDiagnose')->name('product.diagnose.all');

    Route::get('product/diagnose/{id}/index', 'Managment\ProductDiagnoseController@index')->name('product.diagnose');
    Route::get('product/diagnose/{id}/create', 'Managment\ProductDiagnoseController@create')->name('product.diagnose.create');

    Route::any('product/diagnose/{id}/addprice', 'Managment\ProductDiagnoseController@addPrice')->name('product.diagnose.addPrice');
    Route::post('product/diagnose/{id}/store', 'Managment\ProductDiagnoseController@store')->name('product.diagnose.store');
    Route::any('product/diagnose/{id}/next', 'Managment\ProductDiagnoseController@nextDiagnose')->name('product.diagnose.next');
    Route::get('product/diagnose/{id}/edit', 'Managment\ProductDiagnoseController@edit')->name('product.diagnose.edit');
    Route::post('product/diagnose/{id}/update', 'Managment\ProductDiagnoseController@update')->name('product.diagnose.update');
    Route::delete('product/diagnose/{id}/destroy', 'Managment\ProductDiagnoseController@destroy')->name('product.diagnose.destroy');
 

//    Route::get('product/diagnose/index', 'Managment\ProductDiagnoseController');
//    Route::get('product/diagnose/index', 'Managment\ProductDiagnoseController');

Route::get('/upload/csv', function(){
    return View('managment.csv.product');
})->name('upload.csv');
Route::post('/uploadcsv', 'Managment\AdminController@uploadProductCsv')->name('admin.uploadcsv');

/*
    ORDER DTAILS PAGE
*/
    Route::get('order', 'Managment\AdminOrderController@index')->name('admin.order');
    Route::get('order/custom',function(){
        return view('managment.inventory.custom');
    })->name('admin.custom');
});

Route::get('/home', 'HomeController@index')->name('homes');
Route::get('price', 'GuestController@price')->name('price');

Route::post('order/auth', 'GuestController@orderAuth')->name('order.auth');


Route::get('customer/register', 'CustomerRegistrationController@register');
Route::post('registration', 'CustomerRegistrationController@registration')->name('customer.registration');

Route::get('customer/login', 'CustomerLoginController@showLogin');
Route::post('customer/login', 'CustomerLoginController@login')->name('customer.login');
Route::get('aboutus', 'GuestController@aboutUs')->name('aboutus');
Route::get('contact-us', 'GuestController@contactUs')->name('contactus');


Route::group(['prefix'=>'customer','as'=>'customer.'], function(){
    Route::any('product-diagnose', 'Permit\OrderController@productDiagnose')->name('product-diagnose');
    Route::post('place-order', 'Permit\OrderController@placeOrder')->name('place-order');
    // Route::post('', 'Permit\OrderController@productDiagnose')->name('product-diagnose');
    Route::resource('order', 'Permit\OrderController');

});
