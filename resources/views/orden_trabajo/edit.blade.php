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
@stop

@section('menu-header')
<li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
<li class="breadcrumb-item active"> Editar OrdenesTrabajos </li>
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
                                    @isset($orden_trabajo->id)
                                        <h3 class="card-title">Editar OrdenTrabajo</h3>
                                    @else
                                        <h3 class="card-title">Crear OrdenesTrabajos</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($orden_trabajo->id)
                                        {!! Form::model($orden_trabajo, ['route' => ['orden_trabajo.update', $orden_trabajo->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de OrdenTrabajo') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['orden_trabajo.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset

                                    {{--<div class="form-row">--}}

                                        {{--Set all function cons base model dropdown list char 1--}}

                                        {{--CONST Cero | tipo | tipo --}}
                                        <div class="form-group col">
                                            <label for="tipo" >Cero</label>
                                            <select
                                                class   ="form-control"
                                                name    ="tipo"
                                                id      ="tipo">
                                                @foreach ($tipos as $key => $tipo)
                                                    <option value="{{   $tipo    }}"
                                                            @if (isset($orden_trabajo->tipo) == old('tipo', $tipo) )
                                                            selected="selected"
                                                        @endif
                                                    >{{   $key    }} </option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('tipo') as $error)
                                                <span class="text text-danger">{{   $error    }}</span>
                                            @endforeach
                                        </div>
                                        {{-- FIN CONST cero------------------------------------ --}}

                                        {{--CONST Estado Pendiente | estado | estado --}}
                                        <div class="form-group col">
                                            <label for="estado" >Estado Pendiente</label>
                                            <select
                                                class   ="form-control"
                                                name    ="estado"
                                                id      ="estado">
                                                @foreach ($estados as $key => $estado)
                                                    <option value="{{   $estado    }}"
                                                            @if (isset($orden_trabajo->estado) == old('estado', $estado) )
                                                            selected="selected"
                                                        @endif
                                                    >{{   $key    }} </option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('estado') as $error)
                                                <span class="text text-danger">{{   $error    }}</span>
                                            @endforeach
                                        </div>
                                        {{-- FIN CONST Estado Pendiente------------------------------------ --}}

                                        {{--CONST Prioridad Normal | prioridad | prioridad --}}
                                        <div class="form-group col">
                                            <label for="prioridad" >Prioridad Normal</label>
                                            <select
                                                class   ="form-control"
                                                name    ="prioridad"
                                                id      ="prioridad">
                                                @foreach ($prioridades as $key => $prioridad)
                                                    <option value="{{   $prioridad    }}"
                                                            @if (isset($orden_trabajo->prioridad) == old('prioridad', $prioridad) )
                                                            selected="selected"
                                                        @endif
                                                    >{{   $key    }} </option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('prioridad') as $error)
                                                <span class="text text-danger">{{   $error    }}</span>
                                            @endforeach
                                        </div>
                                        {{-- FIN CONST Prioridad Normal------------------------------------ --}}



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
                                            {{--DATE TIMESTAMP Fecha de Recepcion --}}

                                            <label for="fecha_recepcion">Fecha de Recepcion </label>
                                            <input class    = "form-control"
                                                   type     = "date"
                                                   name     = "fecha_recepcion"
                                                   id       = "fecha_recepcion"
                                                   value    = '{{ old('fecha_recepcion',    date('Y-m-d', strtotime($orden_trabajo->fecha_recepcion ?? date('Y-m-d') ))  )   }}'
                                                   placeholder="Introduzca Fecha de Recepcion">
                                            @foreach ($errors->get('fecha_recepcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div> 
                                        {{--DATE TIMESTAMP Fecha de Recepcion------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--DATE TIMESTAMP Fecha de Finalización --}}

                                            <label for="fecha_fin">Fecha de Finalización </label>
                                            <input class    = "form-control"
                                                   type     = "date"
                                                   name     = "fecha_fin"
                                                   id       = "fecha_fin"
                                                   value    = '{{ old('fecha_fin',    date('Y-m-d', strtotime($orden_trabajo->fecha_fin ?? date('Y-m-d') ))  )   }}'
                                                   placeholder="Introduzca Fecha de Finalización">
                                            @foreach ($errors->get('fecha_fin') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div> 
                                        {{--DATE TIMESTAMP Fecha de Finalización------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--SELECT FK Recepción --}}
                                            {!! Form::label('recepcion_id', 'Recepción') !!}
                                            {!! Form::select('recepcion_id', $recepciones->pluck('id', 'id')  ,
                                                old('recepcion_id') ,
                                                [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Seleccione Recepción']
                                            ) !!}
                                            @error("recepcion_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                            {{--SELECT FK Recepción ------------------------------------ --}}

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
                                            {!! Form::select('vehiculo_id', $vehiculos->pluck('id', 'id')  ,
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
                                            {{--SELECT FK Grupo de Trabajo --}}
                                            {!! Form::label('grupo_id', 'Grupo de Trabajo') !!}
                                            {!! Form::select('grupo_id', $grupos->pluck('apellidos', 'id')  ,
                                                old('grupo_id') ,
                                                [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Seleccione Grupo de Trabajo']
                                            ) !!}
                                            @error("grupo_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                            {{--SELECT FK Grupo de Trabajo ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--INPUT TEXT Descripción --}}
                                            {!! Form::label('descripcion', 'Descripción') !!}
                                            {!! Form::text(
                                                'descripcion',
                                                old('descripcion') ,
                                                [
                                                    'maxlength'     => '200',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Descripción'
                                                ]) !!}
                                            @error("descripcion")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                        {{--INPUT TEXT Descripción ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--INPUT NUMERIC Importe Total --}}
                                            {!! Form::label('importe_total', 'Importe Total') !!}
                                            {!! Form::text(
                                                'importe_total',
                                                old('importe_total') ,
                                                [
                                                    'maxlength'     => '12,0',
                                                    'type'          => 'numeric',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Importe Total'
                                            ]) !!}
                                            @error("importe_total")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                        {{--INPUT NUMERIC Importe Total ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--SELECT FK Usuario --}}
                                            {!! Form::label('usuario', 'Usuario') !!}
                                            {!! Form::select('usuario', $usuarios->pluck('usuario', 'id')  ,
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


                                        {{--</div>--}}


                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('orden_trabajo.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
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