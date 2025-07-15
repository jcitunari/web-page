@extends('app')
@section('tittle', 'Miembro | JCI Tunari')
@section('content')
<div class="container">
    <h3 class="text-center pt-20">Miembro de JCI Tunari</h3>
</div>
<div class="row">
    <div class="col-md-6 text-center miembroBack">
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
        <img src="{{$miembro->foto}}" width="55%" class="cel miembroFoto" id="presidente">
    </div>
    <div class="col-md-6 miembroPresentacion">
        <div class="miembroContenido" style="position: relative">
            <div class="padding50">
                @if(auth()->check())
                @if(auth()->user()->rol == 'ADMIN' || auth()->user()->id == $miembro->id)
                <div style="position: absolute; top:10px; right:10px">
                    <a class="btn buttonEditar" href="{{ route('miembros.edit', $miembro) }}"><img src="/images/iconos/editar.png" width="30px" alt="" data-toggle="tooltip" title="Editar"></a>
                </div>
                @endif
                @endif
                <p class="miembroTitulo">{{ $miembro->nombre }}</p>
                <p class="miembroTitulo">{{ $miembro->apPaterno }} {{ $miembro->apMaterno }}</p>
                <p>{{ $cargo ? $cargo->nombre : 'MIEMBRO INACTIVO' }}</p>
                <p class="justificado">{{ $miembro->presentacion }}</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row top-120">
            <div class="col-lg-6 col-md-12 col-sm-12 miembroDato mb-3">
                <p class="miembro-p">Profesión</p>
                <p class="miembroTitulo">{{ $miembro->profesion }}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 miembroDato mb-3">
                <p class="miembro-p">Fecha de juramento JCI</p>
                <p class="miembroTitulo">{{ date('d-m-Y', strtotime($miembro->fechaJuramento)) }}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 miembroDato mb-3">
                <p class="miembro-p">Proyectos ejecutados</p>
                <p class="miembroTitulo">{{ count($proyectos) }}</p>
            </div>
            <!--                -->
            <div class="col-lg-9 col-md-12 col-sm-12 miembroDato mb-3">
                <p class="miembro-p">Habilidades</p>
                <p class="miembroTitulo">{{ $miembro->intereses }}</p>
            </div>
            @if(auth()->check())
                @if(auth()->user()->rol != 'INACTIVO' || auth()->user()->id == $miembro->id)
            <div class="col-lg-3 col-md-6 col-sm-6 miembroDato mb-3">
                <p class="miembro-p">Ver</p>
                <a class="miembroTitulo curriculum" href="{{ $miembro->curriculum }}" target="_blank">Curriculum</a>
            </div>
            <!--                -->
            <div class="col-lg-6 col-md-12 col-sm-12 miembroDato mb-3">
                <p class="miembro-p">Correo Electronico</p>
                <p class="miembroTitulo">{{ $miembro->email }}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 miembroDato mb-3">
                <p class="miembro-p">Fecha de nacimiento</p>
                <p class="miembroTitulo">{{ date('d-m-Y', strtotime($miembro->fechaNacimiento)) }}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 miembroDato mb-3">
                <p class="miembro-p">Nro. Celular</p>
                <p class="miembroTitulo">{{ $miembro->celular }}</p>
            </div>
                @endif
            @endif
            <!--   -->
            <div class="col-lg-12 col-md-12 col-sm-12 miembroDato mb-3">
                <p class="miembro-p">Redes sociales de {{ $miembro->nombre }} {{ $miembro->apPaterno }}</p>
                <ul class="redes">
                    @if( $miembro->facebook )
                    <li class="escalar"><a href="{{ $miembro->facebook }}"data-toggle="tooltip" data-placement="bottom"
                            title="Facebook" target="_blank"><img src="{{ url('/') }}/images/iconos/facebook.png" alt="facebook"
                                width="50px"></a></li>@endif
                    @if( $miembro->instagram )
                    <li class="escalar"><a href="{{ $miembro->instagram }}"data-toggle="tooltip" data-placement="bottom"
                            title="Instagram" target="_blank"><img src="{{ url('/') }}/images/iconos/instagram.png" alt="instagram"
                                width="50px"></a></li>@endif
                    @if( $miembro->linkedin )
                    <li class="escalar"><a href="{{ $miembro->linkedin }}"data-toggle="tooltip"
                            data-placement="bottom" title="Linkedin" target="_blank"><img
                                src="{{ url('/') }}/images/iconos/linkedin.png" alt="linkedin" width="50px"></a></li>@endif
                    @if( $miembro->twitter )
                    <li class="escalar"><a href="{{ $miembro->twitter }}"data-toggle="tooltip"
                            data-placement="bottom" title="Twitter" target="_blank"><img
                                src="{{ url('/') }}/images/iconos/twitter.png" alt="twitter" width="50px"></a></li>@endif
                    @if( $miembro->tiktok )
                    <li class="escalar"><a href="{{ $miembro->tiktok }}"data-toggle="tooltip"
                            data-placement="bottom" title="Tiktok" target="_blank"><img
                                src="{{ url('/') }}/images/iconos/tiktok.png" alt="tiktok" width="50px"></a></li>@endif
                    @if( $miembro->web )
                    <li class="escalar"><a href="{{ $miembro->web }}"data-toggle="tooltip" data-placement="bottom"
                            title="Sitio Web" target="_blank"><img src="{{ url('/') }}/images/iconos/web.png" alt="sitioWeb"
                                width="50px"></a></li>@endif
                </ul>
            </div>
            <div class="relative">
                <div class="figura figuraPequena colorSecond izquierda2"></div>
            </div>
    </div>
    <div class="row  top-120">
        <div class="col-md-6" id="membresia">
            <h3>Carrera en JCI</h3>
            <p>Enfrentandose a nuevos desafíos.</p>
        </div>
        <div class="col-md-6">
            <p class="miembroTitulo">Proyectos en los que participó:</p>
            @if ( count($proyectos) == 0 )
            <p>No existen proyectos registrados</p>
            @else
            @foreach ($proyectos as $proyecto)
            <p class="miembro-p"><a class="enlace" href="{{ route('actividades.show', [$proyecto->tipo, $proyecto->id]) }}">{{ $proyecto->nombre }}</a></p>
            @endforeach
            @endif
        </div>
        <div class="relative">
            <div class="figura figura300 colorFirst right-320">
            </div>
        </div>
    </div>
    <!--<h3 class="text-center top-120">Redes sociales de {{ $miembro->nombre }} {{ $miembro->apPaterno }}</h3>-->
</div> 
@endsection