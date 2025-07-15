@extends('app')
@section('tittle', 'Editar proyecto | JCI Tunari')
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
            @if ($proyecto->tipo == 'proyecto')
              <h3 class="text-center pt-20 tituloProyecto" >Edición de proyecto</h3>
            @elseif ($proyecto->tipo == 'actividad')
            <h3 class="text-center pt-20 tituloActividad" >Edición de actividad</h3>
            @elseif ($proyecto->tipo == 'programa')
            <h3 class="text-center pt-20 tituloActividad" >Edición de programa</h3>
            @endif
        </div>
        <div class="col-md-8 centro">
            <form  action="{{ route('actividades.update', [$proyecto]) }}" method="POST" class="row g-3" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="col-md-8">
                @if ($proyecto->tipo == 'proyecto')
                <input type="hidden" id="tipo" name="tipo" value="proyecto">
                <label for="nombre" class="form-label">Nombre del proyecto</label>
                @elseif ($proyecto->tipo == 'actividad')
                <input type="hidden" id="tipo" name="tipo" value="actividad">
                <label for="nombre" class="form-label">Nombre de la actividad</label>
                @elseif ($proyecto->tipo == 'programa')
                <input type="hidden" id="tipo" name="tipo" value="programa">
                <label for="nombre" class="form-label">Nombre del programa</label>
                @endif
                <input type="text" class="form-control shadow-none" id="nombre" name="nombre" value="{{ $proyecto->nombre }}">
                @error('nombre')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="gestion" class="form-label">Gestión</label>
                <select id="gestion" class="form-select shadow-none" name="gestion" value="{{ $proyecto->gestion_id }}">
                  <option value="" selected>Seleccionar...</option>
                  @foreach ($gestiones as $gestion)
                    <option value="{{ $gestion->id }}"
                        {{ $proyecto->gestion_id == $gestion->id ? 'selected' : '' }}
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
                <input type="text" class="form-control shadow-none" id="ciudad" name="ciudad" value="{{ $proyecto->ciudad }}">
                @error('ciudad')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control shadow-none" id="fechaInicio" name="fechaInicio" value="{{ $proyecto->fechaInicio }}">
                @error('fechaInicio')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
                </div>
                <div class="col-md-4">
                    <label for="fechaFin" class="form-label">Fecha de finalización</label>
                    <input type="date" class="form-control shadow-none" id="fechaFin" name="fechaFin" value="{{ $proyecto->fechaFin }}">
                    @error('fechaFin')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                  </div>

                  @if ($proyecto->tipo == 'proyecto' || $proyecto->tipo == 'programa')
                  <div class="col-md-4">
                    <label for="director" class="form-label">Director</label>
                    <select id="director" class="form-select shadow-none" name="director" value="" disabled>
                      <option value="" selected>
                        @if (count($integrantes) != 0)
                        @foreach ($integrantes as $integrante)
                        @if ($integrante->rol == "director")
                          {{$integrante->nombre.' '.$integrante->apPaterno}}
                        @endif
                      @endforeach
                        @endif
                      </option>
                    </select>
                  </div>

                  <div class="col-md-4">
                    <label for="codirector" class="form-label">Agregar codirector</label>
                    <div class="row">
                      @if (count($integrantes) != 0)
                      @foreach ($integrantes as $integrante)
                        @if ($integrante->rol == "codirector")
                        <div class="col-md-12 col-sm-12 col-12 d-grid gap-2">
                          <input type="text" class="form-control shadow-none" id="" name="" value="{{ $integrante->nombre.' '.$integrante->apPaterno }}" disabled>
                        </div>
                        @endif
                      @endforeach
                      @endif
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
                    <label for="colaborador" class="form-label">Agregar colaborador</label>
                    <div class="row">
                      @if (count($integrantes) != 0)
                      @foreach ($integrantes as $integrante)
                        @if ($integrante->rol == "colaborador")
                        <div class="col-md-12 col-sm-12 col-12 d-grid gap-2">
                          <input type="text" class="form-control shadow-none" id="" name="" value="{{ $integrante->nombre.' '.$integrante->apPaterno }}" disabled>
                        </div>
                        @endif
                      @endforeach
                      @endif
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
                <textarea class="form-control shadow-none" id="objetivoGeneral" name="objetivoGeneral" value="" rows="2" disabled>{{ $proyecto->objetivoGeneral }}</textarea>
                @error('objetivoGeneral')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-12" id="objEspecificos">
                <label for="objetivosEspecificos" class="form-label">Objetivos Específicos</label>
                <textarea class="form-control shadow-none" id="objetivosEspecificos" name="objetivosEspecificos" value="" rows="3" disabled>{{ $proyecto->objetivosEspecificos }}</textarea>
                @error('objetivosEspecificos')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              @endif
              <div class="col-md-12">
                <label for="ejecucion" class="form-label">Ejecución</label>
                <textarea class="form-control shadow-none" id="ejecucion" name="ejecucion" value="" rows="5">{{ $proyecto->ejecucion }}</textarea>
                @error('ejecucion')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              @if ($proyecto->tipo == 'actividad')
              <div class="col-md-4">
                <label for="delegacion" class="form-label">Delegación representante</label>
                <div class="row">
                  @if (count($integrantes) != 0)
                      @foreach ($integrantes as $integrante)
                        @if ($integrante->rol == "delegacion")
                        <div class="col-md-12 col-sm-12 col-12 d-grid gap-2">
                          <input type="text" class="form-control shadow-none" id="" name="" value="{{ $integrante->nombre.' '.$integrante->apPaterno }}" disabled>
                        </div>
                        @endif
                      @endforeach
                  @endif
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
              @if ($proyecto->tipo == 'proyecto' || $proyecto->tipo == 'programa')
              <div class="col-md-4">
                <label for="pdf" class="form-label">Informe Final</label>
                <input type="file" class="form-control shadow-none" id="pdf" name="pdf" value="{{ old('pdf') }}" disabled>
                @error('pdf')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              @endif
              <div class="col-md-6 col-6 d-grid gap-2 pt-20 pb-50">
                <button type="submit" id="submit" class="btn btn-second" onclick="executeProcess()">Actualizar</button>
              </div>
              <div class="col-md-6 col-6 d-grid gap-2 pt-20 pb-50">
                <a class="btn btn-first" href="{{ route('actividades.show', [$proyecto->tipo, $proyecto->id]) }}">Cancelar</a>
              </div>
            </form>

        </div>
    </div>
</div>

@endsection