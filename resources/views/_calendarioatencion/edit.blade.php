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
@section('title', 'Reserva en Linea')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/Reservas "> Reservas</a></li>
    <li class="breadcrumb-item active"> ABM Reserva en Linea</li>
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
                                    <h3 class="card-title">Crear Reserva en Linea</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label> Introduzca su Documento </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="Documento " value="">
                                        </div>
                                        <div class="form-group col">
                                            <label> Nombre </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="Nombre " value="">
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <label> Correo </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder="Email " value="">
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

                            <div class="card card-cyan">
                                <div class="card-header">
                                    <h3 class="card-title">Crear Reserva en Linea</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label> Seleccione o cree su vehiculo </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="vehiculo " value="">
                                        </div>
                                        <div class="form-group col">
                                            <label> Marca </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="Marca " value="">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label> Modelo </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="Modelo " value="">
                                        </div>
                                        <div class="form-group col">
                                            <label> Placa </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="Placa " value="">
                                        </div>
                                        <div class="form-group col">
                                            <label> Año </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="Año " value="">
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
