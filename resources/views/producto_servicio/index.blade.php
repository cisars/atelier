<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ProductosServicios
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] ProductoServicio
// $nombres  = $gen->tabla['ZnombresZ'] productos_servicios
// $nombre   = $gen->tabla['ZnombreZ'] producto_servicio
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de ProductosServicios')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM ProductosServicios </li>
@stop

@section('content')

    @if( !empty(session('msg')))
        @include('adminlte::partials.modals.alerts',['msg'=>session('msg'), 'type'=>session('type') ])
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">ProductosServicios   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('productoservicio.create')}}" class="btn bg-cyan">Nuevo Producto/Servicio</a>

                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Producto </th>
                                <th class="">Código </th>
                                <th class="">Descripción </th>
                                <th class="">Clasificacion </th>
                                <th class="">Unidad </th>
                                <th class="">Impuesto </th>
                                <th class="">Precio de Venta </th>
                                <th class="">Acción </th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr class="">
                                    <td> 1 </td>
                                    <td class="">1</td>
                                    <td class="">Descripción1</td>
                                    <td class="">Clasificacion1</td>
                                    <td class="">1</td>
                                    <td class="">10000</td>
                                    <td class="">100.000</td>

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
                                    <td>   2 </td>
                                    <td class="">  2</td>
                                    <td class="">  Descripción2</td>
                                    <td class="">  Clasificacion2</td>
                                    <td class="">  2</td>
                                    <td class="">  20</td>
                                    <td class="">200.000</td>

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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection

@section('js')
    <script>
        // $('#modal-success').modal();
        // $("#modals-alerts").fadeTo(1500, 500).slideUp(500, function(){
        //     $("#modals-alerts").slideUp(500);
        // });
    </script>


@endsection
