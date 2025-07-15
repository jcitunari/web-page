@extends('app')
@section('tittle', 'Postulacion | JCI Tunari')
@section('content')

<!--<div class="text-center top-120 pb-50">
    <h6 class="pb-50"><b>SITIO WEB EN DESARROLLO</b></h6>
    <img src="images/logos/tunariGif2.gif" alt="" class="pb-50">
    <p>Estamos trabajando para ofrecerte una mejor experiencia</p>
</div>-->
<div class="fondo-postulacion">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-dismiss="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center align-items-center p-5" id="postulacion">
            <div class="col-md-12 ptb-40" id="">  
                <h2 class="text-center">Leaders of Tomorrow</h2>
                <!--<div class="figura figuraPequena colorSecond medio"></div>-->
            </div>
            <div class="col-md-7 justificado">
                <p id="parrafoPost"><span style="color: #212529">
                    “Leaders of Tomorrow” es un programa de reclutamiento de nuevos miembros 
                    de alto valor para JCI Tunari. El programa está diseñado para que los 
                    postulantes puedan obtener un panorama general de lo que es la JCI Tunari, 
                    así como desarrollar habilidades en protocolo y gestión de proyectos, que 
                    son la base para el correcto desenvolvimiento en las actividades de la 
                    organización. También se incluyen actividades de confraternización, que 
                    tiene el objetivo de generar confianza e introducir a los miembros con 
                    los postulantes.<br>
                    El programa busca reclutar miembros, cuyos perfiles se alineen a la misión 
                    y visión de la JCI, por lo que, para un mejor enfoque, se dividió el programa 
                    en 5 fases que se detallan a continuación.</span>
                </p>
            </div>
            <div class="col-md-5">
                <img src="{{ url('/') }}/images/postulacion/leader.svg" alt="postulacion" width="100%">
            </div>
            
            <div class="grid ptb-40">
                <div class="p-3 box1">
                    <h3>FASE I: Registro de postulantes</h3>
                    <div style="text-align: center">
                        <img src="{{ url('/') }}/images/postulacion/form.svg" alt="form" width="80%">
                    </div>
                    <ul style="list-style-type:lower-alpha">
                        <li>Convocatoria abierta</li>
                            <ul>
                                <li>Fecha: 14 al 27 de Agosto.</li>
                            </ul>
                        <li>Llenado del Formulario para nuevos postulantes <a style="color: var(--second-color)" href="https://docs.google.com/forms/d/e/1FAIpQLSeSzn_bW28x035hZgW3T2V_IP6McYptGIbxOqtI60WH3yiL9A/viewform?usp=sf_link " target="_blank">aquí</a></li>
                    </ul>
                </div>
                <div class="p-3 box2">
                    <h3>FASE II: Inducción a JCI Tunari</h3>
                    <div style="text-align: center">
                        <img src="{{ url('/') }}/images/postulacion/profile.svg" alt="profile" width="80%">
                    </div>
                    <ul style="list-style-type:lower-alpha">
                        <li>20ma Asamblea Ordinaria: “Presentación de Postulantes”.</li>
                            <ul>
                                <li>Fecha: Miércoles 30 de Agosto.</li>
                                <li>Hora: 19:00 horas.</li>
                            </ul>
                        <li>Actividad de Confraternización.</li>
                            <ul>
                                <li>Fecha: Sábado 2 de Septiembre.</li>
                                <li>Hora: 16:00 horas.</li>
                            </ul>
                        <li>Primera Capacitación: “Inducción a JCI Tunari”.</li>
                            <ul>
                                <li>Fecha: Sábado 9 de Septiembre.</li>
                                <li>Hora: 16:00 horas.</li>
                            </ul>
                    </ul>
                </div>
                <div class="p-3 box3">
                    <h3>FASE III: Fundamentos Básicos y Formación.</h3>
                    <div style="text-align: center">
                        <img class="imgFase3" src="{{ url('/') }}/images/postulacion/learning.svg" alt="learning">
                    </div>
                    <ul style="list-style-type:lower-alpha">
                        <li>Taller Emprendimiento.</li>
                        <ul>
                            <li>Fecha: Sábado 16 de Septiembre.</li>
                            <li>Hora: 16:00 horas.</li>
                            <li>Lugar: Por confirmar.</li>
                        </ul>
                        <li>Actividad de Confraternización.</li>
                        <ul>
                            <li>Fecha: Viernes 23 o Domingo 24 de Septiembre.</li>
                            <li>Lugar: Por confirmar.</li>
                        </ul>
                        <li>Entrevistas Personales.</li>
                        <ul>
                            <li>Fecha: Lunes 25 de Septiembre.</li>
                            <li>Hora: 18:00 horas.</li>
                            <li>Lugar: Por confirmar.</li>
                        </ul>
                    </ul>
                </div>
                <div class="p-3 box1">
                    <h3>FASE IV: Integración y Afiliación.</h3>
                    <div style="text-align: center">
                        <img src="{{ url('/') }}/images/postulacion/group.svg" alt="group" width="80%">
                    </div>
                    <ul style="list-style-type:lower-alpha">
                        <li>22da Asamblea Ordinaria: “Afiliación de nuevos Miembros”</li>
                            <ul>
                                <li>Fecha: Miércoles 27 de Septiembre.</li>
                                <li>Hora: 19:00 horas.</li>
                            </ul>
                        <li>Asignación de Padrinos.</li>
                    </ul>
                </div>
                <div class="p-3 box2">
                    <h3>FASE V: Juramento</h3>
                    <div style="text-align: center">
                        <img src="{{ url('/') }}/images/postulacion/superwoman.svg" alt="superwoman" width="80%">
                    </div>
                    <ul style="list-style-type:lower-alpha">
                        <li>Juramento de Nuevos Miembros (Convención Nacional)</li>
                            <ul>
                                <li>Fecha: Sábado 7 de Octubre.</li>
                            </ul>
                        <li>Juramento de Nuevos Miembros (Asamblea)</li>
                            <ul>
                                <li>Fecha: Miércoles 11 de Octubre.</li>
                                <li>Hora: 19:00 horas.</li>
                            </ul>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-8">
                <p class="text-center"><span style="color: #212529">
                    <b>Todas las actividades son obligatorias y se tomara en cuenta también el interés y entusiasmo de los postulantes durante todo el proceso.</b></span>
                </p>
            </div>

        </div>
    </div>
