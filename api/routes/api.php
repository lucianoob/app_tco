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

Route::group(array('prefix' => '/'), function() {

  	Route::get('/', function () {
      	return response()->json([
      		'message' => 'API AppTCO', 
      		'routes' => ['api/supplier','api/payment'], 
      		'status' => 'Connected']);;
  	});

    Route::resource('user', 'UserController');

    Route::resource('company', 'CompanyController');
    Route::get('company/user/{id}', 'CompanyController@company')->name('company.user');

  	Route::resource('supplier', 'SupplierController');
  	Route::get('supplier/company/{id}', 'SupplierController@company')->name('supplier.company');

  	Route::resource('payment', 'PaymentController');
  	Route::get('payment/company/{id}', 'PaymentController@company')->name('payment.company');
});