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
            <div class="row justify-content-center align-items-center p-3" id="postulacion">
                <div class="col-md-12 ptb-40" id="" style="border: 5px solid #f97303; border-radius: 25px;">
                    <h2 class="text-center">
                        Escuela De Líderes
                    </h2>
                    <h2 class="text-center" style="color: #d34206; font-weight: bold">
                        EDL-JCI TUNARI
                    </h2>
                </div>
                <div class="col-md-7 justificado">
                    <p id="parrafoPost"><span style="color: #212529">
                            La EDL es más que una introducción a JCI: es una experiencia única que busca inspirar,
                            empoderar y preparar a los nuevos miembros para que sean verdaderos líderes con propósito y
                            acción.
                            <br>
                            El postulante tendrá capacitaciones para tener más comprensión sobre el movimiento JCI, su
                            estructura, misión y valores, además de desarrollar habilidades blandas como comunicación,
                            trabajo en equipo, liderazgo transformador y pensamiento crítico. Esta formación integral
                            busca que cada participante descubra su potencial y lo convierta de impacto en su vida
                            personal y comunidad.
                    </p>
                </div>
                <div class="col-md-5">
                    <img src="{{ url('/') }}/images/postulacion/hero-postulacion.webp" alt="postulacion" width="100%">
                </div>

                <div class="grid ptb-40">
                    <div class="p-3 box1">
                        <h3>FASE I: Registro de postulantes</h3>
                        <div style="text-align: center">
                            <img class="image-card" src="{{ url('/') }}/images/postulacion/convocatoria.webp"
                                 alt="convocatoria"
                                 width="100%">
                        </div>
                        <p>📢 Convocatoria Abierta</p>
                        <p><strong>Fecha:</strong> 28 de Julio al 09 de Agosto</p>
                        <p>¡Te estamos buscando! Si quieres formar parte de nuestro equipo, esta es tu oportunidad.</p>
                        <a href="https://forms.gle/ksaNe8iR53Af7Q887"
                           target="_blank"
                           id="submit" class="btn buttonSecond" onclick="executeProcess()"
                           style="width: 97%; transform: translateY(0%); margin-top: 14%;">
                            Abrir formulario ✍️
                        </a>
                    </div>
                    <div class="p-3 box2">
                        <h3>FASE II: Entrevista</h3>
                        <div style="text-align: center">
                            <img class="image-card" src="{{ url('/') }}/images/postulacion/entrevista.webp"
                                 alt="profile" width="100%">
                        </div>
                        <p>🎤 ¿Quieres unirte?</p>
                        <p>
                            ¡Genial! Para ser parte de nuestra comunidad, realizaremos una entrevista corta donde
                            podremos conocerte mejor, contarte cómo funcionamos y resolver tus dudas.
                        </p>
                        <p>¡Anímate a dar el primer paso!</p>
                    </div>
                    <div class="p-3 box3">
                        <h3>FASE III: Plataformas</h3>
                        <div style="text-align: center">
                            <img class="image-card" src="{{ url('/') }}/images/postulacion/plataformas.webp"
                                 alt="plataformas" width="100%">
                        </div>
                        <p>💻 Capacitación con plataformas online
                        <p>
                            Durante tu proceso de formación, usaremos plataformas digitales para que accedas a
                            materiales, actividades y sesiones interactivas.
                        </p>
                        <p>¡Todo pensado para que aprendas a tu ritmo y desde donde estés!</p>
                    </div>
                    <div class="p-3 box1">
                        <h3>FASE IV: Asignación</h3>
                        <div style="text-align: center">
                            <img class="image-card" src="{{ url('/') }}/images/postulacion/asignacion.webp"
                                 alt="asignacion" width="100%">
                        </div>
                        <p>🤝 Acompañamiento en equipo</p>
                        <p>
                            No estarás solo en este camino. Te asignaremos un equipo que te acompañará en tu desarrollo,
                            resolverá tus dudas y te apoyará en cada paso.</p>
                        <p>¡Crecemos juntos!</p>
                    </div>
                    <div class="p-3 box2">
                        <h3>FASE V: Capacitaciones</h3>
                        <div style="text-align: center">
                            <img class="image-card" src="{{ url('/') }}/images/postulacion/capacitaciones.webp"
                                 alt="capacitaciones" width="100%">
                        </div>
                        <p>🎓 Capacitaciones JCI Tunari</p>
                        <p>
                            Como parte de tu proceso, recibirás capacitaciones organizadas por JCI Tunari. Estas te
                            ayudarán a conocer mejor nuestra organización, desarrollar habilidades y prepararte para
                            asumir nuevos retos.
                        </p>
                        <p>¡Aprender y crecer juntos es parte del viaje!</p>
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
                        Contactanos por Whatsapp:
                        <a style="color: var(--second-color)"
                           href="https://api.whatsapp.com/send?phone=+59179390921&text=Buenas%20quisiera%20saber%20mas%20informaci%C3%B3n%20sobre%20la%20Escuela%20De%20L%C3%ADderes%20EDL-JCI%20TUNARI...."
                           target="_blank">WhatsApp link</a>
                    </p>
                    <p>o</p>
                    <p>
                        Puedes enviarnos un correo electronico mediante el siguiente formulario, no olvides introducir
                        todos tus datos y las preguntas que tengas sobre tu postulación. Nosotros te responderemos lo
                        más pronto posible.
                    </p>
                </div>
                <div class="col-md-7">

                    <form action="{{ route('postulacion.send') }}" method="POST" class="row g-3 contactanos"
                          enctype="multipart/form-data" id="formC">
                        @csrf
                        <div class="col-md-12">
                            <input type="text" class="form-control shadow-none" name="name" placeholder="Nombre">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control shadow-none" name="email"
                                   placeholder="Correo electrónico">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control shadow-none" name="phone" placeholder="Celular">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control shadow-none" name="subject" placeholder="Asunto">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control shadow-none" name="message" rows="4"
                                      placeholder="Mensaje"></textarea>
                        </div>
                        <div class="col-md-12 col-12 d-grid gap-2 pt-10 pb-20">
                            <button type="submit" id="submit" class="btn btn-second" onclick="executeProcess()">Enviar
                                tu mensaje
                            </button>
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
