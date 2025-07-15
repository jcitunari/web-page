@extends('app')
@section('tittle', 'Miembros | JCI Tunari')
@section('content')

<div class="container">
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-dismiss="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" data-bs-dismiss="alert">
                {{ session('danger') }}
            </div>
        @endif
        <!--Presentacion-->
        <div class="col-md-7" id="presentacionMain">
            <h2>Familia Tunari</h2>
            <p>Contamos con un equipo diverso conformado por estudiantes y profesionales de alto valor, personas de calidad dispuestas a crear cambios positivos.</p>
            <a class="btn btn-first" href="#membresia">Membresía</a>
            @if(auth()->check())
                @if(auth()->user()->rol == 'ADMIN')
                <a class="btn btn-second" href="{{ route('miembros.create') }}">Registrar</a>
                @endif
            @endif
            <div class="figura figuraPequena colorSecond medio"></div>
        </div>
        @if (count($miembros) != 0)
        <div class="col-md-5 contenedor text-center">
            <img src="{{ $miembros[0]->user->foto }}" class="cel" alt="presidente" width="80%" id="presidente">
            <div class="figura figuraPequena left200 colorFirst"></div>
            <div class="col-md-8 offset-4">
                <p id="etiqueta" width="200px">{{ $miembros[0]->user->nombre }} {{ $miembros[0]->user->apPaterno }} {{ $miembros[0]->user->apMaterno }}
                    <br>{{ $miembros[0]->nombre }}
                    @foreach ($gestiones as $gestion)
                        @if ($gestion->id == $anio)
                        {{ $gestion->anio }}
                        @endif
                    @endforeach
                </p>
            </div>
        </div>
        @endif
    </div>
</div>

<section id="membresia">
    <div class="container">
        <div style="position: relative; z-index: 10">
        <form action="{{ route('miembros.index') }}" method="GET">
            <div class="row">
                <div class="col-md-2 pt-50">
                    <select id="anio" class="form-select shadow-none" name="anio" value="{{ $anio }}">
                      @foreach ($gestiones as $gestion)
                        <option value="{{ $gestion->id }}"
                            {{ $anio == $gestion->id ? 'selected' : '' }}
                        >{{ $gestion->anio }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-1 pt-50 d-grid gap-2">
                    <input type="submit" value="Buscar" class="btn buscar">
                  </div>
            </div>
        </form>
        </div>
        <div class="text-center pt-20">
            @if (count($miembros) == 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert" data-bs-dismiss="alert">
                Aun no existen registros.
            </div>
        @endif
            <h3 class="">Comité Ejecutivo Local</h3>
            <p>EQUIPO DE TRABAJO</p>
            <div id="cel">
                <div class="row text-center">
                @foreach ($miembros as $miembro)
                @if ($miembro->prioridad < 10)
                    <div class="col-md-3 col-6 escalar" style="margin: 0 auto">
                        <a href="{{ route('miembros.show', $miembro->user->id) }}"><img src="{{$miembro->user->foto}}" class="cel" alt="" width="90%"></a>
                        <p><b>{{ $miembro->user->nombre}}<br>{{$miembro->user->apPaterno}} {{$miembro->user->apMaterno}}</b>
                        <br>{{ $miembro->nombre }}</p>
                    </div>
                @endif
                @endforeach
                </div>
            </div>
            <div class="relative">
                <div class="figura figura300 colorFirst right-320">
                </div>
            </div>
            <h3 class="pt-50">Junta Directiva Local</h3>
            <p>EQUIPO DE TRABAJO</p>
            <div id="jdl">
                <div class="row text-center">
                @foreach ($miembros as $miembro)
                @if ($miembro->prioridad == 10)
                <div class="col-md-3 col-6 escalar" style="margin: 0 auto">
                    <a href="{{ route('miembros.show', $miembro->user->id) }}"><img src="{{$miembro->user->foto}}" class="jdl" alt="" width="90%"></a>
                    <p><b>{{ $miembro->user->nombre}}<br>{{$miembro->user->apPaterno}} {{$miembro->user->apMaterno}}</b>
                        <br>{{ $miembro->nombre }}</p>
                </div>
                @endif
                @endforeach
                </div>
            </div>
            <div class="relative">
                <div class="figura figura300 colorThird">
                </div>
            </div>
            <h3 class="pt-50">Asamblea General</h3>
            <p>EQUIPO DE TRABAJO</p>
            <div id="asamblea" style="position: relative; z-index: 10">
                <div class="row text-center">
                @foreach ($miembros as $miembro)
                @if ( $miembro->prioridad == 11)
                <div class="col-md-3 col-6 escalar" style="margin: 0 auto">
                    <a href="{{ route('miembros.show', $miembro->user->id) }}"><img src="{{$miembro->user->foto}}" class="ag" alt="" width="90%"></a>
                    <p><b>{{ $miembro->user->nombre}}<br>{{$miembro->user->apPaterno}} {{$miembro->user->apMaterno}}</b>
                        <br>{{ $miembro->nombre }}</p>
                </div>
                @endif
                @endforeach
                </div>
            </div>
            <div class="relative">
                <div class="figura figura400 colorFirst right-320">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection