<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ url('/') }}/images/logos/logo.ico">
    <title>@yield('tittle')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{ url('/public_jcitunari/') }}/js/script.js"></script>
    <link rel="stylesheet" href="{{ url('/public_jcitunari/') }}/css/styles.css">
    <link rel="stylesheet" href="{{ url('/public_jcitunari/') }}/css/styles3.css">
    <link rel="stylesheet" href="{{ url('/public_jcitunari/') }}/css/figuras.css">
    <script src="{{ url('/') }}/js/scrollreveal.js"></script>

</head>

<body>
    <span id="loadPage">
        <div>
            <img src="{{ url('/') }}/images/logos/loading.jpg" alt="" width="100%">
        </div>
    </span>
    <header>
        <!--Menu de navegacion-->
        <nav class="navbar navbar-expand-lg bg-light" style="padding: 0">
            <div class="container">
                <a class="navbar-brand" href="{{ route('inicio') }}">
                    <img src="{{ url('/') }}/images/logos/logo.png" alt="" width="116" height="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link navFont" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navFont" href="{{ route('nosotros') }}">Acerca de JCI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navFont" href="{{ route('miembros.index') }}">Miembros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navFont" href="{{ route('actividades.index') }}">Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navFont" href="{{ route('postulacion') }}">Postulación</a>
                        </li>
                        @if(auth()->check())
                            @if(auth()->user()->rol == 'ADMIN')
                                <li class="nav-item">
                                    <a class="nav-link navFont" href="{{ route('admin.index') }}">Usuarios</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle nav-link navFont " href="#" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ url('/') }}/images/iconos/configuracion.png" alt="conf"
                                            width="25px"></a>
                                    <ul class="dropdown-menu">
                                        @if(date('m') == '12')
                                            <li><a class="dropdown-item" href="{{ route('gestion.create') }}">Nueva
                                                    Gestión</a></li>
                                        @else
                                            <li><a class="dropdown-item disabled" href="#">Nueva Gestión</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('cargo.create') }}">Nueva
                                                Dirección</a></li>
                                        <li><a class="dropdown-item" href="{{ route('color.edit') }}">Actualizar
                                                Colores</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endif
                    </ul>
                    <form class="d-flex" role="search">
                        @if(auth()->check())
                            <a class=" buttonNombre">Bienvenid@ {{ auth()->user()->nombre }}</a>
                            <a class="btn buttonSecond" href="{{ route('login.destroy') }}">Cerrar sesión</a>
                        @else
                            <a class="btn buttonSecond" href="{{ route('login.index') }}">Iniciar sesión</a>
                            <!--<button class="btn buttonSecond" type="submit">Sing up</button>-->
                        @endif
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <!--Contenido-->
    <div class="contenido">
        @yield('content')
        <div class="text-center pt-50">
            <img src="{{ url('/') }}/images/logos/imagotipo2024v2.png" alt="slogan" height="100px">
        </div>
    </div>
    <!--Pie de pagina-->
    <footer class="bd-footer py-4 py-md-5 mt-5">
        <div class="container py-4 px-4 px-md-3">
            <div class="row">
                <div class="col-lg-5">
                    <a class="navbar-brand" href="{{ route('inicio') }}">
                        <img src="{{ url('/') }}/images/logos/logoWhite.png" alt="" width="300" height="">
                    </a>
                    <ul class="list-unstyled small">
                        <li class="mb-2">Desarrollado por
                            <a style="color: var(--second-color)" href="https://www.linkedin.com/in/ronaldobqc/"
                               target="_blank">@ronaldobqc</a>
                            y
                            <a style="color: var(--second-color)" href="https://www.linkedin.com/in/codingfer/"
                               target="_blank">@codingFer</a>
                            de la
                            <a style="color: var(--second-color)" href="{{ route('inicio') }}">JCI Tunari</a>
                            para el mundo.
                        </li>
                        <li class="mb-2">Copyright © 2023 - 2025 Universidad Mayor de San Simón.</li>
                        <li class="mb-2">Todos los derechos reservados.</li>
                    </ul>
                    <ul class="redes">
                        <li class="escalar"><a href="https://www.facebook.com/JCITunari" data-toggle="tooltip"
                                               data-placement="bottom"
                                               title="Facebook" target="_blank"><img
                                    src="{{ url('/') }}/images/iconos/facebook.png" alt="facebook"
                                    width="40px"></a></li>
                        <li class="escalar"><a href="https://www.instagram.com/jcitunari/" data-toggle="tooltip"
                                               data-placement="bottom"
                                               title="Instagram" target="_blank"><img
                                    src="{{ url('/') }}/images/iconos/instagram.png" alt="instagram"
                                    width="40px"></a></li>
                        <li class="escalar"><a href="https://www.linkedin.com/company/jcitunari/" data-toggle="tooltip"
                                               data-placement="bottom" title="Linkedin" target="_blank"><img
                                    src="{{ url('/') }}/images/iconos/linkedin.png" alt="linkedin" width="40px"></a>
                        </li>
                        <li class="escalar"><a href="https://www.tiktok.com/@jcitunari" data-toggle="tooltip"
                                               data-placement="bottom" title="Tiktok" target="_blank"><img
                                    src="{{ url('/') }}/images/iconos/tiktok.png" alt="tiktok" width="40px"></a></li>
                        <li class="escalar"><a href="https://www.youtube.com/channel/UCvudh5bfWInIRl717AZLlzg"
                                               data-toggle="tooltip"
                                               data-placement="bottom" title="Youtube" target="_blank"><img
                                    src="{{ url('/') }}/images/iconos/youtube.png" alt="youTube" width="40px"></a></li>
                        <li class="escalar"><a href="https://jcitunari.com/" data-toggle="tooltip"
                                               data-placement="bottom"
                                               title="Sitio Web" target="_blank"><img
                                    src="{{ url('/') }}/images/iconos/web.png" alt="sitioWeb"
                                    width="40px"></a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3 pt-5">
                    <h6>Organización</h6><br>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('inicio') }}">Inicio</a></li>
                        <li class="mb-2"><a href="{{ route('nosotros') }}">Acerca de JCI</a></li>
                        <li class="mb-2"><a href="{{ route('miembros.index') }}">Miembros</a></li>
                        <li class="mb-2"><a href="{{ route('postulacion') }}">Postulación</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3 pt-5">
                    <h6>Qué hacemos</h6><br>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('actividades.index') }}">Programas</a></li>
                        <li class="mb-2"><a href="{{ route('actividades.index') }}">Proyectos</a></li>
                        <li class="mb-2"><a href="{{ route('actividades.index') }}">Actividades</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3 mb-3 pt-5">
                    <h6>Contáctanos</h6><br>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">jcitunari@gmail.com</a></li>
                        <li class="mb-2"><a href="#">+591 60748880</a></li>
                        <li class="mb-2"><a href="#">jcitunari.com</a></li>
                        <li class="mb-2"><a href="#">Cochabamba, Bolivia - Av. Villarroel casi Oblitas,
                                Edificio Confort, Piso 9, Oficina 9D</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ url('/') }}/js/index.js"></script>
</body>

</html>
