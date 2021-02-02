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
@section('title', 'Asignacion a Maquinaria')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> ABM Asignacion a Maquinaria </li>
@stop
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-cyan">
                                <div class="card-header">
                                        <h3 class="card-title">Crear Asignacion a Maquinaria</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}



                                    <div class="form-group col">
                                        <label>   Maquinaria </label>
                                        <select class = "form-control">
                                            <option value="" selected > Seleccione Maquinaria </option>
                                            <option value=""> opcion 1 </option>
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label>   Empleado </label>
                                        <select class = "form-control">
                                            <option value="" selected > Seleccione Empleado </option>
                                            <option value=""> opcion 1 </option>
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label> Observacion </label>
                                        <input class    = "form-control"
                                               type     = "text"
                                               placeholder="Introduzca descripcion">
                                    </div>





                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
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
