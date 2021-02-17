<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Full Width Pics - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('web/css/full-width-pics.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <style>

        #grad1 {
            background-color: #9C27B0;
            background-image: linear-gradient(120deg, #FF4081, #81D4FA)
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform input,
        #msform textarea {
            padding: 0px 8px 4px 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: "Arial";
            color: #2C3E50;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;
            font-weight: bold;
            border-bottom: 2px solid red;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: red;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px red
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid red
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
            padding-left: 0px;

        }

        #progressbar .active {
            color: #d81b60;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 20%;
            float: left;
            position: relative;
        }

        {{--        {{ asset('/vendor/adminlte/dist/css/adminlte.css.map') }}--}}
           /*        #progressbar #account:before {*/
        /*            font-family: "Font Awesome 5 Free"; font-weight: 900;*/
        /*            content: "\f023"*/
        /*        }*/


        /*        #progressbar #personal:before {*/
        /*            font-family: "Font Awesome 5 Free"; font-weight: 900;*/
        /*            content: "\f007"*/
        /*        }*/

        /*        #progressbar #payment:before {*/
        /*            font-family: "Font Awesome 5 Free"; font-weight: 900;*/
        /*            content: "\f09d"*/
        /*        }*/

        /*        #progressbar #confirm:before {*/
        /*            font-family: "Font Awesome 5 Free"; font-weight: 900;*/
        /*            content: "\f00c"*/
        /*        }*/

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0px;
            margin-left: 0px;
            padding-left: 0px;
            top: 25px;
            z-index: -1
        }

        #progressbar + .ul {

            padding-left: 0px;

        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #d81b60
        }

        v
        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204px;
            height: 104px;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

        .person {
            font-family: "Arial";
            font-weight: normal;
        }

        .btn-group li:first-child {
            border-radius: 6px 6px 0 0;
            border-top-width: 2px;
        }

        .btn-group li:last-child {
            border-radius: 0 0 6px 6px;
        }
    </style>
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
<section class="py-3" style="background-color: #efe9ec">
    <div class="container">
        <div class="row pb-5">
            <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body" style="
                                background-image:url('{{ asset('/img/fondo4.png') }}')  ;
                                background-repeat: no-repeat;
                                background-position: top right 20px ; ">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="form-group ">
                                    <span class="text-maroon h3 "
                                          style="text-shadow: 1px 1px #FFF;"> Bienvenido, </span>
                                    <span class="text-bold h3 "
                                          style="text-shadow: 1px 1px #FFF;"> {{Auth::user()->usuario}} </span><br>
                                    <i class="fa fa-star text-maroon" style="text-shadow: 1px 1px #FFF;"></i> <span
                                        style="text-shadow: 1px 1px #FFF;"> {{Auth::user()->cliente->razon_social}} </span>
                                </div>

                                <div class="row pt-2">
                                    <!-- MultiStep Form -->
                                    <div class=" col-sm-12 col-md-6 col-lg-4   ">

                                        <div class="row">
                                            <div class="form-group col-4 ">
                                                <label class="font-weight-normal text-maroon"
                                                       style="text-shadow: 1px 1px #FFF;">Tu vehículo</label>
                                            </div>

                                            <div class="form-group col-8 ">
                                                <select
                                                    class="form-control text-maroon"
                                                    name="marca"
                                                    id="marca">
                                                    <option value="" selected="selected"
                                                    >Ninguno
                                                    </option>
                                                </select>
                                            </div>

                                        </div>


                                        <div class="btn-group col-md-12">
                                            <a class="btn btn-outline-danger col-4 btn-block" href="midiagnostico">Diagnóstico</a>
                                            <a class="btn btn-outline-danger col-4" href="lineatiempo">Bitácora</a>
                                            <a class="btn btn-outline-danger col-4 btn-block" href="misvehiculos">Vehículos
                                            </a>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 mx-0">
                                                <form id="msform">
                                                    <!-- progressbar -->
                                                    <ul id="progressbar">
                                                        <li class="active fa fa-key">
                                                            <strong class="person">
                                                                Recepción</strong></li>
                                                        <li class="active fa fa-heart">
                                                            <strong class="person">
                                                                Diagnóstico</strong></li>
                                                        <li class="active fa fa-business-time">
                                                            <strong class="person">
                                                                Reparación</strong></li>
                                                        <li class="fa fa-check">
                                                            <strong class="person">
                                                                Finalizado</strong></li>
                                                        <li class="fa fa-car"><strong class="person"> Entrega</strong>
                                                        </li>
                                                    </ul> <!-- fieldsets -->

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-8 mt-lg-5">

                                        <div class="  "
                                             style="background-color: #d81b60; height:100px; margin-top:28px">
                                            <p class="text-right text-white h1 pt-5" style="text-shadow: 1px 1px #000;">
                                                Hyundai, Tucson </p>
                                        </div>

                                    </div>
                                </div>

                                <div class="row pt-2 pb-5">

                                    <!-- Main content -->

                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header  text-maroon">
                                                        <i class="fa fa-car"></i>
                                                        Mis Vehículos
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <a  href="{{route('mivehiculo')}}" class="btn bg-maroon">Nuevo Vehiculo</a>

                                                        </div>

                                                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                                                            <thead class="">
                                                            <tr>
{{--                                                                <th class="w-10">Código </th>--}}
{{--                                                                <th class="">Cliente</th>--}}
                                                                <th class="">Modelo</th>
                                                                <th class="">Chapa</th>
                                                                <th class="">Chasis</th>
                                                                <th class="">Color</th>
                                                                <th class="">Combustion</th>
                                                                <th class="">Tipo</th>
                                                                <th class="">Año</th>
                                                                <th class="w-10">Acción</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($vehiculos as $key => $vehiculo)
                                                                <tr>
{{--                                                                    <td>{{ $vehiculo->id }}</td>--}}
{{--                                                                    <td>--}}

{{--                                                                        {{ $vehiculo->cliente->razon_social }}--}}
{{--                                                                    </td>--}}
                                                                    <td>
                                                                        {{  $vehiculo->modelo->descripcion }}
                                                                    </td>
                                                                    <td>{{ $vehiculo->chapa }}</td>
                                                                    <td>{{ $vehiculo->chasis }}</td>
                                                                    <td>
                                                                        {{ $vehiculo->color->descripcion }}
                                                                    </td>
                                                                    <td>{{ $vehiculo->combustion }}</td>
                                                                    <td>{{ $vehiculo->tipo }}</td>
                                                                    <td>{{ $vehiculo->año }}</td>
                                                                    <td class=" ">
                                                                        <a
                                                                            href="{{ route('vehiculo.edit', $vehiculo->id) }}"
                                                                            class= "btn btn-warning">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <button
                                                                            type        ="button"
                                                                            class       ="btn btn-outline-danger"
                                                                            data-toggle ="modal"
                                                                            data-target ="#modal-danger{{$vehiculo->id}}"
                                                                            data-data   ="{{$vehiculo->id}}">
                                                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                                                        </button>
                                                                        <?php
                                                                        $confirmation = [
                                                                            'pk'   => 'id',
                                                                            'value' => $vehiculo->id,
                                                                            'ruta'  => 'vehiculo.destroy',
                                                                        ]
                                                                        ?>
                                                                        @include('adminlte::partials.modals.confirmation',  $confirmation)
                                                                        {{--                                    <x-alertas :confirmation="$confirmation" ></x-alertas>--}}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>

                                                        <!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                                <!-- /.col -->
                                            </div>




                                </div>
                            </div>
                        </div>



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
<script src="{{ asset('web/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
