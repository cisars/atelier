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
@section('title', 'Reserva Normal')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/Reservas "> Reservas</a></li>
    <li class="breadcrumb-item active"> ABM Reserva Normal</li>
@stop
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card card-cyan">
                                <div class="card-header">
                                    <h3 class="card-title">Crear Reserva Normal</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label> Reserva </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="Introduzca codigo" value="1045">
                                        </div>

                                        <div class="form-group col">
                                            <label> Taller </label>
                                            <select class="form-control">
                                                <option value="" selected> Seleccione taller</option>
                                                <option value=""> opcion 1</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col">
                                        <label> Cliente </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder="Introduzca cedula o nombre del cliente" value="">
                                    </div>
                                    <div class="form-group col">

                                        <input class="form-control"
                                               type="text"
                                               placeholder="CI. Teléfono. Email" value="">
                                    </div>

                                    <div class="form-group col">
                                        <label> Vehículo </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder="Introduzca cedula o nombre del cliente"
                                               value="Kia Picanto 2015">
                                    </div>
                                    <div class="form-group col">

                                        <input class="form-control"
                                               type="text"
                                               placeholder="CI. Teléfono. Email"
                                               value="Color: Gris. 4 puertas. Naftero.
		                                        Placa CAA 2656. Chasis 202014522">
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label> Fecha Reserva </label>
                                            <input class="form-control"
                                                   type="date"
                                                   placeholder="Introduzca impuesto"
                                                   value="22/01/2021 06:40">
                                        </div>

                                        <div class="form-group col">
                                            <label> Para Fecha </label>
                                            <input class="form-control"
                                                   type="date"
                                                   placeholder="Introduzca impuesto"
                                                   value="23/01/2021 08:45">
                                        </div>
                                    </div>

                                    <div class="form-group col">
                                        <label> Empleado </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder=" "
                                               value="Carloz Ozorio">
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label> Forma Reserva </label>
                                            <select class="form-control">
                                                <option value="" selected> Seleccione forma reserva</option>
                                                <option value=""> opcion 1</option>
                                            </select>
                                        </div>


                                        <div class="form-group col">
                                            <label> Prioridad </label>
                                            <select class="form-control">
                                                <option value="" selected> Seleccione prioridad</option>
                                                <option value=""> opcion 1</option>
                                            </select>
                                        </div>

                                        <div class="form-group col">
                                            <label> Estado </label>
                                            <select class="form-control">
                                                <option value="" selected> Seleccione estado</option>
                                                <option value=""> opcion 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <label> Observación </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder=" "
                                               value="Ingrese una observación">
                                    </div>

                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar
                                        </button>
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
