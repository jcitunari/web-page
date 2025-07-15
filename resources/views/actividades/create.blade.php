@extends('app')
@section('tittle', 'Create | JCI Tunari')
<script>
  
  function mostrarProyecto(){
    $(".pregunta").hide();
    $("#formProyecto").show();
    $(".tituloActividad").hide();
    $(".tituloProyecto").show();
    $("#tipo").val('proyecto')
    $("#objGeneral").show();
    $("#objEspecificos").show();
  }
  
  function agregarCodirector(){
    $("#dinamic").append(`<select id="codirector" class="form-select shadow-none" name="codirector[]" value="{{ old('codirector.1') }}">
                          <option value="" selected>Seleccionar...</option>
                          @foreach ($miembros as $miembro)
                            <option value="{{ $miembro->id }}"
                                {{ old('codirector.1') == $miembro->id ? 'selected' : '' }}
                            >{{ $miembro->nombre.' '.$miembro->apPaterno }}</option>
                          @endforeach
                        </select>`);
    $("#botones").append(`<button type="button" id="remove" class="btn btn-danger" onclick="quitarCodirector();">-</button>`);
    
  }

  function quitarCodirector(){
    $("#dinamic #codirector").last().remove();
    $("#botones #remove").last().remove();
  }
  
  function agregarColaborador(){
    $("#dinamic2").append(`<select id="colaborador" class="form-select shadow-none" name="colaborador[]" value="{{ old('colaborador.1') }}">
                          <option value="" selected>Seleccionar...</option>
                          @foreach ($miembros as $miembro)
                            <option value="{{ $miembro->id }}"
                                {{ old('colaborador.1') == $miembro->id ? 'selected' : '' }}
                            >{{ $miembro->nombre.' '.$miembro->apPaterno }}</option>
                          @endforeach
                        </select>`);
    $("#botones2").append(`<button type="button" id="remove2" class="btn btn-danger" onclick="quitarColaborador();">-</button>`);
    
  }

  function quitarColaborador(){
    $("#dinamic2 #colaborador").last().remove();
    $("#botones2 #remove2").last().remove();
  }

  function agregarDelegado(){
    $("#dinamic3").append(`<select id="delegacion" class="form-select shadow-none" name="delegacion[]" value="{{ old('delegacion.1') }}">
                          <option value="" selected>Seleccionar...</option>
                          @foreach ($miembros as $miembro)
                            <option value="{{ $miembro->id }}"
                                {{ old('delegacion.1') == $miembro->id ? 'selected' : '' }}
                            >{{ $miembro->nombre.' '.$miembro->apPaterno }}</option>
                          @endforeach
                        </select>`);
    $("#botones3").append(`<button type="button" id="remove3" class="btn btn-danger" onclick="quitarDelegado();">-</button>`);
    
  }

  function quitarDelegado(){
    $("#dinamic3 #delegacion").last().remove();
    $("#botones3 #remove3").last().remove();
  }

  

</script>
@section('content')

