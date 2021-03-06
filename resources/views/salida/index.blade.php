<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Entradas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Entrada
// $nombres  = $gen->tabla['ZnombresZ'] entradas
// $nombre   = $gen->tabla['ZnombreZ'] entrada
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de Salidas')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Salidas</li>
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
                        <h3 class="card-title">Salidas </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a href="{{route('stock.salidas.crear')}}" class="btn bg-cyan">Nuevo Salida</a>
                            @if( trim(Auth::user()->perfil) == 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a href="{{route('entrada.factory')}}" class="btn bg-teal float-right ">Generar Registro
                                    dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Id</th>
                                <th class="">Taller</th>
                                <th class="">OT</th>
                                <th class="">Empleado</th>
                                <th class="">Salidas</th>
                                {{--<th class="">Acciones</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salidas as $key => $salida)
                                <tr class="">
                                    <td>{{ $salida->id      }}</td>
                                    <td>{{ $salida->taller->descripcion      }}</td>
                                    <td>#{{ $salida->ordentrabajo->id }}
                                        - {{ $salida->ordentrabajo->cliente->razon_social }}</td>
                                    <td>{{ $salida->empleado->nombres . ' ' . $salida->empleado->apellidos}}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <th>Producto/Repuesto</th>
                                                <th>Cantidad</th>
                                            </tr>
                                            @foreach($salida->salidas_detalles as $detalle)
                                                <tr>
                                                    <td>{{ $detalle->producto_servicio->descripcion }}</td>
                                                    <td>{{ $detalle->cantidad }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    {{--<td class="">
                                        --}}{{--<a
                                            href="{{ route('stock.entradas.editar', $entrada->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>--}}{{--
                                       --}}{{-- <button
                                            type="button"
                                            class="btn btn-danger"
                                            data-toggle="modal"
                                            data-target="#modal-danger{{ $salida->id }}"
                                            data-data="{{ $salida->id }}">
                                            <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>--}}{{--

                                        <?php
/*                                        $confirmation = [
                                            'pk' => 'id',
                                            'value' => $salida->id,
                                            'ruta' => 'salida.destroy',
                                        ]
                                        */?>
                                        --}}{{--@include('adminlte::partials.modals.confirmation',  $confirmation)--}}{{--

                                    </td>--}}
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
