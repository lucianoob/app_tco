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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/activate/{token}', 'Auth\RegisterController@activate')->name('activate');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('/users/{user}',  ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::get('/companies/{user}',  ['as' => 'companies.edit', 'uses' => 'CompanyController@edit']);
Route::patch('/companies/{company}',  'CompanyController@update')->name('companies.update');

Route::get('/suppliers/list/', ['as' => 'suppliers.list', 'uses' => 'SupplierController@list']);
Route::get('/suppliers/new/',  ['as' => 'suppliers.new', 'uses' => 'SupplierController@new']);
Route::post('/suppliers/new/{id}',  ['as' => 'suppliers.new', 'uses' => 'SupplierController@save']);
Route::get('/suppliers/edit/{id}',  ['as' => 'suppliers.edit', 'uses' => 'SupplierController@edit']);
Route::post('/suppliers/edit/{id}',  ['as' => 'suppliers.edit', 'uses' => 'SupplierController@save']);
Route::get('/suppliers/remove/{id}',  ['as' => 'suppliers.remove', 'uses' => 'SupplierController@remove']);

Route::get('/payments/list/', ['as' => 'payments.list', 'uses' => 'PaymentController@list']);
Route::post('/payments/list/', ['as' => 'payments.list', 'uses' => 'PaymentController@filter']);
Route::get('/payments/new/{supplier}',  ['as' => 'payments.new', 'uses' => 'PaymentController@new']);
Route::post('/payments/new/{id}',  ['as' => 'payments.new', 'uses' => 'PaymentController@save']);
Route::get('/payments/edit/{id}',  ['as' => 'payments.edit', 'uses' => 'PaymentController@edit']);
Route::post('/payments/edit/{id}',  ['as' => 'payments.edit', 'uses' => 'PaymentController@save']);
Route::get('/payments/remove/{id}',  ['as' => 'payments.remove', 'uses' => 'PaymentController@remove']);