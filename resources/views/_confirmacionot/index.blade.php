<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ProductosServicios
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] ProductoServicio
// $nombres  = $gen->tabla['ZnombresZ'] productos_servicios
// $nombre   = $gen->tabla['ZnombreZ'] producto_servicio
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado Confirmación OT')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">Confirmacion OT </li>
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
                        <h3 class="card-title">Confirmacion OT   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">OT </th>
                                <th class="">Cliente </th>
                                <th class="">Vehículo </th>
                                <th class="">Chapa </th>
                                <th class="">Recepcion </th>
                                <th class="">Monto </th>
                                <th class="">Estado </th>
                                <th class="">Acción </th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr class="">
                                    <td> 15 </td>
                                    <td class="">Pedro Ramirez</td>
                                    <td class="">Toyota Vitz</td>
                                    <td class="">AAAX01</td>
                                    <td class="">04/08/19</td>
                                    <td class="">2.500.000</td>
                                    <td class="">Pendiente</td>

                                    <td class="">
                                        <a
                                            href=" "
                                            class= "btn btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a
                                            href=" "
                                            class= "btn btn-success">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger" >
                                            <i class ="fas fa-file-pdf" aria-hidden="true"></i>
                                        </button>

                                    </td>
                                </tr>
                                <tr class="">
                                    <td> 29 </td>
                                    <td class="">Anselma Britez</td>
                                    <td class="">Chevrolet-sail</td>
                                    <td class="">BBBX02</td>
                                    <td class="">10/08/19</td>
                                    <td class="">3.500.000</td>
                                    <td class="">Pendiente</td>

                                    <td class="">
                                        <a
                                            href=" "
                                            class= "btn btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a
                                            href=" "
                                            class= "btn btn-success">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger" >
                                            <i class ="fas fa-file-pdf" aria-hidden="true"></i>
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
