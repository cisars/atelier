<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Reservas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Reserva
// $nombres  = $gen->tabla['ZnombresZ'] reservas
// $nombre   = $gen->tabla['ZnombreZ'] reserva
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Reservas')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar Reserva </li>
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
                                    @isset($reserva->id)
                                        <h3 class="card-title">Editar Reserva</h3>
                                    @else
                                        <h3 class="card-title">Crear Reservas</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($reserva->id)
                                        {!! Form::model($reserva, ['route' => ['reserva.update', $reserva->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de Reserva') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['reserva.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset

                                    {{--<div class="form-row">--}}

                                    {{--Set all function cons base model dropdown list char 1--}}



                                    <div class="form-group col">
                                        {{--SELECT FK Taller --}}
                                        {!! Form::label('taller_id', 'Taller') !!}
                                        {!! Form::select('taller_id', $talleres->pluck('descripcion', 'id')  ,
                                            old('taller_id') ,
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => 'Seleccione Taller']
                                        ) !!}
                                        @error("taller_id")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--SELECT FK Taller ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--SELECT FK Cliente --}}
                                        {!! Form::label('cliente_id', 'Cliente') !!}
                                        {!! Form::select('cliente_id', $clientes->pluck('razon_social', 'id')  ,
                                            old('cliente_id') ,
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => 'Seleccione Cliente']
                                        ) !!}
                                        @error("cliente_id")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--SELECT FK Cliente ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--SELECT FK Vehículo --}}
                                        {!! Form::label('vehiculo_id', 'Vehículo') !!}
                                        {!! Form::select('vehiculo_id', $vehiculos->pluck('chapa', 'id')  ,
                                            old('vehiculo_id') ,
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => 'Seleccione Vehículo']
                                        ) !!}
                                        @error("vehiculo_id")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--SELECT FK Vehículo ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--DATE TIMESTAMP Fecha --}}

                                        <label for="fecha">Fecha </label>
                                        <input class    = "form-control"
                                               type     = "date"
                                               readonly
                                               name     = "fecha"
                                               id       = "fecha"
                                               value    = '{{  date('d-m-Y', strtotime($reserva->fecha )) ?? date('Y-m-d') }}'
                                               placeholder="Introduzca Fecha">
                                        @foreach ($errors->get('fecha') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    {{--DATE TIMESTAMP Fecha------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--DATE TIMESTAMP Para Fecha --}}

                                        <label for="para_fecha">Para Fecha </label>
                                        <input class    = "form-control"
                                               type     = "date"
                                               name     = "para_fecha"
                                               id       = "para_fecha"
                                               value    = '{{ old('para_fecha',    date('d-m-Y', strtotime($reserva->para_fecha ))  )   }}'
                                               placeholder="Introduzca Para Fecha">
                                        @foreach ($errors->get('para_fecha') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    {{--DATE TIMESTAMP Para Fecha------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--SELECT FK Empleado --}}
                                        {!! Form::label('empleado_id', 'Empleado') !!}
                                        {!! Form::select('empleado_id', $empleados->pluck('apellidos', 'id')  ,
                                            old('empleado_id') ,
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => 'Seleccione Empleado']
                                        ) !!}
                                        @error("empleado_id")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--SELECT FK Empleado ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--INPUT TEXT Observación --}}
                                        {!! Form::label('observacion', 'Observación') !!}
                                        {!! Form::textarea(
                                            'observacion',
                                            old('observacion') ,
                                            [
                                                'maxlength'     => '200',
                                                'cols'          => '5',
                                                'rows'          => '5',
                                                'type'          => 'text',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Observación'
                                            ]) !!}
                                        @error("observacion")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT TEXT Observación ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--SELECT FK Usuario --}}
                                        {!! Form::label('usuario', 'Usuario') !!}
                                        {!! Form::select('usuario', $usuarios->pluck('usuario' )  ,
                                            old('usuario') ,
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => 'Seleccione Usuario']
                                        ) !!}
                                        @error("usuario")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--SELECT FK Usuario ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--DATE TIMESTAMP Para Hora --}}

                                        <label for="para_hora">Para Hora </label>
                                        <input class    = "form-control"
                                               type     = "time"
                                               name     = "para_hora"
                                               id       = "para_hora"
                                               value    = '{{ old('para_hora ' ,    $reserva->para_hora ?? ''  ) }}'
                                               placeholder="Introduzca Para Hora">
                                        @foreach ($errors->get('para_hora') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    {{--DATE TIMESTAMP Para Hora------------------------------------ --}}


                                    <div class="form-group col">
                                        {{--INPUT NUMERIC Sector --}}
                                        {!! Form::label('sector', 'Sector') !!}
                                        {!! Form::text(
                                            'sector',
                                            old('sector') ,
                                            [
                                                'maxlength'     => '',
                                                'type'          => 'numeric',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Sector'
                                        ]) !!}
                                        @error("sector")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT NUMERIC Sector ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--INPUT NUMERIC Ticket --}}
                                        {!! Form::label('ticket', 'Ticket') !!}
                                        {!! Form::text(
                                            'ticket',
                                            old('ticket') ,
                                            [
                                                'maxlength'     => '',
                                                'type'          => 'numeric',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Ticket'
                                        ]) !!}
                                        @error("ticket")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT NUMERIC Ticket ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--SELECT FK Parametro ID --}}
                                        {!! Form::label('parametro_id', 'Parametro ID') !!}
                                        {!! Form::text(
                                            'ticket',
                                            old('ticket') ,
                                            [
                                                'maxlength'     => '',
                                                'id'            => 'parametro_id',
                                                'name'          => 'parametro_id',
                                                'type'          => 'text',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Ticket'
                                        ]) !!}
                                        @error("parametro_id")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--SELECT FK Parametro ID ------------------------------------ --}}


                                    {{--</div>--}}


                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('reserva.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
        @endsection

        @section('js')

            <script>
            </script>
@endsection
