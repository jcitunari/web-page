@extends('app')
@section('tittle', 'JCI Tunari')
@section('content')

    <div class="container">
        <div class="row">
            <!--Presentacion-->
            <div class="col-md-6" id="presentacionMain">
                <div style="position: relative">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-dismiss="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                <h2>Escuela de líderes</h2>
                <p>La JCI Tunari es una organización que impulsa el liderazgo, desarrollo personal, responsabilidad social y
                    ambiental en sus miembros y en la ciudad de Cochabamba, Bolivia.</p>
                <a class="btn btn-first" href="{{ route('nosotros') }}">Acerca de Nosotros</a>
                <div class="figura figuraPequena colorSecond medio"></div>
            </div>
            <div class="col-md-6 contenedor">
                <img src="{{ url('/') }}/images/fotografias/portada2022.jpg" id="portada" alt="" width="110%">
                <div class="figura figuraGrande colorFirst derecha"></div>
                <div class="figura figuraPequena left200 colorFirst"></div>
            </div>
            <!--Nos caracterizamos por-->
            <section class="row pb-100">
                <h3 class="text-center top-120 caracterizamos">Nos caracterizamos por</h3>
                <div class="col-md-3 text-center caracterizamos">
                    <div class="figura figura80 colorThird medioCaja">
                        <img src="{{ url('/') }}/images/iconos/liderazgo2.png" alt="" width="100%">
                    </div>
                    <p><strong>Liderazgo</strong><br>Desarrollo de habilidades blandas. </p>
                </div>
                <div class="col-md-3 text-center caracterizamos">
                    <div class="figura figura80 colorThird medioCaja">
                        <img src="{{ url('/') }}/images/iconos/innovacion.png" alt="" width="100%">
                    </div>
                    <p><strong>Innovación</strong><br>A la vanguardia de nuevas herramientas y soluciones.</p>
                </div>
                <div class="col-md-3 text-center caracterizamos">
                    <div class="figura figura80 colorThird medioCaja">
                        <img src="{{ url('/') }}/images/iconos/activismo.png" alt="" width="80%">
                    </div>
                    <p><strong>Activismo</strong><br>Proyectos de voluntariado en nuestra comunidad.</p>
                </div>
                <div class="col-md-3 text-center caracterizamos">
                    <div class="figura figura80 colorThird medioCaja">
                        <img src="{{ url('/') }}/images/iconos/tecnologia.png" alt="" width="80%">
                    </div>
                    <p><strong>Tecnología</strong><br>Digitalización de recursos para libre acceso.</p>
                </div>
                <div class="relative">
                    <div class="figura figuraPequena colorSecond izquierda"></div>
                </div>
            </section>
        </div>
    </div>
    <!--Por que ser parte de la JCI-->
    <div class="fondo text-center">
        <h3 id="porque" class="top-120 color-white">¿Por qué ser parte de la JCI Tunari?</h3>
        <p class="color-white">Somos jóvenes, líderes, emprendedores en todo el mundo. <br>
            Vivimos, nos comunicamos, actuamos y creamos impacto en nuestras comunidades. <br>
            ¿Eres un joven ciudadano activo? <br>
            ¿Deseas marcar una diferencia en tu comunidad? <br>
            Únete a nosotros en este viaje de acción local para alcanzar un impacto global.</p>
        <a class="btn btn-first" href="{{ route('postulacion') }}">Postula ahora</a>
    </div>
    <!--Nuestros logros-->
    <section class="datos color-white">
        <div class="container">
            <h3 class="m-0" id="datos">Algunos de nuestros logros</h3>
            <p>Trabajando por un mundo mejor.</p>
        </div>
    </section>
    <div class="container">
        <div class="row hexagonos">
            <div class="col-md-3 col-12 col-sm-6 text-center p-0 m-0">
                <div class="hexagon">
                    <h4><span class="counter" data-count="30">0</span>+<br>
                        <p>Miembros Activos</p>
                    </h4>
                </div>
            </div>
            <div class="col-md-3 col-12 col-sm-6 text-center p-0 m-0">
                <div class="hexagon">
                    <h4><span class="counter" data-count="50">0</span>+<br>
                        <p>Proyectos ejecutados</p>
                    </h4>
                </div>
            </div>
            <div class="col-md-3 col-12 col-sm-6 text-center p-0 m-0">
                <div class="hexagon">
                    <h4><span class="counter" data-count="4000">0</span>+<br>
                        <p>Personas alcanzadas</p>
                    </h4>
                </div>
            </div>
            <div class="col-md-3 col-12 col-sm-6 text-center p-0 m-0">
                <div class="hexagon">
                    <h4><span class="counter" data-count="8">0</span>+<br>
                        <p>Años al servicio</p>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!--Nuestros miembros-->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12 top-120 miembro1">
                <h3>Nuestros queridos miembros</h3>
                <p>Contamos con un equipo diverso conformado por estudiantes y profesionales de alto valor, personas de
                    calidad dispuestas a crear cambios positivos.</p>
                <a class="btn btn-first mb-5" href="{{ route('miembros.index') }}">Equipo de trabajo</a>
            </div>
            <div class="col-md-6 col-12 top-120 miembro2">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-4"><img src="{{ url('/') }}/images/fotografias/KarenObando.jpg" class="nuestros"
                            alt="" width="100%"></div>
                    <div class="col-md-4 col-sm-4 col-4"><img src="{{ url('/') }}/images/fotografias/EmilseLazo.jpg" class="nuestros"
                            alt="" width="100%"></div>
                    <div class="col-md-4 col-sm-4 col-4"><img src="{{ url('/') }}/images/fotografias/PabloMeruvia.jpg" class="nuestros"
                            alt="" width="100%"></div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-4 offset-2"><img src="{{ url('/') }}/images/fotografias/JhennyMiranda.jpg"
                            class="nuestros" alt="" width="100%"></div>
                    <div class="col-md-4 col-sm-4 col-4"><img src="{{ url('/') }}/images/fotografias/MauricioSeveriche.jpg" class="nuestros"
                            alt="" width="100%"></div>
                </div>
            </div>
            <!--Areas de oportunidad-->
            <h3 class="text-center top-120">Áreas de oportunidad de la JCI</h3>
            <div class="col-md-3 col-12 col-sm-6 area text-center">
                <h6 class="pt-5"><b>Desarrollo Personal</b></h6>
                <p>Sal de tu zona de confort, toma las riendas y gana el título de ¡Comunicador global! Nos centramos en la
                    mejora personal continua, en ser un mejor líder hoy que ayer. Junto con otros miembros de la JCI,
                    adquirirás habilidades más allá de lo que has aprendido en la universidad o en tu carrera, como la
                    confianza en ti mismo, el espíritu empresarial, la capacidad de recuperación y la cooperación, en
                    particular a través de nuestros programas de formación.</p>
            </div>
            <div class="col-md-3 col-12 col-sm-6 area text-center">
                <h6 class="pt-5"><b>Negocios y emprendimiento</b></h6>
                <p>¡Aprovecha tu lado competitivo y tu espíritu emprendedor como Emprendedor Global! Los programas de la JCI
                    son una oportunidad para mostrar lo que has aprendido y llevar tus habilidades de liderazgo al siguiente
                    nivel. Con una variedad de maneras de participar, hay algo para todos, incluida la oportunidad de
                    mejorar tu negocio a través del programa de Jóvenes Emprendedores Creativos.</p>
            </div>
            <div class="col-md-3 ccol-12 col-sm-6 area text-center">
                <h6 class="pt-5"><b>Acción comunitaria</b></h6>
                <p>Utiliza tu talento para pasar a la acción y convertirte en Agentes de cambio global. Los proyectos RISE
                    de la JCI, que buscan soluciones económicas a problemas complejos, son una oportunidad única para
                    plantearte un desafío, desarrollar tus habilidades y ayudar a dar forma al futuro a través de una
                    metodología probada. Los miembros de la JCI ayudan a que tus ideas provoquen impacto a través de la
                    participación activa en las comunidades, los negocios y la sociedad.</p>
            </div>
            <div class="col-md-3 col-12 col-sm-6 area text-center">
                <h6 class="pt-5 relative"><b>Cooperación internacional</b></h6>
                <p>Forma parte de nuestra familia global y amplía tus conocimientos como Networker Global. Los eventos de la
                    JCI son una oportunidad para viajar a lugares nuevos, vivir conceptos nuevos y convertirte en un líder
                    mejor, mientras conoces a otros jóvenes líderes emprendedores que marcan la diferencia en todo el mundo.
                </p>
            </div>
        </div>
    </div>
    </div>
    <div class="relative">
        <div class="figura figuraGrande colorSecond left-200"></div>
        <div class="figura figuraPequena colorFirst right50"></div>
        <div class="figura figuraPequena colorFirst derechaSuperior"></div>
    </div>
@endsection
