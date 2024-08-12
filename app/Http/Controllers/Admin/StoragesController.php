<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Storages;


class StoragesController extends Controller
{
    //
    public function store(Request $request){
        $validated = $request->validate([
            'temperatura' => 'required|numeric',
            'humedad' => 'required|numeric',
        ]);

        Storages::create([
            'temperatura' => $request->temperatura,
            'humedad' => $request->humedad,
        ]);

        return  response()->json(['success' => true, 'message' => 'Registro con exito'], 200);
    }

    public function index()
    {
        
        return view('admin.storages.index');
    }
}
