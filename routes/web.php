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

/////////Home&Ungrouped///////////
Route::group([ 'middleware' => [ 'web', 'auth' ] ], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
});

//////////////Items///////////////
Route::group([ 'middleware' => [ 'web', 'auth' ] ], function () {

    Route::resource('items', 'ItemsController');
    Route::post('/specs', 'SpecsController@store');
    Route::post('/items/search', 'ItemsController@search');
    Route::post('/items/specs/search', 'ItemsController@searchspecs');
    Route::put('/items/{item}/restore', 'ItemsController@restore');
});

////////////////Users//////////////
Route::group([ 'middleware' => [ 'web', 'auth' ] ], function () {
    Route::resource('users', 'UsersController');
    Route::put('/users/{user}/restore', 'UsersController@restore');
});

/////////////Receipts/////////
Route::group([ 'middleware' => [ 'web', 'auth' ] ], function () {
    Route::resource('receipts', 'ReceiptsController');
    Route::post('/receipts/search', 'ReceiptsController@search');
    Route::put('/receipts/{receipt}/restore', 'ReceiptsController@restore');
});

////////////////Customers//////////////
Route::group([ 'middleware' => [ 'web', 'auth' ] ], function () {
    Route::resource('customers', 'CustomersController');
    Route::put('/receipts/{receipt}/restore', 'CustomersController@restore');
});
