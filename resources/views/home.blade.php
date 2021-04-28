@extends('adminlte::page')

@section('title', 'Home')

@section('css' )
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
            color: #000000
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
@stop

@section('menu-header')
    {{--   --   --}}
@stop


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="
                    background-image:url('{{ asset('/img/fondo3.png') }}')  ;
                    background-repeat: no-repeat;
                    background-position: top right 20px ; ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Sesion iniciada!') }} <br>
                    <h1 class="text-maroon" style="text-shadow: 1px 1px #FFF;"> {{ __('Bienvenido,')  }} usuario
                        <b>{{ Auth::user()->usuario  }}</b></h1>
                    {{--              --}}
                    {{--                    <div class="row pt-3">--}}
                    {{--                        <!-- MultiStep Form -->--}}
                    {{--                        <div class=" col-sm-12 col-md-6 col-lg-4   ">--}}
                    {{--                            --}}{{--                                    <h2><strong>Sign Up Your User Account</strong></h2>--}}
                    {{--                            <div class="row">--}}
                    {{--                                <div class="form-group col-4 pt-2">--}}
                    {{--                                    <label class="font-weight-normal text-maroon" style="text-shadow: 1px 1px #FFF;">Seleccione un vehiculo</label>--}}
                    {{--                                </div>--}}

                    {{--                                <div class="form-group col-8">--}}
                    {{--                                    <select--}}
                    {{--                                        class="form-control text-maroon"--}}
                    {{--                                        name="marca"--}}
                    {{--                                        id="marca">--}}
                    {{--                                        <option value="" selected="selected"--}}
                    {{--                                        >Ninguno--}}
                    {{--                                        </option>--}}
                    {{--                                    </select>--}}
                    {{--                                </div>--}}

                    {{--                            </div>--}}


                    {{--                            <div class="btn-group col-md-12">--}}
                    {{--                                <button type="button" class="btn btn-outline-danger col-4 btn-block">Diagnóstico</button>--}}
                    {{--                                <button type="button" class="btn btn-outline-danger col-4">Linea de tiempo</button>--}}
                    {{--                                <button type="button" class="btn btn-outline-danger col-4 btn-block">Mis Vehiculos--}}
                    {{--                                </button>--}}
                    {{--                            </div>--}}


                    {{--                            <div class="row">--}}
                    {{--                                <div class="col-md-12 mx-0">--}}
                    {{--                                    <form id="msform">--}}
                    {{--                                        <!-- progressbar -->--}}
                    {{--                                        <ul id="progressbar">--}}
                    {{--                                            <li class="active fa fa-key"><strong class="person">Recepción</strong></li>--}}
                    {{--                                            <li class="active fa fa-heart"><strong class="person"> Diagnóstico</strong></li>--}}
                    {{--                                            <li class="active fa fa-business-time"><strong class="person"> Reparación</strong>--}}
                    {{--                                            </li>--}}
                    {{--                                            <li class="fa fa-check"><strong class="person"> Finalizado</strong></li>--}}
                    {{--                                            <li class="fa fa-car"><strong class="person"> Entrega</strong></li>--}}
                    {{--                                        </ul> <!-- fieldsets -->--}}

                    {{--                                    </form>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="col-sm-12 col-md-6 col-lg-8 mt-lg-5">--}}

                    {{--                            <div class="  " style="background-color: #d81b60; height:100px; margin-top:28px">--}}
                    {{--                                <p class="text-right text-white h1 pt-5"  style="text-shadow: 1px 1px #000;">Hyundai, Tucson.</p>--}}
                    {{--                            </div>--}}

                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="row pt-2">--}}

                    {{--                        <div class="col-md-4">--}}


                    {{--                            <div class="col-md-12">--}}
                    {{--                                <div class="card card-maroon card-outline">--}}

                    {{--                                    <div class="card-body">--}}
                    {{--                                        <div class="row">--}}
                    {{--                                            <div class="card-title  text-maroon">--}}
                    {{--                                                <img src="{{ asset('/img/icono1.png') }}" class="figure-img">--}}
                    {{--                                                Síntomas de Ingreso</div>--}}
                    {{--                                            <!-- MultiStep Form -->--}}
                    {{--                                            <div class=" col-sm-12  ">--}}
                    {{--                                                <table class="table table-hover text-nowrap table-sm">--}}

                    {{--                                                    <tbody>--}}
                    {{--                                                    <tr>--}}
                    {{--                                                        <td>--}}
                    {{--                                                            Sin datos--}}
                    {{--                                                        </td>--}}
                    {{--                                                    </tr>--}}
                    {{--                                                    <tr>--}}
                    {{--                                                        <td>--}}
                    {{--                                                            Sin datos--}}
                    {{--                                                        </td>--}}
                    {{--                                                    </tr>--}}
                    {{--                                                    <tr>--}}
                    {{--                                                        <td>--}}
                    {{--                                                            Sin datos--}}
                    {{--                                                        </td>--}}
                    {{--                                                    </tr>--}}
                    {{--                                                    </tbody>--}}
                    {{--                                                </table>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <div class="col-md-12">--}}
                    {{--                                <div class="card card-maroon card-outline">--}}

                    {{--                                    <div class="card-body">--}}
                    {{--                                        <div class="row">--}}
                    {{--                                            <div class="card-title  text-maroon">--}}
                    {{--                                                <img src="{{ asset('/img/icono2.png') }}" class="figure-img">--}}
                    {{--                                                Diagnóstico del Taller</div>--}}
                    {{--                                            <!-- MultiStep Form -->--}}
                    {{--                                            <div class=" col-sm-12  ">--}}
                    {{--                                                <table class="table table-hover text-nowrap table-sm">--}}

                    {{--                                                    <tbody>--}}
                    {{--                                                    <tr>--}}
                    {{--                                                        <td>--}}
                    {{--                                                            Sin datos--}}
                    {{--                                                        </td>--}}
                    {{--                                                    </tr>--}}
                    {{--                                                    <tr>--}}
                    {{--                                                        <td>--}}
                    {{--                                                            Sin datos--}}
                    {{--                                                        </td>--}}
                    {{--                                                    </tr>--}}
                    {{--                                                    <tr>--}}
                    {{--                                                        <td>--}}
                    {{--                                                            Sin datos--}}
                    {{--                                                        </td>--}}
                    {{--                                                    </tr>--}}
                    {{--                                                    </tbody>--}}
                    {{--                                                </table>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}


                    {{--                        </div>--}}

                    {{--                        <div class="col-md-4">--}}
                    {{--                            <div class="card">--}}
                    {{--                                <div class="card-header  text-maroon">--}}
                    {{--                                    <i class="fa fa-user"></i>--}}
                    {{--                                    Recepcionista</div>--}}
                    {{--                                <div class="card-body">--}}
                    {{--                                    <div class="row">--}}
                    {{--                                        <!-- MultiStep Form -->--}}
                    {{--                                        <div class=" col-sm-12  ">--}}
                    {{--                                            --}}{{--                                    <h2><strong>Sign Up Your User Account</strong></h2>--}}
                    {{--                                            <p>Progreso general</p>--}}
                    {{--                                            <table class="table table-hover text-nowrap table-sm">--}}

                    {{--                                                <tbody>--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <td>--}}
                    {{--                                                        Sin datos--}}
                    {{--                                                    </td>--}}
                    {{--                                                </tr>--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <td>--}}
                    {{--                                                        Sin datos--}}
                    {{--                                                    </td>--}}
                    {{--                                                </tr>--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <td>--}}
                    {{--                                                        Sin datos--}}
                    {{--                                                    </td>--}}
                    {{--                                                </tr>--}}
                    {{--                                                </tbody>--}}
                    {{--                                            </table>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="col-md-4">--}}
                    {{--                            <div class="card">--}}
                    {{--                                <div class="card-header  text-maroon">--}}
                    {{--                                    <i class="fa fa-car"></i>--}}
                    {{--                                    Ficha del Vehiculo</div>--}}
                    {{--                                <div class="card-body">--}}
                    {{--                                    <div class="row">--}}
                    {{--                                        <!-- MultiStep Form -->--}}
                    {{--                                        <div class=" col-sm-12  ">--}}
                    {{--                                            --}}{{--                                    <h2><strong>Sign Up Your User Account</strong></h2>--}}
                    {{--                                            <table class="table table-hover text-nowrap table-sm">--}}

                    {{--                                                <tbody>--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <td>--}}
                    {{--                                                        Sin datos--}}
                    {{--                                                    </td>--}}
                    {{--                                                </tr>--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <td>--}}
                    {{--                                                        Sin datos--}}
                    {{--                                                    </td>--}}
                    {{--                                                </tr>--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <td>--}}
                    {{--                                                        Sin datos--}}
                    {{--                                                    </td>--}}
                    {{--                                                </tr>--}}
                    {{--                                                </tbody>--}}
                    {{--                                            </table>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}


                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row">


            <div class="col-lg-6 ">
                <div class="row ">
                    {{-- Reservar--}}
                    <div class="col-lg-4   ">
                        <div class="card p-3 ">
                            <div class="card-body text-center m-0 p-0 " style="overflow: hidden">

                                <div class="form-group">
                                    <button class="btn btn-lg bg-maroon p-xl-4 col-12 "
                                            onclick="window.location='{{ url("reserva/create") }}'"
                                    >
                                        <div class="info-box bg-maroon shadow-none  ">
                                            <div class="info-box-icon col-12  ">
                                                <i class="fa fa-calendar "></i>
                                            </div>
                                        </div>

                                        Reservar
                                    </button>
                                </div>
                                <div class="form-group">
                                <span class="text-sm">
                                Crear nuevas reservas necesaria para
                                  recepcionar un vehículo
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Recepcionar--}}
                    <div class="col-lg-4   ">
                        <div class="card p-3  ">
                            <div class="card-body text-center m-0 p-0" style="overflow: hidden">

                                <div class="form-group">
                                    <button class="btn btn-lg bg-maroon p-xl-4  col-12"
                                            onclick="window.location='{{ url("recepcion") }}'"
                                    >
                                        <div class="info-box bg-maroon shadow-none">
                                            <div class="info-box-icon pl-3 col-12 ">
                                                <i class="fa fa-clipboard "></i>
                                            </div>
                                        </div>
                                     Recepcionar
                                    </button>
                                </div>
                                <div class="form-group">
                                <span class="text-sm">
                              Listado basado en las reservas pendientes de HOY
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- OTS--}}
                    <div class="col-lg-4   ">
                        <div class="card p-3  ">
                            <div class="card-body text-center m-0 p-0" style="overflow: hidden">

                                <div class="form-group">
                                    <button class="btn btn-lg bg-maroon p-xl-4  col-12"
                                            onclick="window.location='{{ url("ot") }}'"
                                    >
                                        <div class="info-box bg-maroon shadow-none">
                                            <div class="info-box-icon pl-2 col-12 ">
                                                <i class="fa fa-clipboard-list "></i>
                                            </div>
                                        </div>
                                        OT
                                    </button>
                                </div>
                                <div class="form-group">
                                <span class="text-sm">
                              Listado de las órdenes de trabajo pendientes
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Confirmar OT--}}
                    <div class="col-lg-4   ">
                        <div class="card p-3  ">
                            <div class="card-body text-center m-0 p-0" style="overflow: hidden">

                                <div class="form-group">
                                    <button class="btn btn-lg   bg-maroon p-xl-4 col-12 "
                                            onclick="window.location='{{ url("confirmarot") }}'"
                                    >
                                        <div class="info-box bg-maroon shadow-none">
                                            <div class="info-box-icon pl-3  col-12">
                                                <i class="fa fa-envelope-open-text "></i>
                                            </div>
                                        </div>

                                        ConfirmaOT
                                    </button>
                                </div>
                                <div class="form-group">
                                <span class="text-sm">
                              Aprobación por parte del cliente para realizar servicios
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Servicios--}}
                    <div class="col-lg-4   ">
                        <div class="card p-3">
                            <div class="card-body text-center m-0 p-0" style="overflow: hidden">

                                <div class="form-group">
                                    <button class="btn btn-lg bg-maroon p-xl-4  col-12"
                                            onclick="window.location='{{ url("servicio") }}'"
                                    >
                                        <div class="info-box bg-maroon shadow-none">
                                            <div class="info-box-icon  col-12 ">
                                                <i class="fa fa-briefcase-medical "></i>
                                            </div>
                                        </div>

                                        Servicios
                                    </button>
                                </div>
                                <div class="form-group">
                                <span class="text-sm">
                              Resumen de servicios y/o productos utilizados en las tareas
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Verifica OT--}}
                    <div class="col-lg-4   ">
                        <div class="card p-3">
                            <div class="card-body text-center m-0 p-0"  style="overflow: hidden">

                                <div class="form-group">
                                    <button class="btn btn-lg bg-maroon disabled  p-xl-4 col-12 "
                                            onclick="window.location='{{ url("verificaot") }}'"
                                    >
                                        <div class="info-box bg-maroon shadow-none">
                                            <div class="info-box-icon  col-12 ">
                                                <i class="fa fa-tasks"></i>
                                            </div>
                                        </div>

                                        Verifica OT
                                    </button>
                                </div>
                                <div class="form-group">
                                <span class="text-sm">
                              Revisión y certificación del correcto servicio realizado
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Finaliza OT--}}
                    <div class="col-lg-4   ">
                        <div class="card p-3">
                            <div class="card-body text-center m-0 p-0" style="overflow: hidden">

                                <div class="form-group">
                                    <button class="btn btn-lg bg-maroon   disabled  p-xl-4 col-12 ">

                                        <div class="info-box  bg-maroon shadow-none">
                                            <div class="info-box-icon  col-12 ">
                                                <i class="fa fa-clipboard-check  "></i>
                                            </div>
                                        </div>

                                        Finaliza OT
                                    </button>
                                </div>
                                <div class="form-group">
                                <span class="text-sm">
                              Listado basado en las reservas pendientes de HOY
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Entrega--}}
                    <div class="col-lg-4   ">
                        <div class="card p-3">
                            <div class="card-body text-center m-0 p-0" style="overflow: hidden">

                                <div class="form-group">
                                    <button class="btn btn-lg bg-maroon col-12  disabled  p-xl-4 col-12 ">

                                        <div class="info-box bg-maroon shadow-none">
                                            <div class="info-box-icon col-12  ">
                                                <i class="fa fa-car  "></i>
                                            </div>
                                        </div>

                                        Entrega
                                    </button>
                                </div>
                                <div class="form-group">
                            <span class="text-sm">
                          Listado basado en las reservas pendientes de HOY
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Bitacora--}}
                    <div class="col-lg-4   ">
                        <div class="card p-3">
                            <div class="card-body text-center m-0 p-0" style="overflow: hidden">

                                <div class="form-group">
                                    <button class="btn btn-lg btn-outline-dark col-12  disabled  p-xl-4 col-12 ">

                                        <div class="info-box shadow-none">
                                            <div class="info-box-icon col-12  ">
                                                <i class="fa fa-history  "></i>
                                            </div>
                                        </div>

                                        Bitácora
                                    </button>
                                </div>
                                <div class="form-group">
                            <span class="text-sm">
                          Historial de acciones para una OT de cliente determinado
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6 ">
                <div class="card card-maroon  ">
                    <div class="card-header">
                        <div class="card-title">
                            MiCargo
                        </div>
                    </div>
                    <div class="card-body  ">

                        <div class="form-group">
                            <span class="text-sm">
                            Listado de mis tareas principales pendientes
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('js')
    <script>
        $(document).ready(function () {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function () {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $(".previous").click(function () {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function () {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function () {
                return false;
            })

        });
    </script>
@stop
{{--        @endsection--}}
