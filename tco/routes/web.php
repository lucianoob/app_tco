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

Route::get('/users/all', ['as' => 'users.view', 'uses' => 'UserController@view']);
Route::get('/users/{user}',  ['as' => 'user.edit', 'uses' => 'UserController@edit']);
Route::patch('/users/{user}',  ['as' => 'user.update', 'uses' => 'UserController@update']);

Route::get('/companies/all', ['as' => 'companies.view', 'uses' => 'CompanyController@view']);
Route::get('/companies/',  ['as' => 'companies.edit', 'uses' => 'CompanyController@edit']);
Route::patch('/companies/{company}',  ['as' => 'companies.update', 'uses' => 'CompanyController@update']);

Route::get('/suppliers/notification/{id}', ['as' => 'suppliers.notification', 'uses' => 'SupplierController@notification']);
Route::get('/suppliers/activate/{token}', ['as' => 'suppliers.activate', 'uses' => 'SupplierController@activate']);
Route::get('/suppliers/all', ['as' => 'suppliers.view', 'uses' => 'SupplierController@view']);
Route::get('/suppliers/', ['as' => 'suppliers.list', 'uses' => 'SupplierController@list']);
Route::post('/suppliers/',  ['as' => 'suppliers.edit', 'uses' => 'SupplierController@edit']);

Route::get('/payments/all', ['as' => 'payments.view', 'uses' => 'PaymentController@view']);
Route::get('/payments/', ['as' => 'payments.list', 'uses' => 'PaymentController@list']);
Route::post('/payments/', ['as' => 'payments.edit', 'uses' => 'PaymentController@edit']);
