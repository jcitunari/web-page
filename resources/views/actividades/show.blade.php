@extends('app')
@section('tittle', 'Actividad | JCI Tunari')
@section('content')
<div class="container">
    <div class="row" style="position: relative; z-index=10">
        <div class="col-lg-5 col-md-12">
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
            <div class="pt-100" id="tituloActividad">
                <h3>{{ $proyecto->nombre }}</h3>
                <p style="text-transform: uppercase" class="miembro-p">{{ $proyecto->tipo }} JCI TUNARI</p>
                <p>Del {{ date('d/m/Y', strtotime($proyecto->fechaInicio)) }} al {{ date('d/m/Y', strtotime($proyecto->fechaFin)) }}</p>
                <a class="btn btn-first relative" href="{{ route('nosotros') }}">Acerca de Nosotros</a>
                @if(auth()->check())
                @if(auth()->user()->rol == 'ADMIN' || auth()->user()->rol == 'EDITOR')
                    <a class="btn buttonEditar" href="{{ route('actividades.edit', $proyecto) }}"><img src="/images/iconos/editar.png" width="30px" alt="" data-toggle="tooltip" title="Editar"></a>
                @endif
                @endif
            </div>
        </div>
        <div class="col-lg-7 col-md-12" >
            <div id="portadaActividad">
                <img src="{{ $proyecto->fotoPortada }}" class="redondearImg" alt="" width="120%">
            </div>
        </div>
    </div>
    <div class="row top-120">
        <div class="relative">
            <div class="figura figura400 colorSecond izquierdaSuperior">
            </div>
        </div>
        <div class="col-md-4 pb-5" style="padding-right: 30px" id="datosActividad">
            <img src="{{ $proyecto->fotoPrincipal }}" class="redondearImg" id="fotoPrin" alt="" width="100%">
            <p class="pt-3"><b>{{ $proyecto->nombre }}</b></p>
            <p style="text-transform: uppercase">{{ $proyecto->tipo }}</p>
            @if ($proyecto->tipo == 'proyecto' || $proyecto->tipo == 'programa')
                <p><b>Director:</b></p>
                @foreach ($users as $user)
                    @if ($user->rol == 'director')
                        <a href="{{ route('miembros.show', $user->id) }}" class="enlace">{{ $user->nombre.' '.$user->apPaterno }}</a>  
                    @endif
                @endforeach
                <p><b>Codirector(es):</b></p>
                @foreach ($users as $user)
                    @if ($user->rol == 'codirector')
                        <a href="{{ route('miembros.show', $user->id) }}" class="enlace">{{ $user->nombre.' '.$user->apPaterno }} ,  </a>  
                    @endif
                @endforeach
                <p><b>Colaborador(es):</b></p>
                @foreach ($users as $user)
                    @if ($user->rol == 'colaborador')
                        <a href="{{ route('miembros.show', $user->id) }}" class="enlace">{{ $user->nombre.' '.$user->apPaterno }} ,  </a>  
                    @endif
                @endforeach
            @elseif ($proyecto->tipo == 'actividad')
            <p><b>Delegacion representante:</b></p>
                @foreach ($users as $user)
                    @if ($user->rol == 'delegacion')
                        <a href="{{ route('miembros.show', $user->id) }}">{{ $user->nombre.' '.$user->apPaterno }} ,  </a>  
                    @endif
                @endforeach
            @endif
            @if ($proyecto->tipo == 'proyecto' || $proyecto->tipo == 'programa')
            <p><b>Público definido:</b></p>
            @elseif ($proyecto->tipo == 'actividad')
            <p><b>Ciudad:</b></p>
            @endif

            <p>{{ $proyecto->ciudad }}</p>
            @if(auth()->check())
                @if(auth()->user()->rol != 'INACTIVO')
                    @if ($proyecto->tipo == 'proyecto' || $proyecto->tipo == 'programa')
                    <p><b>Informe final:</b></p>
                    <a class="curriculum" href="{{ $proyecto->informe }}" target="_blank">Ver informe</a>
                    @endif
                @endif
            @endif
        </div>
        
        <div class="col-md-8 miembroDato mb-3" style="position: relative; z-index: 10">
            @if ($proyecto->tipo == 'proyecto' || $proyecto->tipo == 'programa')
            <p class="miembroTitulo">Objetivo General</p>
            <p class="justificado">{!! $proyecto->objetivoGeneral !!}</p>
            <p class="miembroTitulo">Objetivos Especificos</p>
            <p class="justificado">{!! $proyecto->objetivosEspecificos !!}</p>
            @endif
            <p class="miembroTitulo">Ejecución</p>
            <p class="justificado">{!! $proyecto->ejecucion !!}</p>
        </div>
        <div class="relative">
            <div class="figura figura300 colorFirst derechaArriba">
            </div>
            <div class="figura figuraPequena colorSecond derechaSuperior2">
            </div>
        </div>
    </div>
</div>
@endsection