<?php

?>
@extends('adminlte::page')
@section('title', 'Listado de EntradasDetalles')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM EntradasDetalles </li>
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
                        <h3 class="card-title">EntradasDetalles   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('entrada_detalle.create')}}" class="btn bg-cyan">Nuevo EntradaDetalle</a>
                            @if( trim(Auth::user()->perfil) == 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('entrada_detalle.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                                <tr>
                                    <th class="">Item </th>
                                    <th class="">Entrada </th>
                                    <th class="">Sector Id </th>
                                    <th class="">Producto Id </th>
                                    <th class="">Cantidad </th>
                                    <th class="">Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($entradas_detalles as $key => $entrada_detalle)
                                <tr class="">
                                    <td>{{ $entrada_detalle->item      }}</td>
                                    <td>{{ $entrada_detalle->entrada->id      }}</td>
                                    <td>{{ $entrada_detalle->sector->sector_id      }}</td>
                                    <td>{{ $entrada_detalle->producto_servicio->producto_id      }}</td>
                                    <td>{{ $entrada_detalle->cantidad      }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('entrada_detalle.edit', $entrada_detalle->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $entrada_detalle->id }}"
                                            data-data   ="{{ $entrada_detalle->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $entrada_detalle->id,
                                            'ruta'  => 'entrada_detalle.destroy',
                                        ]
                                        ?>
                                        @include('adminlte::partials.modals.confirmation',  $confirmation)
                                        
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