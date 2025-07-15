<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Asignar_cargo;
use App\Models\Asignar_proyecto;
use App\Models\Cargo;
use App\Models\Gestion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MiembroController extends Controller
{
    public function index(Request $request)
    {
        $gestiones = Gestion::select('id', 'anio')->orderBy('id','DESC')->get();
        $anio = $request->get('anio');
        if ($anio == ''){
            $anio = $gestiones[0]->id;
        }
        $miembros = Asignar_cargo::join('cargos', 'cargos.id', '=', 'asignar_cargos.cargo_id')
        ->select('asignar_cargos.user_id', 'cargos.nombre', 'cargos.prioridad')
        ->where('gestion_id', 'LIKE' , $anio)->orderBy('cargos.prioridad','ASC')->get();

        //$miembros = Asignar_cargo::select('user_id', 'cargo_id')->where('gestion_id', 4)->get();
        //$miembros = User::select('id','nombre', 'apPaterno', 'apMaterno')->get();
        
        return view('miembros.index', compact('miembros','gestiones','anio'));
    }

    public function create()
    {
        $cargos = Cargo::select('id', 'nombre', 'prioridad')->orderBy('prioridad','ASC')->get();
        $gestiones = Gestion::select('id', 'anio')->orderBy('id','DESC')->get();
        return view('miembros.create', ['cargos' => $cargos, 'gestiones' => $gestiones]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:25',
            'apPaterno' => 'required|min:3|max:20',
            'apMaterno' => 'required|min:3|max:20',
            'ci' => 'required|digits_between:7,8',
            'fechaNacimiento' => 'required',
            'email' => 'required|email',
            'celular' => 'required|digits:8',
            'profesion' => 'required|max:60',
            'intereses' => 'required|max:200',
            'fechaJuramento' => 'required',
            'cargo' => 'required',
            'gestion' => 'required',
            'presentacion' => 'required',
            'img' => 'required',
            //'cv' => 'required',
            'facebook' => 'required'
        ]);
        $request['password'] = bcrypt($request->ci);
        $request['rol'] = 'USUARIO';

        //subir archivos (foto) al servidor
        if($request->hasfile('img')){
            $file = $request->file('img');
            //$name = time().$file->getClientOriginalName();
            $name = str_replace(" ", "", strtolower($request->nombre.$request->apPaterno)).'.png';
            $img = Image::make($file)->encode('png');
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(public_path().'/images/miembros/'.$name);
            $request['foto'] = "/images/miembros/".$name;
            $img->destroy();
        }
        //subir archivos (curriculum) al servidor
        if($request->hasfile('cv')){
            $file = $request->file('cv');
            //$name = time().$file->getClientOriginalName();
            $pdfname = str_replace(" ", "", strtolower($request->nombre.$request->apPaterno)).'CV.pdf';
            if($file->guessExtension()=="pdf"){
                copy($file, public_path().'/docs/curriculums/'.$pdfname);
                $request['curriculum'] = "/docs/curriculums/".$pdfname;
            }
        }

        $creado = User::create($request->all());

        if($creado){
        $asignacion = new Asignar_cargo();
        $asignacion->user_id = $creado->id;
        $asignacion->gestion_id = $request->gestion;
        
        if ($request->cargo == 16 || $request->cargo == 15){
            $asignacion->cargo_id= $request->cargo;
            $asignacion->save();
            return redirect()->route('miembros.index')->with('success','Miembro registrado correctamente .');
        }
        else{
            $existe = Asignar_cargo::where('gestion_id', $request->gestion)->where('cargo_id', $request->cargo)->get();
            if (count($existe) == 0){
                $asignacion->cargo_id= $request->cargo;
            }
            else{
                $asignacion->cargo_id= 16;
            }
            $asignacion->save();
            return redirect()->route('miembros.index')->with('success','Miembro registrado correctamente .');
        }
        }
        else{
            return redirect()->route('miembros.index')->with('danger','Hubo un problema con el registro.');
        }
    }

    public function show($id)
    {
        $ultimaGestion = Gestion::select('id')->orderBy('id','DESC')->first();
        $miembro = User::find($id);
        $cargo = Asignar_cargo::join('cargos', 'cargos.id', '=', 'asignar_cargos.cargo_id')
        ->join('users', 'users.id', '=', 'asignar_cargos.user_id')->select('cargos.nombre')
        ->where('gestion_id', $ultimaGestion->id)->where('users.id', $id)->first();
        $proyectos = Asignar_proyecto::join('proyectos', 'proyectos.id', '=', 'asignar_proyectos.proyecto_id')
        ->join('users', 'users.id', '=', 'asignar_proyectos.user_id')->select('proyectos.nombre', 'proyectos.id', 'proyectos.tipo')
        ->where('users.id', $id)->get();
        return view('miembros.show', compact(['miembro', 'cargo', 'proyectos']));
    }

    public function edit(User $miembro)
    {
        $cargos = Cargo::select('id', 'nombre', 'prioridad')->orderBy('prioridad','ASC')->get();
        $gestiones = Gestion::select('id', 'anio')->orderBy('id','DESC')->get();
        $ultimoCargo = Asignar_cargo::where('user_id', $miembro->id)->orderBy('gestion_id','DESC')->first();
        //return (['miembro' => $miembro, 'cargos' => $cargos, 'gestiones' => $gestiones, 'ultimoCargo' => $ultimoCargo ]);
        return view('miembros.edit', ['miembro' => $miembro, 'cargos' => $cargos, 'gestiones' => $gestiones, 'ultimoCargo' => $ultimoCargo ] );
    }

    public function update (Request $request, User $miembro, Asignar_cargo $ultimoCargo)
    {
        $request->validate([
            'email' => 'required|email',
            'celular' => 'required|digits:8',
            'profesion' => 'required|max:60',
            'intereses' => 'required|max:200',
            'cargo' => 'required',
            'gestion' => 'required',
            'presentacion' => 'required',
            'facebook' => 'required'
            //'img' => 'required',
            //'cv' => 'required',
        ]);

        if($request->hasfile('img')){
            $file = $request->file('img');
            //$name = time().$file->getClientOriginalName();
            $name = str_replace(" ", "", strtolower($miembro->nombre.$miembro->apPaterno)).'.png';
            $img = Image::make($file)->encode('png');
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            Storage::delete($name);
            //unlink(public_path().'/images/miembros/'.$name);
            $img->save(public_path().'/images/miembros/'.$name);
            $request['foto'] = "/images/miembros/".$name;
            $img->destroy();
        }

        if($request->hasfile('cv')){
            $file = $request->file('cv');
            //$name = time().$file->getClientOriginalName();
            $pdfname = str_replace(" ", "", strtolower($miembro->nombre.$miembro->apPaterno)).'CV.pdf';
            if($file->guessExtension()=="pdf"){
                Storage::delete($pdfname);
                copy($file, public_path().'/docs/curriculums/'.$pdfname);
                $request['curriculum'] = "/docs/curriculums/".$pdfname;
            }
        }

        $miembro->update($request->all());
        $existe = Asignar_cargo::where('gestion_id', $request->gestion)->where('user_id', $miembro->id)->first();
        if($existe == ''){
            $asignacion = new Asignar_cargo();
            $asignacion->user_id = $miembro->id;
            $asignacion->gestion_id = $request->gestion;
        
            if ($request->cargo == 16 || $request->cargo == 15){
                $asignacion->cargo_id= $request->cargo;
                $asignacion->save();
                //return redirect()->route('miembros.index')->with('success','Miembro registrado correctamente .');
            }
            else{
                $existeCargo = Asignar_cargo::where('gestion_id', $request->gestion)->where('cargo_id', $request->cargo)->get();
                if (count($existeCargo) == 0){
                    $asignacion->cargo_id= $request->cargo;
                }
                else{
                    $asignacion->cargo_id= 16;
                }
                $asignacion->save();
                //return redirect()->route('miembros.index')->with('success','Miembro registrado correctamente .');
            }
        }
        else if ($ultimoCargo->gestion_id != $request->gestion || $ultimoCargo->cargo_id != $request->cargo) {
            if ($request->cargo == 16 || $request->cargo == 15){
            $existe->cargo_id = $request->cargo;
            $existe->save();
            }
            else{
                $existeCargo = Asignar_cargo::where('gestion_id', $request->gestion)->where('cargo_id', $request->cargo)->get();
                if (count($existeCargo) == 0){
                    $existe->cargo_id = $request->cargo;
                }
                else{
                    $existe->cargo_id= 16;
                }
                $existe->save();
            }
        }

        return redirect()->route('miembros.show',$miembro->id)->with('success','Miembro actualizado correctamente.');
    }
}
