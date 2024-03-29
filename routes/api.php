<?php

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Device;
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

Route::post('api/register', 'Auth\RegisterApiController@register');
Route::post('api/login', 'Auth\LoginApiController@login');
Route::post('api/logout', 'Auth\LoginApiController@logout');

Route::group(['middleware' => 'auth:api'], function() {
	Route::get('/api/gateways', 'GatewayController@index');
	Route::get('/api/gateways/{gateway}', 'GatewayController@show');
	Route::post('/api/gateways', 'GatewayController@store');
	Route::put('/api/gateways/{gateway}', 'GatewayController@update');
	Route::delete('/api/gateways/{gateway}', 'GatewayController@delete');	
});

Route::post('/activate/{id}', 'DeviceDataController@activate');

