<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Atelier</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/miestilo.css') }}" rel="stylesheet">
    <link href="{{ asset('web/css/full-width-pics.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">


    <link href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}" rel="stylesheet">


    @livewireStyles
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a href="home" class="brand-link text-white">
            <img src="{{asset('img/atelier1.png')}}" alt="Taller de Concesionario"
                 class="brand-image img-circle elevation-3" >
            <span class="brand-text font-weight-light ">
                <b>Atelier </b> </span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="inicio"><i class="fa fa-home"></i> Inicio </a>
                </li>
                @if( Auth::user())
                    <li class="nav-item ">
                        <a class="nav-link" href="home"><i class="fa fa-car"></i> MiPanel </a>
                    </li>
                @endif

                <li class="nav-item active">
                    <a class="nav-link" href="agendamiento"><i class="fa fa-calendar"></i> Reservas </a>
                </li>


                @if( Auth::user())
                    <a class="btn btn-default"
                       href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw fa-power-off"></i>
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ 'logout' }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <li class="nav-item ">
                        <a class="nav-link" href="login">Iniciar Sesion</a>
                        {{--                <a class="navbar-brand" href="login">Iniciar Sesion</a>--}}
                    </li>
                @endif

            </ul>
        </div>

    </div>
</nav>


<!-- Content section -->
<section class="py-0">
    <div class="container my-5">
        <div class="row align-items-center g-5 py-5 rounded-3 border shadow-lg">
            <div class="col-lg-12 offset-lg-1 p-0">
                {{--                offset-lg-1 p-0--}}
                {{--                p-3 p-lg-5 pt-lg-3--}}
                <h1 class="display-4 fw-bold lh-0 text-maroon">Calendario de Atenciones</h1>
                <p class="lead"> Calendario disponible hasta 15 dias en adelante a partir de la presente fecha.</p>

            </div>

            {{--                <div class="card card-maroon">--}}
            {{--                    <div class="card-header">--}}
            {{--                        <h3 class="card-title">Calendario de Atenciones</h3>--}}
            {{--                    </div>--}}
            {{--                    <div class="card-body">--}}





            {{--                    </div>--}}
            {{--                    <div class="card-footer  ">--}}

            {{--                        <a href="reservaenlinea" class="btn btn-info">Nuevo Agendamiento</a>--}}
            {{--                        <a href="" class="btn btn-secondary btn-close">Cancelar</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <div class="col-lg-12 p-3 p-lg-3  ">
                @livewire('agendamiento')
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
{{--<script src="/web/vendor/jquery/jquery.min.js"></script>--}}
{{--<script src="{{ asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{--test--}}

<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
{{--<script src="/plugins/daterangepicker/moment.min.js"></script>--}}
{{--<script src="/plugins/daterangepicker/daterangepicker.js"></script>--}}

@livewireScripts
<script type="text/javascript">
    window.livewire.on('triggerCupo', (val) => {
        console.log('ticket: ' + val.ticket);
        console.log('editarCupo: ' + val.editarCupo);
        $('#ticketSel').html("# " + val.ticket);
        $('#botonAccion').removeClass();
        $('#colorTituloCupo').removeClass();
        $('#iconoCupo').removeClass();
        var f = new Date(val.fechaSeleccionada);
        $('#laFecha').html((f.getDate() + 1) + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());

        if (val.editarCupo == true) {
            $('#botonAccion').addClass('btn bg-warning');
            $('#colorTituloCupo').addClass('modal-header bg-warning');
            $('#tituloCupo').html('Ticket de Reserva');
            $('#iconoCupo').addClass('fa fa-trash');
            $('#accionCupo').html('Cancelar Ticket');
        } else {
            $('#colorTituloCupo').addClass('modal-header bg-maroon');
            $('#tituloCupo').html('Solicitud de Reserva via Online');
            $('#botonAccion').addClass('btn bg-maroon');
            $('#iconoCupo').addClass('fa fa-clock');
            $('#accionCupo').html('Solicitar Ticket');
        }

        // $('#sectorSel').val(cupo.sector);
        // $('#ticketSel').html('#'+cupo.ticket);
        $('#modalReserva').modal({
            backdrop: 'static',
            keyboard: false
        });
    });

    window.livewire.on('test', (variable) => {
        alert(variable.uno);

    });

    $(function () {

        // $('#fechaSeleccionada').datepicker({
        //     startDate: 0,
        //     endDate: 15,
        //     maxViewMode: 1,
        //     language: "es",
        //     daysOfWeekDisabled: "0,6"
        // });

    });


</script>
</body>

</html>
