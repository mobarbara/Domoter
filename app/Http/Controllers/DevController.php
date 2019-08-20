<?php


namespace App\Http\Controllers;
use App\Evidence;
use Carbon\Carbon;
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
        //NOME MODEL CON CUI STAI LAVORANDO (DOVE INSERISCI)
        $id_device=NOMEMODEL::insertGetId([
            'nome_device' => $request['t_i_id'],
            'nome_gateway' => $id = Auth::user()->id,
            'created_at'=> Carbon::now()->toDateTimeString(),
            'updated_at'=> Carbon::now()->toDateTimeString(),
        ]);
        return response()->json([
            'id' => $id_device,
        ]);
    }
}
