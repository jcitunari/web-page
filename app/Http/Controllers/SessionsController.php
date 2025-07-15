<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function index(){
        return view('layouts.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(auth()->attempt(request(['email', 'password'])) == false){
            return back()->withErrors([
                'message' => 'El email o contraseña son incorrectos, intente de nuevo'
            ]);
        }
        else{
            if(auth()->user()->rol == 'ADMIN'){
                return redirect()->route('admin.index');
            } else {
                return redirect()->to('/');
            }
        }
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
}
