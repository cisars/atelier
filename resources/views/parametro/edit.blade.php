<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Parametros
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Parametro
// $nombres  = $gen->tabla['ZnombresZ'] parametros
// $nombre   = $gen->tabla['ZnombreZ'] parametro
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Parametros')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar Parametros </li>
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
                                    @isset($parametro->id)
                                        <h3 class="card-title">Editar Parametro</h3>
                                    @else
                                        <h3 class="card-title">Crear Parametros</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($parametro->id)
                                        {!! Form::model($parametro, ['route' => ['parametro.update', $parametro->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de Parametro') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['parametro.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset

                                    {{--<div class="form-row">--}}

                                    {{--Set all function cons base model dropdown list char 1--}}



                                    <div class="form-group col">
                                        {{--INPUT TEXT Descripción --}}
                                        {!! Form::label('descripcion', 'Descripción') !!}
                                        {!! Form::text(
                                            'descripcion',
                                            old('descripcion') ,
                                            [
                                                'maxlength'     => '',
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
                                        {{--INPUT NUMERIC Total Prioridades Altas --}}
                                        {!! Form::label('cantidad_prioridad_alta', 'Total Prioridades Altas') !!}
                                        {!! Form::text(
                                            'cantidad_prioridad_alta',
                                            old('cantidad_prioridad_alta') ,
                                            [
                                                'maxlength'     => '',
                                                'type'          => 'numeric',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Total Prioridades Altas'
                                        ]) !!}
                                        @error("cantidad_prioridad_alta")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT NUMERIC Total Prioridades Altas ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--INPUT NUMERIC Jefe Mecanicos Def --}}
                                        {!! Form::label('jefe_mecanicos', 'Jefe Mecanicos Def') !!}
                                        {!! Form::text(
                                            'jefe_mecanicos',
                                            old('jefe_mecanicos') ,
                                            [
                                                'maxlength'     => '',
                                                'type'          => 'numeric',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Jefe Mecanicos Def'
                                        ]) !!}
                                        @error("jefe_mecanicos")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT NUMERIC Jefe Mecanicos Def ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--INPUT NUMERIC Periodicidad Min. --}}
                                        {!! Form::label('periodicidad', 'Periodicidad Min.') !!}
                                        {!! Form::text(
                                            'periodicidad',
                                            old('periodicidad') ,
                                            [
                                                'maxlength'     => '',
                                                'type'          => 'numeric',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Periodicidad Min.'
                                        ]) !!}
                                        @error("periodicidad")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT NUMERIC Periodicidad Min. ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--INPUT NUMERIC Cantidad de Sectores --}}
                                        {!! Form::label('sectores', 'Cantidad de Sectores') !!}
                                        {!! Form::text(
                                            'sectores',
                                            old('sectores') ,
                                            [
                                                'maxlength'     => '',
                                                'type'          => 'numeric',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Cantidad de Sectores'
                                        ]) !!}
                                        @error("sectores")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT NUMERIC Cantidad de Sectores ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--DATE TIMESTAMP Hora de Apertura --}}

                                        <label for="hora_apertura">Hora de Apertura </label>
                                        <input class    = "form-control"
                                               type     = "time"
                                               name     = "hora_apertura"
                                               id       = "hora_apertura"
                                               value    = '{{ old('hora_apertura ' ,    $parametro->hora_apertura ?? ''  ) }}'
                                               placeholder="Introduzca Hora de Apertura">
                                        @foreach ($errors->get('hora_apertura') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    {{--DATE TIMESTAMP Hora de Apertura------------------------------------ --}}


                                    <div class="form-group col">
                                        {{--DATE TIMESTAMP Hora de Cierre --}}

                                        <label for="hora_cierre">Hora de Cierre </label>
                                        <input class    = "form-control"
                                               type     = "time"
                                               name     = "hora_cierre"
                                               id       = "hora_cierre"
                                               value    = '{{ old('hora_cierre ' ,    $parametro->hora_cierre ?? ''  ) }}'
                                               placeholder="Introduzca Hora de Cierre">
                                        @foreach ($errors->get('hora_cierre') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    {{--DATE TIMESTAMP Hora de Cierre------------------------------------ --}}


                                    <div class="form-group col">
                                        {{--DATE TIMESTAMP Hora de Apertura Sabado --}}

                                        <label for="hora_apertura_sab">Hora de Apertura Sabado </label>
                                        <input class    = "form-control"
                                               type     = "time"
                                               name     = "hora_apertura_sab"
                                               id       = "hora_apertura_sab"
                                               value    = '{{ old('hora_apertura_sab ' ,    $parametro->hora_apertura_sab ?? ''  ) }}'
                                               placeholder="Introduzca Hora de Apertura Sabado">
                                        @foreach ($errors->get('hora_apertura_sab') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    {{--DATE TIMESTAMP Hora de Apertura Sabado------------------------------------ --}}


                                    <div class="form-group col">
                                        {{--DATE TIMESTAMP Hora de Cierre Sabado --}}

                                        <label for="hora_cierre_sab">Hora de Cierre Sabado </label>
                                        <input class    = "form-control"
                                               type     = "time"
                                               name     = "hora_cierre_sab"
                                               id       = "hora_cierre_sab"
                                               value    = '{{ old('hora_cierre_sab ' ,    $parametro->hora_cierre_sab ?? ''  ) }}'
                                               placeholder="Introduzca Hora de Cierre Sabado">
                                        @foreach ($errors->get('hora_cierre_sab') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    {{--DATE TIMESTAMP Hora de Cierre Sabado------------------------------------ --}}


                                    <div class="form-group col">
                                        {{--INPUT Radio Activo --}}
                                        {!! Form::label('activo', 'Activo') !!}
                                        {!! Form::radio('activo', 0, old('activo') , [ 'id' => 'activo' ]) !!}
                                        No
                                        {!! Form::radio('activo', 1, old('activo') , [ 'id' => 'activo' ]) !!}
                                        Si
                                        @error("activo")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    {{--</div>--}}


                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('parametro.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
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

