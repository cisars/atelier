<?php

//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'EmpleadosMaquinas')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar EmpleadosMaquinas </li>
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
                                    @isset($empleado_maquina->id)
                                        <h3 class="card-title">Editar EmpleadoMaquina</h3>
                                    @else
                                        <h3 class="card-title">Crear EmpleadosMaquinas</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($empleado_maquina->id)
                                        {!! Form::model($empleado_maquina, ['route' => ['empleado_maquina.update', $empleado_maquina->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de EmpleadoMaquina') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['empleado_maquina.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset

                                    {{--<div class="form-row">--}}

                                    {{--Set all function cons base model dropdown list char 1--}}


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
                                        {{--SELECT FK Maquinaria --}}
                                        {!! Form::label('maquinaria_id', 'Maquinaria') !!}
                                        {!! Form::select('maquinaria_id', $maquinarias->pluck('descripcion', 'id')  ,
                                            old('maquinaria_id') ,
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => 'Seleccione Maquinaria']
                                        ) !!}
                                        @error("maquinaria_id")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--SELECT FK Maquinaria ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--INPUT TEXT Observación --}}
                                        {!! Form::label('observacion', 'Observación') !!}
                                        {!! Form::text(
                                            'observacion',
                                            old('observacion') ,
                                            [
                                                'maxlength'     => '200',
                                                'type'          => 'text',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'Observación'
                                            ]) !!}
                                        @error("observacion")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--INPUT TEXT Observación ------------------------------------ --}}


                                    {{--</div>--}}


                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('empleado_maquina.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
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
