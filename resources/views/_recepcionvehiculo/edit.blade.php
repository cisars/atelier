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
@section('title', 'Recepcion Vehiculo')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> ABM Recepcion Vehiculo </li>
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
                                        <h3 class="card-title">Crear Recepcion Vehiculo</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}

                                <div class="form-row ">
                                    <div class="form-group col">
                                        <label> Recepcion  </label>
                                        <input class    = "form-control"
                                               type     = "text"
                                               placeholder = "Introduzca codigo" value="1">
                                    </div>
                                    <div class="form-group col">
                                        <label> Reserva </label>
                                        <input class    = "form-control"
                                               type     = "text"
                                               placeholder="Introduzca descripcion" value="2025">
                                    </div>
                                </div>


                                    <div class="form-group col">
                                        <label> Taller </label>
                                        <select class = "form-control">
                                            <option value="" selected > Seleccione Taller </option>
                                            <option value=""> opcion 1 </option>
                                        </select>
                                    </div>



                                    <div class="form-group col">
                                        <label> Cliente </label>
                                        <input class    = "form-control"
                                               type     = "text"
                                               placeholder="Ingrese el cliente" value="2025">
                                    </div>
                                    <div class="form-group col">
                                        <input class    = "form-control"
                                               type     = "text"
                                               placeholder="CI Telefono Email" >
                                    </div>

                                    <div class="form-group col">
                                        <label> Vehiculos cargados </label>
                                        <select class = "form-control">
                                            <option value="" selected > Seleccione vehiculo </option>
                                            <option value=""> opcion 1 </option>
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <input class    = "form-control"
                                               type     = "text"
                                               placeholder="Chapa. Color. Año. Chasis" >
                                    </div>

                                    <div class="form-group col">
                                        <label> Recepcionado por </label>
                                        <input class    = "form-control"
                                               type     = "text"
                                               placeholder="" value="Carlos Paredes" >
                                    </div>



                                    <label> Sintomas </label>
                                    <table class="table table-sm table-hover nowrap d-table" id="lista">
                                        <thead class="">
                                        <tr>
                                            <th class="">Item </th>
                                            <th class="">Descripcion </th>
                                            <th class="">Accion </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr class="">
                                            <td> 1 </td>
                                            <td> El motor se apaga </td>


                                            <td class="">
                                                <a
                                                    href=" "
                                                    class= "btn btn-info">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button
                                                    type        ="button"
                                                    class       ="btn btn-danger"
                                                    data-toggle ="modal"
                                                    data-target ="#modal-danger "
                                                    data-data   ="">
                                                    <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                                </button>

                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td> 2 </td>
                                            <td> No encienden las luces traseras </td>

                                            <td class="">
                                                <a
                                                    href=" "
                                                    class= "btn btn-info">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button
                                                    type        ="button"
                                                    class       ="btn btn-danger"
                                                    data-toggle ="modal"
                                                    data-target ="#modal-danger "
                                                    data-data   ="">
                                                    <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                                </button>

                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td> 3 </td>
                                            <td> Pierde aceite </td>

                                            <td class="">
                                                <a
                                                    href=" "
                                                    class= "btn btn-info">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button
                                                    type        ="button"
                                                    class       ="btn btn-danger"
                                                    data-toggle ="modal"
                                                    data-target ="#modal-danger "
                                                    data-data   ="">
                                                    <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                                </button>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>




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
