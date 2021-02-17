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
@section('title', 'Entrega Vehículo')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/Reservas "> Entrega Vehículo</a></li>
    <li class="breadcrumb-item active"> ABM Entrega Vehículo</li>
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
                                    <h3 class="card-title">Crear Entrega Vehículo</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label> Entrega </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="Introduzca codigo" value="151112">
                                        </div>
                                        <div class="form-group col">
                                            <label> Taller </label>
                                            <select class="form-control">
                                                <option value="" selected> Atelier</option>
                                                <option value=""> opcion 1</option>
                                            </select>
                                        </div>
                                        <div class="form-group col">
                                            <label> OT </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="Introduzca codigo" value="2353">
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
                                               value="Color: Beige. Chapa CAA 799. Año 2019  ">
                                    </div>

                                    <div class="form-group col">
                                        <label> Fecha Entrega </label>
                                        <input class="form-control"
                                               type="date"
                                               placeholder=""
                                               value="27/01/2021 14:10">
                                    </div>

                                    <div class="form-group col">
                                        <label> Empleado </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder=""
                                               value="Eusebio Ayala">
                                    </div>
                                    <div class="form-group col">
                                        <label> Observación </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder=""
                                               value="--Cliente contento--">
                                    </div>

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
