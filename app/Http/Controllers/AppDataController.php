<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class AppDataController extends Controller
{
	 public function index() //shows all apps
	 {
	 	  $apps = DB::select('select * from apps');
		  return view('appIndex', ['apps' => $apps]);
	 }
	 
	 public function create(){ //when i have to display the view 'create'
		  return view('appCreate');	 
	 }
	 
	 public function remove($id){ //when i have to display the view 'delete' for the gateway with id = $id
	 	  $app = DB::select('select * from apps where id = ?', [$id]);
		  return view ('appRemove', ['app' => $app]);	 
	 }
	 
	 public function getLastInsertedId() {
		  $no_id = DB::table('apps')->count();
		  return $no_id; 
	 }
	 
	 public function edit($id){ //when i have to display the view 'edit' for the gateway with id = $id
		  $app = DB::select('select * from apps where id = ?', [$id]);
		  return view('appEdit', ['app' => $app]);	 
	 }
	 
	 public function insert(Request $request){ //when i have to insert a new record in the table 'apps'
		  	 $name = $request['name'];  
		  	 $description = $request['description'];
		  	 $filter = $request['filter'];
		  	 $id = AppDataController::getLastInsertedId();
		  	 $id++;
		  	 $data = array('id' => $id, 'name' => $name, 'description' => $description, 'filter' => $filter);
		  	 DB::table('apps')->insert($data);

			 $url = "/app";
          echo "Record inserted successfully. Return to <a href=" . $url . ">apps</a>.";  	 
	 }	 
	 
	 public function delete(Request $request, $id){
		  DB::delete('delete from apps where id = ?', [$id]);  
		  $url = "/app";
        echo "Record deleted successfully. Return to <a href=" . $url . ">apps</a>."; 	
	 }  
	 
	 public function update(Request $request, $id) //when i have to edit a record in the table 'gateways' with id = $id
    {
        $name = $request['name'];
		  $description = $request['description'];
        $filter = $request['filter'];
        DB::update('update apps set name = ?, description = ?, filter = ? where id = ?', [$name,$description,$filter,$id]);
        $url = "/app";
        echo "Record updated successfully. Return to <a href=" . $url . ">apps</a>."; 
    }
    
}
