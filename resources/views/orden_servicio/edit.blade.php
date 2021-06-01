<?php

// 
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'OrdenesServicios')
@section('css')
@stop

@section('menu-header')
<li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
<li class="breadcrumb-item active"> Editar OrdenesServicios </li>
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
                                    @isset($orden_servicio->id)
                                        <h3 class="card-title">Editar OrdenServicio</h3>
                                    @else
                                        <h3 class="card-title">Crear OrdenesServicios</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($orden_servicio->id)
                                        {!! Form::model($orden_servicio, ['route' => ['orden_servicio.update', $orden_servicio->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de OrdenServicio') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['orden_servicio.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset

                                    {{--<div class="form-row">--}}

                                        {{--Set all function cons base model dropdown list char 1--}}

                                        {{--CONST Verificado | verificado | verificado --}}
                                        <div class="form-group col">
                                            <label for="verificado" >Verificado</label>
                                            <select
                                                class   ="form-control"
                                                name    ="verificado"
                                                id      ="verificado">
                                                @foreach ($verificados as $key => $verificado)
                                                    <option value="{{   $verificado    }}"
                                                            @if (isset($orden_servicio->verificado) == old('verificado', $verificado) )
                                                            selected="selected"
                                                        @endif
                                                    >{{   $key    }} </option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('verificado') as $error)
                                                <span class="text text-danger">{{   $error    }}</span>
                                            @endforeach
                                        </div>
                                        {{-- FIN CONST Si------------------------------------ --}}

                                        {{--CONST Realizado | realizado | realizado --}}
                                        <div class="form-group col">
                                            <label for="realizado" >Realizado</label>
                                            <select
                                                class   ="form-control"
                                                name    ="realizado"
                                                id      ="realizado">
                                                @foreach ($realizados as $key => $realizado)
                                                    <option value="{{   $realizado    }}"
                                                            @if (isset($orden_servicio->realizado) == old('realizado', $realizado) )
                                                            selected="selected"
                                                        @endif
                                                    >{{   $key    }} </option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('realizado') as $error)
                                                <span class="text text-danger">{{   $error    }}</span>
                                            @endforeach
                                        </div>
                                        {{-- FIN CONST Si------------------------------------ --}}



                                        <div class="form-group col">
                                            {{--SELECT FK OT --}}
                                            {!! Form::label('ot_id', 'OT') !!}
                                            {!! Form::select('ot_id', $ordenes_trabajos->pluck('descripcion', 'id')  ,
                                                old('ot_id') ,
                                                [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Seleccione OT']
                                            ) !!}
                                            @error("ot_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                            {{--SELECT FK OT ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--SELECT FK Servicio --}}
                                            {!! Form::label('servicio_id', 'Servicio') !!}
                                            {!! Form::select('servicio_id', $servicios->pluck('descripcion', 'id')  ,
                                                old('servicio_id') ,
                                                [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Seleccione Servicio']
                                            ) !!}
                                            @error("servicio_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                            {{--SELECT FK Servicio ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--INPUT NUMERIC Cantidad --}}
                                            {!! Form::label('cantidad', 'Cantidad') !!}
                                            {!! Form::text(
                                                'cantidad',
                                                old('cantidad') ,
                                                [
                                                    'maxlength'     => '8,2',
                                                    'type'          => 'numeric',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Cantidad'
                                            ]) !!}
                                            @error("cantidad")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                        {{--INPUT NUMERIC Cantidad ------------------------------------ --}}

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
                                            {{--DATE TIMESTAMP Fecha de Registro --}}

                                            <label for="fecha_registro">Fecha de Registro </label>
                                            <input class    = "form-control"
                                                   type     = "date"
                                                   name     = "fecha_registro"
                                                   id       = "fecha_registro"
                                                   value    = '{{ old('fecha_registro',    date('Y-m-d', strtotime($orden_servicio->fecha_registro ?? date('Y-m-d') ))  )   }}'
                                                   placeholder="Introduzca Fecha de Registro">
                                            @foreach ($errors->get('fecha_registro') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div> 
                                        {{--DATE TIMESTAMP Fecha de Registro------------------------------------ --}}

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

                                        <div class="form-group col">
                                            {{--INPUT TEXT Descripción --}}
                                            {!! Form::label('descripcion_verificacion', 'Descripción') !!}
                                            {!! Form::text(
                                                'descripcion_verificacion',
                                                old('descripcion_verificacion') ,
                                                [
                                                    'maxlength'     => '200',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Descripción'
                                                ]) !!}
                                            @error("descripcion_verificacion")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                        {{--INPUT TEXT Descripción ------------------------------------ --}}


                                        {{--</div>--}}


                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('orden_servicio.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
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