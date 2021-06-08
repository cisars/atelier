<?php

//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'ProductosServicios')
@section('css')
@stop

@section('menu-header')
<li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
<li class="breadcrumb-item active"> Editar ProductosServicios </li>
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
                                    @isset($producto_servicio->id)
                                        <h3 class="card-title">Editar ProductoServicio</h3>
                                    @else
                                        <h3 class="card-title">Crear ProductosServicios</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($producto_servicio->id)
                                        {!! Form::model($producto_servicio, ['route' => ['productoservicio.update', $producto_servicio->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de ProductoServicio') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['producto_servicio.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset

                                    {{--<div class="form-row">--}}

                                        {{--Set all function cons base model dropdown list char 1--}}

                                        {{--CONST Estado Activo | estado | estado --}}
                                        <div class="form-group col">
                                            <label for="estado" >Estado Activo</label>
                                            <select
                                                class   ="form-control"
                                                name    ="estado"
                                                id      ="estado">
                                                @foreach ($estados as $key => $estado)
                                                    <option value="{{   $estado    }}"
                                                            @if (isset($producto_servicio->estado) == old('estado', $estado) )
                                                            selected="selected"
                                                        @endif
                                                    >{{   $key    }} </option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('estado') as $error)
                                                <span class="text text-danger">{{   $error    }}</span>
                                            @endforeach
                                        </div>
                                        {{-- FIN CONST Estado Activo------------------------------------ --}}



                                        <div class="form-group col">
                                            {{--INPUT TEXT Codigo --}}
                                            {!! Form::label('codigo', 'Codigo') !!}
                                            {!! Form::text(
                                                'codigo',
                                                old('codigo') ,
                                                [
                                                    'maxlength'     => '15',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Codigo'
                                                ]) !!}
                                            @error("codigo")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{--INPUT TEXT Codigo ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--INPUT TEXT Descripcion --}}
                                            {!! Form::label('descripcion', 'Descripcion') !!}
                                            {!! Form::text(
                                                'descripcion',
                                                old('descripcion') ,
                                                [
                                                    'maxlength'     => '80',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Descripcion'
                                                ]) !!}
                                            @error("descripcion")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{--INPUT TEXT Descripcion ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--SELECT FK Clasificacion --}}
                                            {!! Form::label('clasificacion_id', 'Clasificacion') !!}
                                            {!! Form::select('clasificacion_id', $clasificaciones->pluck('descripcion', 'id')  ,
                                                old('clasificacion_id') ,
                                                [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Seleccione Clasificacion']
                                            ) !!}
                                            @error("clasificacion_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                            {{--SELECT FK Clasificacion ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--SELECT FK Unidad --}}
                                            {!! Form::label('unidad_id', 'Unidad') !!}
                                            {!! Form::select('unidad_id', $unidades->pluck('descripcion', 'id')  ,
                                                old('unidad_id') ,
                                                [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Seleccione Unidad']
                                            ) !!}
                                            @error("unidad_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                            {{--SELECT FK Unidad ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--INPUT NUMERIC Impuesto --}}
                                            {!! Form::label('impuesto', 'Impuesto') !!}
                                            {!! Form::text(
                                                'impuesto',
                                                old('impuesto') ,
                                                [
                                                    'maxlength'     => '',
                                                    'type'          => 'numeric',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Impuesto'
                                            ]) !!}
                                            @error("impuesto")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{--INPUT NUMERIC Impuesto ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--INPUT NUMERIC Precio de Venta --}}
                                            {!! Form::label('precio_venta', 'Precio de Venta') !!}
                                            {!! Form::text(
                                                'precio_venta',
                                                old('precio_venta') ,
                                                [
                                                    'maxlength'     => '12,0',
                                                    'type'          => 'numeric',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Precio de Venta'
                                            ]) !!}
                                            @error("precio_venta")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{--INPUT NUMERIC Precio de Venta ------------------------------------ --}}


                                        {{--</div>--}}


                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('producto_servicio.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
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
