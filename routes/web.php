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

//shows the index of gateways and them attributes
Route::any('/home', 'GatewayDataController@index')->name('home'); 

//inserting a new record in the database
Route::any('/home/create', 'GatewayDataController@create')->name('create');
Route::post('/home', 'GatewayDataController@insert')->name('insert');

//deleting a record with {id} in the database
Route::any('/home/delete/{id}', 'GatewayDataController@remove')->name('remove');
Route::any('/home/deleted/{id}', 'GatewayDataController@delete')->name('delete');

//modifying a record with {id} in the database
Route::any('/home/edit/{id}', 'GatewayDataController@edit')->name('edit');
Route::post('/home/{id}', 'GatewayDataController@update')->name('update');


	
	
	
	
	
	
	
	