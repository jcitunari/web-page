<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Asignar_proyecto;
use App\Models\User;
use App\Models\Proyecto;
use App\Models\Gestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyectoController extends Controller
{
    public function index(Request $request)
    {
        $palabra = $request->get('buscar');
        if ($palabra == ''){
            $proyectos = Proyecto::select('id', 'nombre', 'resumen', 'tipo', 'fotoPrincipal', 'fechaFin')->orderBy('fechaFin','DESC')->paginate(8);
            return view('actividades.index', compact(['proyectos', 'palabra']));
        }
        else{
            $proyectos = Proyecto::select('id', 'nombre', 'resumen', 'tipo', 'fotoPrincipal', 'fechaFin')->where('nombre','LIKE','%'.$palabra.'%')->orderBy('fechaFin','DESC')->paginate(8);
            return view('actividades.index', compact(['proyectos', 'palabra']));
        }
    }

    public function create($tipo)
    {
        $gestiones = Gestion::select('id', 'anio')->orderBy('id','DESC')->get();
        $users = User::select('id', 'nombre', 'apPaterno')->get();
        return view('actividades.create', ['gestiones' => $gestiones, 'miembros' => $users, 'tipo' => $tipo]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|min:5|max:255',
            'tipo' => 'required|min:3|max:10',
            'gestion' => 'required',
            'ciudad' => 'required|min:3|max:50',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            //'objetivoGeneral' => 'required',
            //'objetivosEspecificos' => 'required',
            'ejecucion' => 'required',
            'img' => 'required',
            'imgP' => 'required',
            //'pdf' => 'required'
        ]);

        //subir archivos (foto) al servidor
        if($request->hasfile('img')){
            $file = $request->file('img');
            //$name = time().$file->getClientOriginalName();
            $name = str_replace(" ", "", strtolower($request->nombre.$request->fechaInicio)).'.png';
            $img = Image::make($file)->encode('png');
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(public_path().'/images/actividades/'.$name);
            $request['fotoPrincipal'] = "/images/actividades/".$name;
            $img->destroy();
        }

        //subir archivos (foto Portada) al servidor
        if($request->hasfile('imgP')){
            $file = $request->file('imgP');
            //$name = time().$file->getClientOriginalName();
            $name = str_replace(" ", "", strtolower($request->nombre.'Portada'.$request->fechaInicio)).'.png';
            $img = Image::make($file)->encode('png');
            $img->resize(900, 530, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(public_path().'/images/actividades/'.$name);
            $request['fotoPortada'] = "/images/actividades/".$name;
            $img->destroy();
        }

        if($request->hasfile('pdf')){
            $file = $request->file('pdf');
            //$name = time().$file->getClientOriginalName();
            $pdfname = str_replace(" ", "", strtolower($request->nombre.$request->fechaInicio)).'.pdf';
            if($file->guessExtension()=="pdf"){
                copy($file, public_path().'/docs/informes/'.$pdfname);
                $request['informe'] = "/docs/informes/".$pdfname;
            }
        }
        $request['resumen'] = substr($request->ejecucion, 0, 100);
        
        $creado = Proyecto::create($request->all());
        $creado->gestion_id = $request->gestion;
        $creado->save();

        if ($request->tipo == 'proyecto' || $request->tipo == 'programa'){
        if ($request->director){
            $asignacion = new Asignar_proyecto();
            $asignacion->proyecto_id = $creado->id;
            $asignacion->user_id = $request->director;
            $asignacion->rol = "director";
            $asignacion->save();
        }

        if ($request->codirector != [null]){
            foreach ($request->codirector as $codirector){
                $asignacion = new Asignar_proyecto();
                $asignacion->proyecto_id = $creado->id;
                $asignacion->user_id = $codirector;
                $asignacion->rol = "codirector";
                $asignacion->save();
            }
        }

        if ($request->colaborador != [null]){
            foreach ($request->colaborador as $colaborador){
                $asignacion = new Asignar_proyecto();
                $asignacion->proyecto_id = $creado->id;
                $asignacion->user_id = $colaborador;
                $asignacion->rol = "colaborador";
                $asignacion->save();
            }
        }
        }
        else{
        if ($request->delegacion != [null]){
            foreach ($request->delegacion as $delegado){
                $asignacion = new Asignar_proyecto();
                $asignacion->proyecto_id = $creado->id;
                $asignacion->user_id = $delegado;
                $asignacion->rol = "delegacion";
                $asignacion->save();
            }
        }
        }

        return redirect()->route('actividades.index')->with('success','Proyecto registrado correctamente.');
    }

    public function show($tipo, $id)
    {
        $proyecto = Proyecto::find($id);
        $users = Asignar_proyecto::join('proyectos', 'proyectos.id', '=', 'asignar_proyectos.proyecto_id')
        ->join('users', 'users.id', '=', 'asignar_proyectos.user_id')->select('users.nombre', 'users.apPaterno', 'users.id', 'asignar_proyectos.rol')
        ->where('proyectos.id', $id)->get();
        return view('actividades.show', compact(['proyecto', 'users']));
        /*$cargo = Asignar_cargo::join('cargos', 'cargos.id', '=', 'asignar_cargos.cargo_id')
        ->join('users', 'users.id', '=', 'asignar_cargos.user_id')->select('cargos.nombre')
        ->where('gestion_id', 4)->where('users.id', $id)->first();*/
    }

    public function edit(Proyecto $proyecto)
    {
        $gestiones = Gestion::select('id', 'anio')->orderBy('id','DESC')->get();
        
        $users = User::select('id', 'nombre', 'apPaterno')->get();
        $integrantes = Asignar_proyecto::join('proyectos', 'proyectos.id', '=', 'asignar_proyectos.proyecto_id')
        ->join('users', 'users.id', '=', 'asignar_proyectos.user_id')->select('users.nombre', 'users.apPaterno', 'users.id', 'asignar_proyectos.rol')
        ->where('proyectos.id', $proyecto->id)->get();
        $miembros = $users->diff($integrantes);
 
        return view('actividades.edit', ['proyecto' => $proyecto, 'gestiones' => $gestiones, 'miembros' => $miembros, 'integrantes' => $integrantes]);
    }

    public function update (Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:255',
            //'tipo' => 'required|min:3|max:10',
            'gestion' => 'required',
            'ciudad' => 'required|min:3|max:50',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            //'objetivoGeneral' => 'required',
            //'objetivosEspecificos' => 'required',
            'ejecucion' => 'required',
            //'img' => 'required',
            //'imgP' => 'required',
            //'pdf' => 'required'
        ]);

        if($request->hasfile('img')){
            $file = $request->file('img');
            //$name = time().$file->getClientOriginalName();
            $name = str_replace(" ", "", strtolower($proyecto->nombre.$proyecto->fechaInicio)).'.png';
            $img = Image::make($file)->encode('png');
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            Storage::delete($name);
            $name = str_replace(" ", "", strtolower($request->nombre.$request->fechaInicio)).'.png';
            $img->save(public_path().'/images/actividades/'.$name);
            $request['fotoPrincipal'] = "/images/actividades/".$name;
            $img->destroy();
        }

        if($request->hasfile('imgP')){
            $file = $request->file('imgP');
            //$name = time().$file->getClientOriginalName();
            $name = str_replace(" ", "", strtolower($proyecto->nombre.'Portada'.$proyecto->fechaInicio)).'.png';
            $img = Image::make($file)->encode('png');
            $img->resize(900, 530, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            Storage::delete($name);
            $name = str_replace(" ", "", strtolower($request->nombre.'Portada'.$request->fechaInicio)).'.png';
            $img->save(public_path().'/images/actividades/'.$name);
            $request['fotoPortada'] = "/images/actividades/".$name;
            $img->destroy();
        }

        $proyecto->update($request->all());
        if ($request->tipo == 'proyecto' || $request->tipo == 'programa'){
            if ($request->director){
                $asignacion = new Asignar_proyecto();
                $asignacion->proyecto_id = $proyecto->id;
                $asignacion->user_id = $request->director;
                $asignacion->rol = "director";
                $asignacion->save();
            }
    
            if ($request->codirector != [null]){
                foreach ($request->codirector as $codirector){
                    $asignacion = new Asignar_proyecto();
                    $asignacion->proyecto_id = $proyecto->id;
                    $asignacion->user_id = $codirector;
                    $asignacion->rol = "codirector";
                    $asignacion->save();
                }
            }
    
            if ($request->colaborador != [null]){
                foreach ($request->colaborador as $colaborador){
                    $asignacion = new Asignar_proyecto();
                    $asignacion->proyecto_id = $proyecto->id;
                    $asignacion->user_id = $colaborador;
                    $asignacion->rol = "colaborador";
                    $asignacion->save();
                }
            }
            }
            else{
            if ($request->delegacion != [null]){
                foreach ($request->delegacion as $delegado){
                    $asignacion = new Asignar_proyecto();
                    $asignacion->proyecto_id = $proyecto->id;
                    $asignacion->user_id = $delegado;
                    $asignacion->rol = "delegacion";
                    $asignacion->save();
                }
            }
            }
        return redirect()->route('actividades.show', [$proyecto->tipo, $proyecto->id])->with('success','Proyecto actualizado correctamente.');
        /*if ($request->codirector == [null])
        { return ('codirector no existe');}
        else
        { return('codirector existe');}*/
        //return ($request);
    }
}
