<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ProductosServicios
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] ProductoServicio
// $nombres  = $gen->tabla['ZnombresZ'] productos_servicios
// $nombre   = $gen->tabla['ZnombreZ'] producto_servicio
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Asignación a Maquinaria')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Asignación a Maquinaria </li>
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
                        <h3 class="card-title">Asignación a Maquinaria   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="_asignacionamaquinariac" class="btn bg-cyan">Nueva Asignación a Maquinaria</a>

                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Maquinaria </th>
                                <th class="">Empleado </th>
                                <th class="">ID </th>
                                <th class="">Acción </th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr class="">
                                    <td> Leann Quitzon</td>
                                    <td class="">Juan Perez</td>
                                    <td class="">1</td>

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
                                    <td>   Roxane Schinner	</td>
                                    <td class="">  Yami</td>
                                    <td class="">  2</td>

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
