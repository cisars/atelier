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
@section('title', 'Sector Repuesto')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> ABM Sector Repuesto </li>
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
                                        <h3 class="card-title">Crear Sector Repuesto</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}

                                        <div class="form-group col">
                                            <label> Sector </label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   placeholder = "Introduzca codigo">
                                        </div>

                                    <div class="form-group col">
                                        <label> Taller </label>
                                        <select class = "form-control">
                                            <option value="" selected > Seleccione Taller </option>
                                            <option value=""> opcion 1 </option>
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label> Descripcion </label>
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
