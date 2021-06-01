<?php

// 
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'EntradasDetalles')
@section('css')
@stop

@section('menu-header')
<li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
<li class="breadcrumb-item active"> Editar EntradasDetalles </li>
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
                                    @isset($entrada_detalle->id)
                                        <h3 class="card-title">Editar EntradaDetalle</h3>
                                    @else
                                        <h3 class="card-title">Crear EntradasDetalles</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($entrada_detalle->id)
                                        {!! Form::model($entrada_detalle, ['route' => ['entrada_detalle.update', $entrada_detalle->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de EntradaDetalle') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['entrada_detalle.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset

                                    {{--<div class="form-row">--}}

                                        {{--Set all function cons base model dropdown list char 1--}}


                                        <div class="form-group col">
                                            {{--INPUT NUMERIC Item --}}
                                            {!! Form::label('item', 'Item') !!}
                                            {!! Form::text(
                                                'item',
                                                old('item') ,
                                                [
                                                    'maxlength'     => '',
                                                    'type'          => 'numeric',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Item'
                                            ]) !!}
                                            @error("item")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                        {{--INPUT NUMERIC Item ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--SELECT FK Entrada --}}
                                            {!! Form::label('entrada_id', 'Entrada') !!}
                                            {!! Form::select('entrada_id', $entradas->pluck('id', 'id')  ,
                                                old('entrada_id') ,
                                                [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Seleccione Entrada']
                                            ) !!}
                                            @error("entrada_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                            {{--SELECT FK Entrada ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--SELECT FK Sector Id --}}
                                            {!! Form::label('sector_id', 'Sector Id') !!}
                                            {!! Form::select('sector_id', $sectores->pluck('sector_id', 'id')  ,
                                                old('sector_id') ,
                                                [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Seleccione Sector Id']
                                            ) !!}
                                            @error("sector_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                            {{--SELECT FK Sector Id ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--SELECT FK Producto Id --}}
                                            {!! Form::label('producto_id', 'Producto Id') !!}
                                            {!! Form::select('producto_id', $productos_servicios->pluck('producto_id', 'id')  ,
                                                old('producto_id') ,
                                                [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Seleccione Producto Id']
                                            ) !!}
                                            @error("producto_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                            {{--SELECT FK Producto Id ------------------------------------ --}}

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


                                        {{--</div>--}}


                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('entrada_detalle.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
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