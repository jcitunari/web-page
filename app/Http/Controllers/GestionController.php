<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function create(){
        return view('layouts.gestion');
    }

    public function store(Request $request){
        $request->validate([
            'anio' => 'required|digits:4',
        ]);

        Gestion::create($request->all());
        return redirect()->route('miembros.index')->with('success','Gestión creada correctamente.');
    }
}
