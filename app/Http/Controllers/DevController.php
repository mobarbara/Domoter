<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function show()
    {
        return view('device');
    }
    public function store(Request $request)
    {
        $name=$request['name'];
        dd($name);
    }
}
