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


                                        <div class="card-body" style=" background-image:url('/img/bg-ot.gif')" >
                                            <div class="jumbotron m-0 p-4" style="background:rgba(225,239,245,0.7); ">
                                                <div class="row">

                                                    {{--<div class="form-row">--}}
                                                    <div class="form-group col-4 bg-gray-light">
                                                        {{--SELECT FK Taller --}}
                                                        {!! Form::label('taller_id', 'Taller') !!}
                                                        {{ $ordentrabajo->taller->descripcion }}
                                                    </div>
                                                    <div class="form-group col-4">
                                                    </div>
                                                    {{--SELECT FK Taller ------------------------------------ --}}
                                                    <div class=" col-4   ">

                                                        {{--SELECT FK Recepción --}}
                                                        {!! Form::label('recepcion_id', 'Recepción Nro  ' ) !!}
                                                        <span class="h3" >#{{ $ordentrabajo->recepcion_id }}
                                                </span>
                                                    </div>
                                                    {{--SELECT FK Recepción ------------------------------------ --}}

                                                </div> {{--row --}}
                                            {{--Set all function cons base model dropdown list char 1--}}
                                                <div class="row">
                                                    {{--CONST   | tipo | tipo --}}
                                                    <div class="form-group col-4 bg-gray-light">
                                                        <label for="tipo">Tipo</label>
                                                        {{ $ordentrabajo->tipo }}
                                                    </div>
                                                    {{-- FIN CONST cero------------------------------------ --}}
                                                    <div class="form-group col-4">
                                                    </div>
                                                    {{--CONST Estado Pendiente | estado | estado --}}
                                                    <div class="form-group col-4 bg-gray-light">
                                                        <label for="estado">Estado</label>
                                                        {{ $ordentrabajo->estado }}
                                                    </div>
                                                    {{-- FIN CONST Estado Pendiente------------------------------------ --}}

                                                </div>{{--row --}}
                                                <div class="row">
                                                    <div class="form-group col-5 bg-gray-light">
                                                        {{--DATE TIMESTAMP Fecha de Recepcion --}}

                                                        <label for="fecha_recepcion">Fecha Recepción </label>

                                                        {{ date('d-m-Y', strtotime($ordentrabajo->recepcion->fecha_recepcion)) }}
                                                    </div>
                                                    {{--DATE TIMESTAMP Fecha de Recepcion------------------------------------ --}}
                                                    <div class="form-group col-2  ">
                                                    </div>
                                                    <div class="form-group col-5 bg-gray-light">
                                                        {{--DATE TIMESTAMP Fecha de Finalización --}}

                                                        <label for="fecha_fin">Fecha Finalización </label>

                                                        {{--                                                {{ date('d-m-Y', strtotime($ordentrabajo->recepcion->fecha_finalizacion)) }}--}}
                                                    </div>
                                                    {{--DATE TIMESTAMP Fecha de Finalización------------------------------------ --}}
                                                </div>{{--row --}}
                                                <div class="row">
                                                    <div class="form-group col-5 bg-gray-light">
                                                        {{--SELECT FK Cliente --}}
                                                        {!! Form::label('cliente_id', 'Cliente') !!}

                                                        {{ $ordentrabajo->cliente->razon_social }}
                                                    </div>
                                                    {{--SELECT FK Cliente ------------------------------------ --}}
                                                    <div class="form-group col-2  ">
                                                    </div>
                                                    <div class="form-group col-5 bg-gray-light">
                                                        {{--SELECT FK Vehículo --}}
                                                        {!! Form::label('vehiculo_id', 'Vehículo') !!}

                                                        {{ $ordentrabajo->vehiculo->full_desc }}
                                                    </div>
                                                    {{--SELECT FK Vehículo ------------------------------------ --}}
                                                </div>{{--row --}}
                                                <div class="row">
                                                    <div class="form-group col-5 bg-gray-light">
                                                        {{--SELECT FK Empleado --}}
                                                        {!! Form::label('empleado_id', 'Recepcionista') !!}

                                                        {{ $ordentrabajo->empleado->apellidos . ', ' . $ordentrabajo->empleado->nombres }}
                                                    </div>
                                                    {{--SELECT FK Empleado ------------------------------------ --}}
                                                    <div class="form-group col-2  ">
                                                    </div>
                                                    <div class="form-group col-5 bg-gray-light">
                                                        {{--SELECT FK Grupo de Trabajo --}}
                                                        {!! Form::label('grupo_id', 'Grupo de Trabajo') !!}
                                                    </div>
                                                    {{--SELECT FK Grupo de Trabajo ------------------------------------ --}}
                                                </div>{{--row --}}
                                                <div class="row">
                                                {{--CONST Prioridad Normal | prioridad | prioridad --}}
                                                <div class="form-group col-4">
                                                    <label for="prioridad">Prioridad </label>

                                                    {{ $ordentrabajo->prioridad }}
                                                </div>
                                                {{-- FIN CONST Prioridad Normal------------------------------------ --}}
                                            </div>{{--row --}}
                                            </div>{{--  jumbotron  --}}
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

                                            <div class="row">
                                                <div class="form-group col-4">
                                                    {{--SELECT FK Usuario --}}
                                                    {!! Form::label('usuario', 'Usuario') !!}

                                                    {{ Auth::user()->usuario }}
                                                </div>
                                                <div class="form-group col-8">
                                                    {{--SELECT FK Usuario --}}
                                                    {!! Form::label('mecanico', 'Mecánico Responsable') !!}

                                                    {{ Auth::user()->empleado->apellidos }}, {{ Auth::user()->empleado->nombres }}
                                                </div>
                                                {{--SELECT FK Usuario ------------------------------------ --}}
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