</div>
<div class="container">
    <div class="" id="contactanos">
        <div class="row pt-20">
            <div class="col-md-5 pt-100">
                <h3>Contáctanos</h3>
                <p>
                Puedes enviarnos un correo electronico mediante el siguiente formulario, no olvides introducir
                todos tus datos y las preguntas que tengas sobre tu postulación. Nosotros te responderemos lo mas pronto posible.
                </p>
            </div>
            <div class="col-md-7">
                
                <form action="{{ route('postulacion.send') }}" method="POST" class="row g-3 contactanos" enctype="multipart/form-data" id="formC">
                    @csrf
                    <div class="col-md-12">
                        <input type="text" class="form-control shadow-none" name="name" placeholder="Nombre">
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control shadow-none" name="email" placeholder="Correo electrónico">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control shadow-none" name="phone" placeholder="Celular">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control shadow-none" name="subject" placeholder="Asunto">
                    </div>
                    <div class="col-md-12">
                        <textarea class="form-control shadow-none" name="message" rows="4" placeholder="Mensaje"></textarea>
                    </div>
                    <div class="col-md-12 col-12 d-grid gap-2 pt-10 pb-20">
                        <button type="submit" id="submit" class="btn btn-second" onclick="executeProcess()">Enviar tu mensaje</button>
                    </div>
                </form> 
                <div class="relative">
                    <div class="figura figura300 colorThird right-320">
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="relative">
        <div class="figura figuraPequena colorFirst">
        </div>
    </div>     
</div>

@endsection