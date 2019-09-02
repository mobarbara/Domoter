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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//Auth::routes();

//HOME
Route::any('/home', 'HomeController@index')->name('home');

//GATEWAYS
//list gateways
Route::get('/app/{app_id}/gateway', 'GatewayDataController@index')->name('gatewayIndex');

//insert new gateway
Route::any('/add/gateway', 'GatewayDataController@create')->name('gatewayCreate');
Route::post('/gateway/inserted', 'GatewayDataController@insert')->name('gatewayInsert');

//update a gateway
Route::any('/gateway/edit/{id}', 'GatewayDataController@edit')->name('gatewayEdit');
Route::post('/gateway/edited/{id}', 'GatewayDataController@update')->name('gatewayUpdate');

//delete a gateway
Route::any('/gateway/delete/{id}', 'GatewayDataController@remove')->name('gatewayRemove');
Route::any('/gateway/deleted/{id}', 'GatewayDataController@delete')->name('gatewayDelete');

//DEVICES
//list devices
Route::get('/app/gateway/{id}/device', 'DeviceDataController@index')->name('deviceIndex');

//insert new device
Route::any('/add/device', 'DeviceDataController@create')->name('deviceCreate');
Route::post('/device/inserted', 'DeviceDataController@insert')->name('deviceInsert');

//update a device
Route::any('/device/edit/{id}', 'DeviceDataController@edit')->name('deviceEdit');
Route::post('/device/edited/{id}', 'DeviceDataController@update')->name('deviceUpdate');

//delete a device
Route::any('/device/delete/{id}', 'DeviceDataController@remove')->name('deviceRemove');
Route::post('/device/deleted/{id}', 'DeviceDataController@delete')->name('deviceDelete');

//APPS
//list apps
Route::get('/app', 'AppDataController@index')->name('appIndex');

//insert new app
Route::any('/add/app', 'AppDataController@create')->name('appCreate');
Route::post('/app/inserted', 'AppDataController@insert')->name('appInsert');

//update a app
Route::get('/app/edit/{id}', 'AppDataController@edit')->name('appEdit');
Route::post('/app/updated/{id}', 'AppDataController@update');

//delete a app
Route::any('/app/delete/{id}', 'AppDataController@remove')->name('appRemove');
Route::any('/app/deleted/{id}', 'AppDataController@delete');


	
	
	
	
	
	
	