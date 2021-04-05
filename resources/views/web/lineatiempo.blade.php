<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Full Width Pics - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('web/vendor/bootstrap/css/bootstrap.min.css') }}"  rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('web/css/full-width-pics.css') }}"                 rel="stylesheet">
    <link href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}"   rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"    rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="btn btn-default"
           href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-fw fa-power-off"></i>
            Cerrar sesión
        </a>
        <form id="logout-form" action="{{ 'logout' }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="inicio">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agendamiento">Reservas</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Content section -->
<section class="py-5"  style="background-color: #efe9ec">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Hyundai, Tucson | O.T. NRO 352 </h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="panelcliente">Home</a></li>
                                    <li class="breadcrumb-item active">Bitácora</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                    <div class="container-fluid">

                        <!-- Timelime example  -->
                        <div class="row">
                            <div class="col-12">
                                <!-- The time line -->
                                <div class="timeline">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-maroon">10 Feb. 2021</span>
                                    </div>
                                    <!-- /.timeline-label -->

                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-maroon"></i>
                                        <i class="fas fa-key bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 10:35</span>
                                            <h3 class="timeline-header"><a href="#">Recepción</a> del vehículo
                                            </h3>

                                            <div class="timeline-body">
                                                - Hora de entrada 10:35hs <br>
                                                - Recepcionista encargado fue <a href="#"> Carlos Torres</a> <br>
                                                - Síntomas de entrada: Síntoma 1, Síntoma 2, Síntoma 3
                                            </div>

                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-heart bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 12:02</span>
                                            <h3 class="timeline-header no-border"> <a href="#">Diagnóstico</a>  del taller realizado </h3>
                                            <div class="timeline-body">
                                                - Problema 1 <br>
                                                - Problema 2 <br>
                                                - Problema 3 <br>
                                                - Problema 4
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 12:30</span>
                                            <h3 class="timeline-header no-border">Se le envio un <a href="#">Presupuesto</a>   </h3>
                                            <div class="timeline-body">
                                                - Clic aqui para acceder al <a href="#"> Presupuesto</a>   <br>
                                                - Estado de la OT: <B>PENDIENTE</B>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 12:47</span>
                                            <h3 class="timeline-header no-border"> <a href="#"> Presupuesto </a> <B>APROBADO</B>. Correo de Confirmación </h3>

                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-business-time bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 13:45</span>
                                            <h3 class="timeline-header">  Inicio del servicio
                                            </h3>
                                            <div class="timeline-body">
                                                <em>Durante el servicio, si se encuentra alguna   falla adicional será consultado antes de tomar cualquier acción</em>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-maroon">11 Feb. 2021</span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 09:40</span>
                                            <h3 class="timeline-header">  <a href="#">  Realización de Servicios </a> . Correo de notificación
                                            </h3>
                                            <div class="timeline-body">
                                                Concluyeron los trabajos de reparación/mantenimiento. Se aguarda la verificación de las tareas por parte del
                                                jefe de mecánicos
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-check bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 09:40</span>
                                            <h3 class="timeline-header">   Servicios verificados satisfactoriamente
                                            </h3>

                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 09:50</span>
                                            <h3 class="timeline-header">  <a href="#">  Verificación de Servicios </a> Notificación por correo
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 10:10</span>
                                            <h3 class="timeline-header">  <a href="#">  Cierre de O.T. </a> Notificación por correo.
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-clock bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 11:20</span>
                                            <h3 class="timeline-header">   Pendiente de pago
                                            </h3>

                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-check bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 11:40</span>
                                            <h3 class="timeline-header">   Pago realizado. Gracias!
                                            </h3>

                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-car bg-maroon"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 15:40</span>
                                            <h3 class="timeline-header">   El vehículo ah sido retirado del taller!
                                            </h3>

                                        </div>
                                    </div>
                                    <!-- END timeline item -->

                                    <div>
                                        <i class="fas fa-user bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.timeline -->

                </section>

            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">© 2021 Atelier. All rights reserved.</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/web/vendor/jquery/jquery.min.js"></script>
<script src="/web/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
