<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    public function edit()
    {
        $colorActual = Color::find(1);
        return view('layouts.color', compact('colorActual'));
    }

    public function update(Request $request)
    {
        //Storage::delete(public_path().'/css/colores.css');
        $colorActual = Color::find(1);
        $colorActual->update($request->all());
        unlink(public_path().'/css/colores.css');
        $colores = fopen("css/colores.css", "a") or die ("Error al crear");
        $firstcolor = $request->firstColor;
        $secondtcolor = $request->secondColor;
        $thirdcolor = $request->thirdColor;
        $footercolor = $request->footerColor;

        fwrite($colores, 
            ":root {
                --first-color: $firstcolor;
                --second-color: $secondtcolor;
                --third-color: $thirdcolor;
                --main-word-color: $footercolor;
            }");
            return redirect()->route('inicio')->with('success','Colores actualizados.');
    }
}
