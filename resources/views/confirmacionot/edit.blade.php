<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] OrdenesTrabajos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] OrdenTrabajo
// $nombres  = $gen->tabla['ZnombresZ'] ordenes_trabajos
// $nombre   = $gen->tabla['ZnombreZ'] orden_trabajo
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'OrdenesTrabajos')
@section('css')
    @livewireStyles
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Ver Orden de Trabajo </li>
@stop
@section('content')

    {{--    <div class="row">
            <div class="col-lg-6">

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">--}}
    <div>
        <div class="row">
            <div class="col-6">
                <div class="col-lg-12">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-cyan">
                                        <div class="card-header">
                                            <h3 class="card-title">Ver OrdenTrabajo</h3>
                                        </div>


                                        <div class="card-body">

                                            <div class="row">

                                                {{--<div class="form-row">--}}
                                                <div class="form-group col-4">
                                                    {{--SELECT FK Taller --}}
                                                    {!! Form::label('taller_id', 'Taller') !!}
                                                    <br>
                                                    {{ $ordentrabajo->taller_id }}
                                                </div>
                                                {{--SELECT FK Taller ------------------------------------ --}}
                                                <div class="form-group col">
                                                    {{--SELECT FK Recepción --}}
                                                    {!! Form::label('recepcion_id', 'Recepción') !!}
                                                    <br>
                                                    {{ $ordentrabajo->recepcion_id }}
                                                </div>
                                                {{--SELECT FK Recepción ------------------------------------ --}}
                                            </div> {{--row --}}

                                            {{--Set all function cons base model dropdown list char 1--}}

                                            <div class="row">
                                                {{--CONST   | tipo | tipo --}}
                                                <div class="form-group col-4">
                                                    <label for="tipo">Tipo</label>
                                                    <br>
                                                    {{ $ordentrabajo->tipo }}
                                                </div>
                                                {{-- FIN CONST cero------------------------------------ --}}

                                                {{--CONST Estado Pendiente | estado | estado --}}
                                                <div class="form-group col-4">
                                                    <label for="estado">Estado Pendiente</label>
                                                    <br>
                                                    {{ $ordentrabajo->estado }}
                                                </div>
                                                {{-- FIN CONST Estado Pendiente------------------------------------ --}}

                                                {{--CONST Prioridad Normal | prioridad | prioridad --}}
                                                <div class="form-group col-4">
                                                    <label for="prioridad">Prioridad Normal</label>
                                                    <br>
                                                    {{ $ordentrabajo->prioridad }}
                                                </div>
                                                {{-- FIN CONST Prioridad Normal------------------------------------ --}}
                                            </div>{{--row --}}


                                            <div class="row">
                                                <div class="form-group col-6">
                                                    {{--DATE TIMESTAMP Fecha de Recepcion --}}

                                                    <label for="fecha_recepcion">Fecha de Recepcion </label>
                                                    <br>
                                                    {{ date('d-m-Y', strtotime($ordentrabajo->recepcion->fecha_recepcion)) }}
                                                </div>
                                                {{--DATE TIMESTAMP Fecha de Recepcion------------------------------------ --}}

                                                <div class="form-group col-6">
                                                    {{--DATE TIMESTAMP Fecha de Finalización --}}

                                                    <label for="fecha_fin">Fecha de Finalización </label>
                                                    <br>
                                                    {{ date('d-m-Y', strtotime($ordentrabajo->recepcion->fecha_finalizacion)) }}
                                                </div>
                                                {{--DATE TIMESTAMP Fecha de Finalización------------------------------------ --}}
                                            </div>{{--row --}}


                                            <div class="row">
                                                <div class="form-group col-6">
                                                    {{--SELECT FK Cliente --}}
                                                    {!! Form::label('cliente_id', 'Cliente') !!}
                                                    <br>
                                                    {{ $ordentrabajo->cliente->razon_social }}
                                                </div>
                                                {{--SELECT FK Cliente ------------------------------------ --}}

                                                <div class="form-group col-6">
                                                    {{--SELECT FK Vehículo --}}
                                                    {!! Form::label('vehiculo_id', 'Vehículo') !!}
                                                    <br>
                                                    {{ $ordentrabajo->vehiculo->full_desc }}
                                                </div>
                                                {{--SELECT FK Vehículo ------------------------------------ --}}
                                            </div>{{--row --}}

                                            <div class="row">
                                                <div class="form-group col-6">
                                                    {{--SELECT FK Empleado --}}
                                                    {!! Form::label('empleado_id', 'Empleado') !!}
                                                    <br>
                                                    {{ $ordentrabajo->empleado->nombres . ' ' . $ordentrabajo->empleado->apellidos }}
                                                </div>
                                                {{--SELECT FK Empleado ------------------------------------ --}}

                                                <div class="form-group col-6">
                                                    {{--SELECT FK Grupo de Trabajo --}}
                                                    {!! Form::label('grupo_id', 'Grupo de Trabajo') !!}
                                                </div>
                                                {{--SELECT FK Grupo de Trabajo ------------------------------------ --}}
                                            </div>{{--row --}}
                                            <hr>
                                            <div class="form-group col">
                                                <label>Síntomas de ingreso</label>
                                                <table
                                                    class="table table-sm table-hover nowrap d-table table-responsive">
                                                    <thead class="">
                                                    <tr>
                                                        <th class="w-auto">Item</th>
                                                        <th class="w-100">Descripción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($ordentrabajo->recepcion->sintomas as $sintoma)
                                                        <tr>
                                                            <td> {{ $sintoma->id }} </td>
                                                            <td> {{ $sintoma->descripcion }} </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group col">
                                                <label>Presupuesto</label>
                                                <table
                                                    class="table table-sm table-hover nowrap d-table table-responsive">
                                                    <thead class="">
                                                    <tr>
                                                        <th class="w-auto">#</th>
                                                        <th class="w-auto">ID</th>
                                                        <th class="w-100">Descripción</th>
                                                        <th class="w-100">Cantidad</th>
                                                        <th class="w-100">Precio Uni.</th>
                                                        <th class="w-100">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $ii=0 @endphp
                                                    @if($arrayItems)
                                                        @foreach ($arrayItems as $key => $item)
                                                            @php $ii++ @endphp
                                                            <tr>
                                                                <td> {{ $ii }} </td>
                                                                <td> {{ $item['id'] }} </td>
                                                                <td> {{ $item['descripcion'] }} </td>
                                                                <td>
                                                                    {{ $item['quantity'] }}
                                                                </td>
                                                                <td> {{ number_format($item['precio_venta'], 0, ',','.') }} </td>
                                                                <td> {{ number_format($item['subtotal'], 0, ',','.') }} </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td align="right" colspan="5"><b>Total</b></td>
                                                            <td>{{ number_format(array_sum(array_column($arrayItems, 'subtotal')), 0, ',', '.') }}</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="form-group col">
                                                {{--SELECT FK Usuario --}}
                                                {!! Form::label('usuario', 'Usuario') !!}
                                                <br>
                                                {{ Auth::user()->usuario }}
                                            </div>

                                            <div class="card-footer  ">
                                                <a href="{{ route('confirmacionot') }}  "
                                                   class="btn btn-secondary btn-close">Volver</a>
                                            </div>

                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    {{--                    </div>

                    </div>
                </section>

        </div>--}}
@endsection

@section('js')

    @livewireScripts

    <script>
        window.livewire.on('delCambio', (variable) => {

            $('#btn'+variable.id).removeClass();
            $('#icon'+variable.id).removeClass();
            $('#btn'+variable.id).addClass('btn btn-warning');
            $('#icon'+variable.id).addClass('fas fa-plus');

        });
        window.livewire.on('addCambio', (variable) => {

            $('#btn'+variable.id).removeClass();
            $('#icon'+variable.id).removeClass();
            $('#btn'+variable.id).addClass('btn btn-success');
            $('#icon'+variable.id).addClass('fas fa-check');

        });

        window.livewire.on('test', () => {


        });

        $('#lista1').dataTable({
            "autoWidth":false,
            "info":false,
            "JQueryUI":true,
            "ordering":true,
            "paging":false,
            "scrollY":"500px",
            "scrollCollapse":true
        });

        $('#lista2').dataTable({
            "autoWidth":false,
            "info":false,
            "JQueryUI":true,
            "ordering":true,
            "paging":false,
            "scrollY":"500px",
            "scrollCollapse":true
        });
    </script>
@endsection
