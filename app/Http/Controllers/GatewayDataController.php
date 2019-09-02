<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class GatewayDataController extends Controller
{
	 public function index($app_id){
	 	  $gateways = DB::select('select * from gateways where app_id = ?', [$app_id]);
		  return view('gatewayIndex', ['gateways' => $gateways]);
	 }
	 
	 public function getLastInsertedId() {
		  $no_id = DB::table('gateways')->count();
		  return $no_id; 
	 }
	 
	 public function create(){
		  return view('gatewayCreate');
	 }
	 
	 public function edit($id){
	 	
	 	  $gateway = DB::select('select * from gateways where id = ?', [$id]);
		  return view('gatewayEdit', ['gateway' => $gateway]);
	 }	 
	 
	 public function remove($id){
	 	
	 	  $gateway = DB::select('select * from gateways where id = ?', [$id]);
		  return view('gatewayDelete', ['gateway' => $gateway]);	 
	 }	 
	 
	 public function insert(Request $request){ 
		  	 
		  	 $app_id = $request['app_id'];           
		  	 $mqtt_server = $request['mqtt_server'];
		  	 $mqtt_port = $request['mqtt_port'];
		  	 $mqtt_username = $request['mqtt_username'];
		  	 $mqtt_password = $request['mqtt_password'];
		  	 $id = GatewayDataController::getLastInsertedId();
		  	 $id++;
		  	 $data = array('id' => $id,'app_id' => $app_id, 'mqtt_server' => $mqtt_server, 
		  	 'mqtt_port' => $mqtt_port, 'mqtt_username' => $mqtt_username, 'mqtt_password' => $mqtt_password);
		  	 DB::table('gateways')->insert($data);
			 
			 $url = "/app";
          echo "Record inserted successfully. Return to <a href=" . $url . "/" . $app_id . "/gateway" . ">gateway</a>.";    	 
	 }
	 
    public function update(Request $request, $id)
    {
    	  $app_id = $request['app_id'];
        $mqtt_server = $request['mqtt_server'];
		  $mqtt_port = $request['mqtt_port'];
		  $mqtt_username = $request['mqtt_username'];
		  $mqtt_password = $request['mqtt_password'];
        DB::update('update gateways set mqtt_server = ?, mqtt_port = ?, mqtt_username = ?, mqtt_password = ? where id = ?', [$mqtt_server,$mqtt_port,$mqtt_username,$mqtt_password,$id]);           
        $url = "/app";
        echo "Record updated successfully. Return to <a href=" . $url . "/" . $app_id . "/gateway" . ">gateway</a>.";        
    }
    
	 public function delete(Request $request, $id){ 
	 	  $app_id = DB::table('gateways')->select('app_id')->where('id', $id)->value('app_id');
	 	  DB::delete('delete from gateways where id = ?', [$id]);
		  $url = "/app";
        echo "Record deleted successfully. Return to <a href=" . $url . "/" . $app_id . "/gateway" . ">gateway</a>."; 
		  
	 }     
}
