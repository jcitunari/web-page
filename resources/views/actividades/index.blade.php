@extends('app')
@section('tittle', 'Actividades | JCI Tunari')
@section('content')

<div class="fondoActividades">
    <div class="container">
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
        <div class="col-md-6 pb-50" id="presentacionMain">
            <h2>Cambios positivos</h2>
            <p>Buscamos soluciones sostenibles a problemas existentes, trabajamos al servicio de la comunidad.</p>
            <a class="btn btn-first" href="#actividades">Actividades</a>
            @if(auth()->check())
                @if(auth()->user()->rol == 'ADMIN' || auth()->user()->rol == 'EDITOR')
                <a class="dropdown-toggle btn btn-second" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Registrar
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('actividades.create', ['proyecto']) }}">Proyecto</a></li>
                  <li><a class="dropdown-item" href="{{ route('actividades.create', ['programa']) }}">Programa</a></li>
                  <li><a class="dropdown-item" href="{{ route('actividades.create', ['actividad']) }}">Actividad</a></li>
                </ul>
                @endif
            @endif
            <div class="figura figuraPequena colorSecond medio"></div>
        </div>
    </div>
</div>
<div class="container" id="actividades">
    <h3 class="text-center pt-50">Programas, proyectos y actividades</h3>
    <div>
        <form action="{{ route('actividades.index') }}" method="GET">
            <div class="row">
                <div class="col-md-5 pt-20">
                    @if ($palabra == '')
                    <input class="form-control shadow-none" type="text" name="buscar" id="buscar" placeholder="Palabra">
                    @else
                    <input class="form-control shadow-none" type="text" name="buscar" id="buscar" value="{{ $palabra }}" placeholder="Palabra">
                    @endif
                  </div>
                  <div class="col-md-1 d-grid gap-2 pt-20">
                    <input type="submit" value="Buscar" class="btn buscar">
                  </div>
                  <div class="col-md-1 d-grid gap-2 pt-20">
                    <a href="{{ route('actividades.index') }}" class="btn limpiar">Limpiar</a>
                  </div>
            </div>
        </form>
    </div>
    <div class="row pt-20" style="position: relative; z-index:10" id="proyectos">
        @if (!$proyectos[0])
            <div class="alert alert-danger alert-dismissible fade show" role="alert" data-bs-dismiss="alert">
                No existen resultados.
            </div>
        @endif
        @foreach ( $proyectos as $proyecto)
        <div class="col-lg-3 col-md-6 pt-20">
            <a href="{{ route('actividades.show', [$proyecto->tipo, $proyecto->id]) }}" style="text-decoration: none">
                <div class="card escalar2" >
                    <img src="{{ $proyecto->fotoPrincipal }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title miembroTitulo">{{ $proyecto->nombre }}</h5>
                      <p class="card-text proyecto-p">{{ $proyecto->resumen }}...</p>
                      <a href="{{ route('actividades.show', [$proyecto->tipo, $proyecto->id]) }}" class="btn buttonDetalles">Más detalles</a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        {{ $proyectos->links() }}
    </div>
    @if ($proyectos[0])
    <div class="relative">
        <div class="figura figuraMediana colorSecond left-200">
        </div>
    </div>
    @endif
</div>

@endsection