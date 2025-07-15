<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;

class CargoController extends Controller
{
    public function create(){
        return view('layouts.cargo');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|min:3|max:60',
        ]);
        $request['tipo'] = 'JUNTA DIRECTIVA LOCAL';
        $request['prioridad'] = 10;

        Cargo::create($request->all());
        return redirect()->route('miembros.index')->with('success','Cargo creado correctamente.');
    }
}
