<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ProductosServicios
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] ProductoServicio
// $nombres  = $gen->tabla['ZnombresZ'] productos_servicios
// $nombre   = $gen->tabla['ZnombreZ'] producto_servicio
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de Entrega Vehículo')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Entrega Vehículo </li>
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
                        <h3 class="card-title">Entrega Vehículo   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{ route('entregas.crear') }}" class="btn bg-cyan">Nueva Entrega de Vehículo</a>

                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Taller </th>
                                <th class="">Entrega</th>
                                <th class="">Ot </th>
                                <th class="">Cliente </th>
                                <th class="">Vehículo</th>
                                <th class="">Entregado por</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($entregas as $entrega)

                                <tr class=" ">
                                    <td> {{ $entrega->taller->descripcion }} </td>
                                    <td> {{ $entrega->fecha }} </td>
                                    <td class="">{{ $entrega->ot_id }}</td>
                                    <td class="">{{ $entrega->cliente->razon_social }}</td>
                                    <td class="">{{ $entrega->vehiculo->full_desc }}</td>
                                    <td class=""> {{ $entrega->usuario }} </td>
                                </tr>
                            @endforeach
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
