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

//HOME & USERS
Route::any('/home', 'HomeController@index')->name('home');

Route::any('/users', 'UsersController@index')->name('userIndex');

Route::any('/users/delete/{id}', 'UsersController@remove')->name('userRemove');
Route::any('/users/{id}', 'UsersController@delete')->name('userDelete');


//GATEWAYS
Route::any('/gateways', 'GatewayDataController@index')->name('gatewayIndex');

Route::any('/addGateway', 'GatewayDataController@create')->name('gatewayCreate');
Route::post('/gateways/inserted', 'GatewayDataController@insert')->name('gatewayInsert');

Route::any('/gateways/delete/{id}', 'GatewayDataController@remove')->name('gatewayRemove');
Route::any('/gateways/{id}', 'GatewayDataController@delete')->name('gatewayDelete');

Route::get('/gateways/edit/{id}', 'GatewayDataController@edit')->name('gatewayEdit');
Route::post('/gateways/edited/{id}', 'GatewayDataController@update')->name('gatewayUpdate');

Route::any('/gateways/{name}/info', 'GatewayDataController@info')->name('gatewayInfo');

//APPS
Route::any('/applications', 'AppDataController@index')->name('appIndex');

Route::any('/addApp', 'AppDataController@create')->name('appCreate');
Route::post('/applications/inserted', 'AppDataController@insert');

Route::get('/applications/edit/{id}', 'AppDataController@edit')->name('appEdit');
Route::post('/applications/edited/{id}', 'AppDataController@update')->name('appUpdate');

Route::any('/applications/delete/{id}', 'AppDataController@remove')->name('appRemove');
Route::any('/applications/{id}', 'AppDataController@delete')->name('appDelete');

Route::any('/applications/{name}/info', 'AppDataController@info')->name('appInfo');

//DEVICE-PROFILE
Route::any('/deviceProfiles', 'DeviceProfileDataController@index')->name('deviceProfile');

Route::any('/addDeviceProfile', 'DeviceProfileDataController@create')->name('devProfileCreate');
Route::post('/deviceProfiles/inserted', 'DeviceProfileDataController@store')->name('devProfileInsert');

Route::get('/deviceProfiles/edit/{id}', 'DeviceProfileDataController@edit')->name('devProfileEdit');
Route::post('/deviceProfiles/edited/{id}', 'DeviceProfileDataController@update')->name('devProfileUpdate');

Route::any('/deviceProfiles/delete/{id}', 'DeviceProfileDataController@remove')->name('devProfileRemove');
Route::any('/deviceProfiles/{id}', 'DeviceProfileDataController@delete')->name('devProfileDelete');

//DEVICE
Route::any('/applications/{name}/devices', 'DeviceDataController@index')->name('devIndex');

Route::any('/applications/{name}/addDevice', 'DeviceDataController@create')->name('devCreate');
Route::post('/applications/{name}/device/inserted', 'DeviceDataController@insert')->name('devInsert');

Route::get('/devices/edit/{id}', 'DeviceDataController@edit')->name('devEdit');
Route::post('/applications/{name}/devices/edited/{id}', 'DeviceDataController@update')->name('devUpdate');

Route::any('/devices/delete/{id}', 'DeviceDataController@remove')->name('devRemove');
Route::any('/applications/{name}/devices/deleted/{id}', 'DeviceDataController@delete')->name('devDelete');


	
	
	
	
	
	
	