<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ProductosServicios
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] ProductoServicio
// $nombres  = $gen->tabla['ZnombresZ'] productos_servicios
// $nombre   = $gen->tabla['ZnombreZ'] producto_servicio
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Calendario Atencion')
@section('css')
    <style>
        .cuadrado {
            width: 10px; height:75px;
        }
    </style>
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/Reservas "> Calendario Atencion</a></li>
    <li class="breadcrumb-item active"> Calendario Atencion</li>
@stop
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-cyan">
                                <div class="card-header">
                                    <h3 class="card-title">Calendario Atencion</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label> Calendario disponible hasta 15 dias en adelante. </label>
                                            <input class="form-control"
                                                   type="date"
                                                   placeholder=" " value="29/01/2021">
                                        </div>

                                    </div>





                                    {{--                                    nowrap d-table--}}
                                    <table class="table table-sm table-hover " >
                                        <thead class="">
                                        <tr>
                                            <th >Hora </th>
                                            <th class="">07:30 </th>
                                            <th class="">07:45 </th>
                                            <th class="">08:00 </th>
                                            <th class="">08:15 </th>
                                            <th class="">08:30 </th>
                                            <th class="">08:45 </th>
                                            <th class="">09:00 </th>
                                            <th class="">09:15 </th>
                                            <th class="">09:30 </th>
                                            <th class="">09:45 </th>
                                            <th class="">13:00 </th>
                                            <th class="">13:15 </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 1
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 2
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 3
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 4
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 5
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 6
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 7
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 8
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 9
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 10
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-danger">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Ocupado
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr >
                                            <td class="cuadrado" >
                                                <div class="container h-100">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group"> 2
                                                                {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cuadrado" >
                                                <div class="container h-100 btn btn-success">
                                                    <div class="row h-100 justify-content-center align-items-center">
                                                        <form class="col-12">
                                                            <div class="form-group ">
                                                                Libre
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                        </tbody>
                                    </table>
                                    <div class="card-footer  ">

                                        <a href="" class="btn btn-secondary btn-close">Cancelar</a>
                                    </div>

                                    {!! Form::close() !!}
                                </div>


                            </div>


                        </div>
                    </div>
            </section>
        </div>
    </div>
@endsection

@section('js')

    <script>
    </script>
@endsection
