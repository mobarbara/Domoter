<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class GatewayDataController extends Controller
{
	 public function index(){ //shows gateways in the view 'home'
	 	  $gateways = DB::select('select * from gateways');
		  return view('home', ['gateways' => $gateways]);
	 }

	 public function create(){ //when i have to display the view 'create'
		  return view('create');	 
	 }
	
	 public function edit($id){ //when i have to display the view 'edit' for the gateway with id = $id
		  $gateways = DB::select('select * from gateways where id = ?', [$id]);
		  return view('edit', ['gateways' => $gateways]);	 
	 }
	 
	 public function remove($id){ //when i have to display the view 'delete' for the gateway with id = $id
	 	  $gateways = DB::select('select * from gateways where id = ?', [$id]);
		  return view ('delete', ['gateways' => $gateways]);	 
	 }
	 
	 public function getLastInsertedId() {
		  $no_id = DB::table('gateways')->count();
		  return $no_id; 
	 }
	 
	 public function insert(Request $request){ //when i have to insert a new record in the table 'gateways'
		  	 
		  	 $name = $request['name'];           //with incremented id
		  	 $topic = $request['topic'];
		  	 $id = GatewayDataController::getLastInsertedId();
		  	 $id++;
		  	 $data = array('id' => $id,'name' => $name, 'topic' => $topic);
		  	 DB::table('gateways')->insert($data);
		  	 $gateways = DB::select('select * from gateways');
		  	 return view('home', ['gateways' => $gateways]);
	 }
	 
    public function update(Request $request, $id) //when i have to edit a record in the table 'gateways' with id = $id
    {
        $name = $request['name'];
        $topic = $request['topic'];
        DB::update('update gateways set name = ?, topic = ? where id = ?', [$name,$topic,$id]);
        
        $url = "/home";
        $style = "font-family: Nunito,sans-serif;"; 
        echo "Record updated successfully. Go back home <a href=" . $url . " style=" . $style . "> here </a>";
    }
    
	 public function delete(Request $request, $id){
		  DB::delete('delete from gateways where id = ?', [$id]);  
		  $url = "/home";
        $style = "font-family: Nunito,sans-serif;"; 
        echo "Record deleted successfully. Go back home <a href=" . $url . " style=" . $style . "> here </a>";
	 }       
}
