<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DeviceDataController extends Controller
{
    public function index($gateway_id){
	 	  $devices = DB::select('select * from devices where gateway_id = ?', [$gateway_id]);
	 	  $gateway = DB::select('select * from gateways where id = ?', [$gateway_id]);
		  return view('deviceIndex', ['devices' => $devices, 'gateway' => $gateway]);
	 }
}
