@extends('app')
@section('tittle', 'Nosotros | JCI Tunari')
@section('content')

    <div class="container">
        <h2 class="text-center pt-20">Somos jóvenes líderes emprendedores</h2>
        <div class="relative">
            <div class="figura figuraSmall colorFirst z1"></div>
            <div class="figura figuraSmall colorFirst z2"></div>
            <div class="figura figuraSmall colorFirst z3"></div>
            <div class="figura figuraSmall colorFirst z4"></div>
            <div class="figura figuraSmall colorFirst z5"></div>
            <div class="figura figuraSmall colorSecond y1"></div>
            <div class="figura figuraSmall colorSecond y2"></div>
            <div class="figura figuraSmall colorSecond y3"></div>
            <div class="figura figuraSmall colorSecond y4"></div>
            <div class="figura figuraSmall colorSecond y5"></div>
        </div>
        <!--Lofotipo-->
        <div class="text-center">
            <div class="circuloLogo">
                <img src="images/logos/logoWhite.png" alt="jciTunari" style="padding: 80px 0" width="100%">
            </div>
        </div>
    </div>
    <div class="relative text-center">
        <div class="circulo"></div>
    </div>
    <!--Fotografia-->
    <div class="pt-50">
        <img src="images/fotografias/JCITunari2023.jpg" id="nosotros" width="100%" alt="transmisionDeMando">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" id="queEs">
                <h5>JCI Tunari</h5>
                <p>JCI significa Cámara Junior Internacional, es la mayor organización juvenil en todo el mundo.
                    La JCI Tunari fue fundada el 13 de Julio de 2015 en la ciudad de Cochabamba – Bolivia por la iniciativa
                    de crear cambios positivos en nuestra comunidad mediante la formación de jóvenes líderes emprendedores
                    para un mundo cambiante.</p>
            </div>
            <div class="figura figuraPequena colorSecond izquierda"></div>
        </div>
        <!--Mision-->
        <div class="col-md-12" id="mision">
            <div class="row">
                <div class="col-md-8 text-center mision">
                    <h6>MISIÓN</h6>
                    <p>Ofrecer oportunidades de desarrollo de liderazgo que empoderen a los jóvenes para crear un cambio positivo.</p>
                </div>
                <div class="col-md-4">
                    <img src="images/fotografias/mision.png" alt="mision" class="redondearImg" width="100%">
                </div>
            </div>
        </div>
        <!--Vision-->
        <div class="col-md-12" id="vision">
            <div class="row">
                <div class="col-md-4">
                    <img src="images/fotografias/vision.png" alt="vision" class="redondearImg" width="100%">
                </div>
                <div class="col-md-8 text-center mision">
                    <h6>VISIÓN</h6>
                    <p>Ser la principal red mundial de jóvenes líderes.</p>
                </div>
            </div>
        </div>
        <!--Valores-->
        <div class="col-md-12" id="valores">
            <div class="row">
                <div class="col-md-12 text-center valores">
                    <h6>VALORES</h6>
                    <p>Que la fé en Dios da sentido y objeto a la vida;
                        Que la hermandad de los hombres trasciende la soberanía de las naciones;
                        Que la justicia económica puede ser mejor obtenida por hombres libres a través de la libre empresa;
                        Que los gobiernos deben ser de leyes más que de hombres;
                        Que el gran tesoro de la tierra reside en la personalidad humana;
                        Y que servir a la humanidad es la mejor obra de una vida.
                    </p>
                </div>
            </div>
        </div>
        <!--Mas de Nosotros-->
        <div class="row relative" style="z-index:10">
            <div class="col-md-6 col-12 top-120" id="masDe">
                <h3>Más de nosotros</h3>
                <p>Somos una familia unida, a la espera de nuevos miembros dispuestos a convertirse en los futuros líderes
                    que nuestra ciudad y país necesitan.</p>
                <a class="btn btn-first mb-5" href="{{ route('postulacion') }}">Postula ahora</a>
            </div>
            <div class="col-md-6 col-sm-12 col-12 top-120 pb-50" id="video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/_o-X5ivWaMM"
                    style="border-radius: 8px" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
        <div class="relative">
            <div class="figura figuraMediana colorSecond left-350">
            </div>
        </div>
        <!--Marco de accion-->
        <div class="row">
            <div class="col-md-10 col-10">
                <h3 class="top-120">Marco de acción de la JCI</h3>
            </div>
            <div class="col-md-2 col-2">
                <div class="figura figuraPequena colorFirst izquierda"></div>
            </div>
        </div>
        <div class="row pt-20 pb-50" id="marco">
            <div class="col-md-3 col-6 pt-50">
                <div class="text-center figura figura80 analizar">
                    <img src="images/iconos/1.png" class="marcoIconos">
                </div>
                <p>
                <h6>Analizar</h6><br>Profundizar tu comprensión de un desafío al descubrir las causas fundamentales del
                problema.</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="text-center figura figura80 desarrollar">
                    <img src="images/iconos/2.png" class="marcoIconos">
                </div>
                <p>
                <h6>Desarrollar</h6><br>Diseñar una solución y formular un plan para abordar las causas fundamentales de su
                desafío.</p>
            </div>
            <div class="col-md-3 col-6 pt-50">
                <div class="text-center figura figura80 ejecutar">
                    <img src="images/iconos/3.png" class="marcoIconos">
                </div>
                <p>
                <h6>Ejecutar</h6><br>Implementar y probar tu solución.</p>
            </div>
            <div class="col-md-3 col-6 marco">
                <div class="text-center figura figura80 revisar">
                    <img src="images/iconos/4.png" class="marcoIconos">
                </div>
                <p>
                <h6>Revisar</h6><br>Determinar si tu plan está bien encaminado para alcanzar tus
                objetivos.</p>
            </div>
        </div>
        <div class="relative">
            <div class="figura figura400 colorFirst right-320">
            </div>
        </div>
    </div>



@endsection
