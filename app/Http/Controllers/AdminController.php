<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $usuarios = User::select('id', 'nombre', 'apPaterno', 'apMaterno', 'rol')->orderBy('nombre','ASC')->paginate(15);
        return view('admin.index', compact('usuarios'));
    }

    public function update(Request $request, $id) {
        $usuario = User::find($id);
        $usuario->update($request->all());
        return redirect()->route('admin.index')->with('success','Rol actualizado correctamente.');
    }
}