<div class="container">

  <!--<div class="btn-group pt-20" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-first" onclick="mostrarProyecto();">Proyecto</button>
  </div>-->
    <div class="row" id="formProyecto">
        <div class="col-md-12">
            @if ($tipo == 'proyecto')
              <h3 class="text-center pt-20 tituloProyecto" >Registro de proyecto</h3>
            @elseif ($tipo == 'actividad')
            <h3 class="text-center pt-20 tituloActividad" >Registro de actividad</h3>
            @elseif ($tipo == 'programa')
            <h3 class="text-center pt-20 tituloActividad" >Registro de programa</h3>
            @endif
        </div>
        <div class="col-md-8 centro">
            <form  action="{{ route('actividades.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
              @csrf
              <div class="col-md-8">
                @if ($tipo == 'proyecto')
                <input type="hidden" id="tipo" name="tipo" value="proyecto">
                <label for="nombre" class="form-label">Nombre del proyecto</label>
                @elseif ($tipo == 'actividad')
                <input type="hidden" id="tipo" name="tipo" value="actividad">
                <label for="nombre" class="form-label">Nombre de la actividad</label>
                @elseif ($tipo == 'programa')
                <input type="hidden" id="tipo" name="tipo" value="programa">
                <label for="nombre" class="form-label">Nombre del programa</label>
                @endif
                <input type="text" class="form-control shadow-none" id="nombre" name="nombre" value="{{ old('nombre') }}">
                @error('nombre')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="gestion" class="form-label">Gestión</label>
                <select id="gestion" class="form-select shadow-none" name="gestion" value="{{ old('gestion') }}">
                  <option value="" selected>Seleccionar...</option>
                  @foreach ($gestiones as $gestion)
                    <option value="{{ $gestion->id }}"
                        {{ old('gestion') == $gestion->id ? 'selected' : '' }}
                    >{{ $gestion->anio }}</option>
                  @endforeach
                </select>
                @error('gestion')
                    <small class="text-danger" role="alert">
                        Seleccione una Gestión
                    </small>
                @enderror
              </div>

              <div class="col-md-4">
                <label for="ciudad" class="form-label">Ciudad/Locación</label>
                <input type="text" class="form-control shadow-none" id="ciudad" name="ciudad" value="{{ old('ciudad') }}">
                @error('ciudad')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control shadow-none" id="fechaInicio" name="fechaInicio" value="{{ old('fechaInicio') }}">
                @error('fechaInicio')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
                </div>
                <div class="col-md-4">
                    <label for="fechaFin" class="form-label">Fecha de finalización</label>
                    <input type="date" class="form-control shadow-none" id="fechaFin" name="fechaFin" value="{{ old('fechaFin') }}">
                    @error('fechaFin')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                  </div>

                  @if ($tipo == 'proyecto' || $tipo == 'programa')
                  <div class="col-md-4">
                    <label for="director" class="form-label">Director</label>
                    <select id="director" class="form-select shadow-none" name="director" value="{{ old('director') }}">
                      <option value="" selected>Seleccionar...</option>
                      @foreach ($miembros as $miembro)
                        <option value="{{ $miembro->id }}"
                            {{ old('director') ==  $miembro->id ? 'selected' : '' }}
                        >{{ $miembro->nombre.' '.$miembro->apPaterno }}</option>
                      @endforeach
                    </select>
                    @error('director')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                  </div>

                  <div class="col-md-4">
                    <label for="codirector" class="form-label">Codirector</label>
                    <div class="row">
                      <div class="col-md-8 col-sm-8 col-8 d-grid gap-2" id="dinamic">
                        <select id="codirector" class="form-select shadow-none" name="codirector[]" value="{{ old('codirector.0') }}">
                          <option value="" selected>Seleccionar...</option>
                          @foreach ($miembros as $miembro)
                            <option value="{{ $miembro->id }}"
                                {{ old('codirector.0') ==  $miembro->id ? 'selected' : '' }}
                            >{{ $miembro->nombre.' '.$miembro->apPaterno }}</option>
                          @endforeach
                        </select>
                      </div>
                  <div class="col-md-4 col-sm-4 col-4 d-grid gap-2" id="botones">
                    <button type="button" class="btn btn-success " onclick="agregarCodirector();">+</button>
                  </div>
                </div>  
                  </div>

                  <div class="col-md-4">
                    <label for="colaborador" class="form-label">Colaboradores</label>
                    <div class="row">
                      <div class="col-md-8 col-sm-8 col-8 d-grid gap-2" id="dinamic2">
                        <select id="colaborador" class="form-select shadow-none" name="colaborador[]" value="{{ old('colaborador.0') }}">
                          <option value="" selected>Seleccionar...</option>
                          @foreach ($miembros as $miembro)
                            <option value="{{ $miembro->id }}"
                                {{ old('colaborador.0') ==  $miembro->id ? 'selected' : '' }}
                            >{{ $miembro->nombre.' '.$miembro->apPaterno }}</option>
                          @endforeach
                        </select>
                      </div>
                  <div class="col-md-4 col-sm-4 col-4 d-grid gap-2" id="botones2">
                    <button type="button" class="btn btn-success " onclick="agregarColaborador();">+</button>
                  </div>
                </div>  
                  </div>

                  
              
              <div class="col-md-12" id="objGeneral">
                <label for="objetivoGeneral" class="form-label">Objetivo General</label>
                <textarea class="form-control shadow-none" id="objetivoGeneral" name="objetivoGeneral" value="" rows="2">{{ old('objetivoGeneral') }}</textarea>
                @error('objetivoGeneral')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-12" id="objEspecificos">
                <label for="objetivosEspecificos" class="form-label">Objetivos Específicos</label>
                <textarea class="form-control shadow-none" id="objetivosEspecificos" name="objetivosEspecificos" value="" rows="3">{{ old('objetivosEspecificos') }}</textarea>
                @error('objetivosEspecificos')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              @endif
              <div class="col-md-12">
                <label for="ejecucion" class="form-label">Ejecución</label>
                <textarea class="form-control shadow-none" id="ejecucion" name="ejecucion" value="" rows="5">{{ old('ejecucion') }}</textarea>
                @error('ejecucion')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              @if ($tipo == 'actividad')
              <div class="col-md-4">
                <label for="delegacion" class="form-label">Delegación representante</label>
                <div class="row">
                  <div class="col-md-8 col-sm-8 col-8 d-grid gap-2" id="dinamic3">
                    <select id="delegacion" class="form-select shadow-none" name="delegacion[]" value="{{ old('delegacion.0') }}">
                      <option value="" selected>Seleccionar...</option>
                      @foreach ($miembros as $miembro)
                        <option value="{{ $miembro->id }}"
                            {{ old('delegacion.0') ==  $miembro->id ? 'selected' : '' }}
                        >{{ $miembro->nombre.' '.$miembro->apPaterno }}</option>
                      @endforeach
                    </select>
                  </div>
              <div class="col-md-4 col-sm-4 col-4 d-grid gap-2" id="botones3">
                <button type="button" class="btn btn-success " onclick="agregarDelegado();">+</button>
              </div>
            </div>  
              </div>
              @endif
              <div class="col-md-4">
                <label for="img" class="form-label">Foto Principal (1:1)</label>
                <input type="file" class="form-control shadow-none" id="img" name="img" value="{{ old('img') }}">
                @error('img')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="imgP" class="form-label">Foto Portada (16:9)</label>
                <input type="file" class="form-control shadow-none" id="imgP" name="imgP" value="{{ old('imgP') }}">
                @error('imgP')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              @if ($tipo == 'proyecto' || $tipo == 'programa')
              <div class="col-md-4">
                <label for="pdf" class="form-label">Informe Final</label>
                <input type="file" class="form-control shadow-none" id="pdf" name="pdf" value="{{ old('pdf') }}">
                @error('pdf')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              @endif
              <div class="col-md-6 col-6 d-grid gap-2 pt-20 pb-50">
                <button type="submit" id="submit" class="btn btn-second" onclick="executeProcess()">Registrar</button>
              </div>
              <div class="col-md-6 col-6 d-grid gap-2 pt-20 pb-50">
                <a class="btn btn-first" href="{{ route('actividades.index') }}">Cancelar</a>
              </div>
            </form>

        </div>
    </div>
</div>

@endsection