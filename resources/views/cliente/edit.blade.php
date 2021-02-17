<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Clientes
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Cliente
// $nombres  = $gen->tabla['ZnombresZ'] clientes
// $nombre   = $gen->tabla['ZnombreZ'] cliente
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Clientes')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar Clientes </li>
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
                                    @isset($cliente->id)
                                        <h3 class="card-title">Editar Cliente</h3>
                                    @else
                                        <h3 class="card-title">Crear Clientes</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($cliente->id)
                                        {!! Form::model($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de Cliente') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['cliente.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset

                                    {{--<div class="form-row">--}}

                                    {{--Set all function cons base model dropdown list char 1--}}

                                    <div class="form-group col">
                                        {{--CONST Sociedades - personeria --}}
                                        {!! Form::label('personeria', 'Personeria') !!} {{--personeria--}}
                                        {!! Form::select('personeria',
                                            [
                                                '0'                             => 'Seleccione Personeria'  ,
                                                $personerias['Sociedades']           => 'Sociedades' ,
                                                $personerias['Civiles']           => 'Civiles' ,
                                                $personerias['Simples ']           => 'Simples ' ,
                                                $personerias['Fundaciones']           => 'Fundaciones' ,
                                                $personerias['Entidades']           => 'Entidades' ,
                                                $personerias['Mutuales']           => 'Mutuales' ,
                                                $personerias['Cooperativas']           => 'Cooperativas' ,
                                                {{--  --}}
                                                $personerias['Consorcios']           => 'Consorcios'
                                            ],
                                            old('personeria') ,
                                            ['class' => 'form-control']
                                        ) !!}
                                        @error("personeria")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--CONST ------------------------------------ --}}



                                    <div class="form-group col">
                                        {{--INPUT TEXT Razon Social --}}
                                        {!! Form::label('razon_social', 'Razon Social') !!}
                                        {!! Form::text(
                                            'razon_social',
                                            old('razon_social') ,
                                            [
                                                'maxlength'     => '40',
                                                'type'          => 'text',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Razon Social'
                                            ]) !!}
                                        @error("razon_social")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT TEXT Razon Social ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--INPUT TEXT Documento --}}
                                        {!! Form::label('documento', 'Documento') !!}
                                        {!! Form::text(
                                            'documento',
                                            old('documento') ,
                                            [
                                                'maxlength'     => '12',
                                                'type'          => 'text',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Documento'
                                            ]) !!}
                                        @error("documento")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT TEXT Documento ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--INPUT TEXT Dirección --}}
                                        {!! Form::label('direccion', 'Dirección') !!}
                                        {!! Form::text(
                                            'direccion',
                                            old('direccion') ,
                                            [
                                                'maxlength'     => '80',
                                                'type'          => 'text',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Dirección'
                                            ]) !!}
                                        @error("direccion")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT TEXT Dirección ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--SELECT FK Localidad --}}
                                        {!! Form::label('localidad_id', 'Localidad') !!}
                                        {!! Form::select('localidad_id', $localidades->pluck('descripcion', 'id')  ,
                                            old('localidad_id') ,
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => 'Seleccione Localidad']
                                        ) !!}
                                        @error("localidad_id")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--SELECT FK Localidad ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--INPUT TEXT Teléfono --}}
                                        {!! Form::label('telefono', 'Teléfono') !!}
                                        {!! Form::text(
                                            'telefono',
                                            old('telefono') ,
                                            [
                                                'maxlength'     => '20',
                                                'type'          => 'text',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Teléfono'
                                            ]) !!}
                                        @error("telefono")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT TEXT Teléfono ------------------------------------ --}}




















                                    <div class="form-group col">
                                        {{--INPUT TEXT Móvil --}}
                                        {!! Form::label('movil', 'Móvil') !!}
                                        {!! Form::text(
                                            'movil',
                                            old('movil') ,
                                            [
                                                'maxlength'     => '20',
                                                'type'          => 'text',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Móvil'
                                            ]) !!}
                                        @error("movil")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT TEXT Móvil ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--DATE TIMESTAMP Fecha de Nacimiento --}}
                                        @if (isset($cliente->id))
                                            {{ $retrieveDate =  date('Y-m-d', strtotime($cliente->fecha_nacimiento ))  }}
                                        @else
                                            {{ $retrieveDate = null  }}
                                        @endif
                                        <label for="fecha_nacimiento">Fecha de Nacimiento </label>
                                        <input class    = "form-control"
                                               type     = "date"
                                               name     = "fecha_nacimiento"
                                               id       = "fecha_nacimiento"
                                               value    = '{{ old('fecha_nacimiento', $retrieveDate )   }}'
                                               placeholder="Introduzca Fecha de Nacimiento">
                                        @foreach ($errors->get('fecha_nacimiento') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    {{--DATE TIMESTAMP Fecha de Nacimiento------------------------------------ --}}



                                    {{--</div>--}}


                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('cliente.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
@endsection

@section('js')

    <script>
    </script>
@endsection
