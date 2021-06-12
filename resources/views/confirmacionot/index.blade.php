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
                            @foreach ($ordenestrabajos as $orden)

                                <tr class="">
                                    <td> {{ $orden->id }} </td>
                                    <td class="">{{ $orden->cliente->razon_social }}</td>
                                    <td class="">{{ $orden->vehiculo->full_desc }}</td>
                                    <td class="">{{ $orden->vehiculo->chapa }}</td>
                                    <td class="">{{ date('d-m-Y H:i', strtotime($orden->fecha_recepcion)) }}</td>
                                    <td class="">{{ $orden->importe_total }}</td>
                                    <td class="">{{ $orden->estado }}</td>

                                    <td class="">
                                        <a
                                            href="{{ route('confirmacionot.ver', $orden->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a
                                            onclick="return confirm('¿Estás seguro de confirmar la orden?')"
                                            href="{{ route('confirmacionot.confirmar', $orden->id) }}"
                                            class= "btn btn-success">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        @if ($orden->importe_total > 0)
                                        <a
                                            onclick="return confirm('¿Estás seguro de enviar el presupuesto?')"
                                            href="{{ route('confirmacionot.presupuesto', $orden->id) }}"
                                            class= "btn btn-danger">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                        @endif
                                        <a
                                            onclick="return confirm('¿Estás seguro de cancelar la orden?')"
                                            href="{{ route('confirmacionot.cancelar', $orden->id) }}"
                                            class= "btn btn-danger">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
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
