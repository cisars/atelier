<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Descansos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Descanso
// $nombres  = $gen->tabla['ZnombresZ'] descansos
// $nombre   = $gen->tabla['ZnombreZ'] descanso
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Descansos')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar Descansos </li>
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
                                    @isset($descanso->id)
                                        <h3 class="card-title">Editar Descanso</h3>
                                    @else
                                        <h3 class="card-title">Crear Descansos</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($descanso->id)
                                        {!! Form::model($descanso, ['route' => ['descanso.update', $descanso->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de Descanso') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['descanso.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset

                                    {{--<div class="form-row">--}}

                                    {{--Set all function cons base model dropdown list char 1--}}



                                    <div class="form-group col">
                                        {{--SELECT FK ParametroID --}}
                                        {!! Form::label('parametro_id', 'ParametroID') !!}
                                        {!! Form::select('parametro_id', $parametros->pluck('descripcion', 'id')  ,
                                            old('parametro_id') ,
                                            [
                                                'class' => 'form-control',
                                                'placeholder' => 'Seleccione ParametroID']
                                        ) !!}
                                        @error("parametro_id")
                                        <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--SELECT FK ParametroID ------------------------------------ --}}

                                    <div class="form-group col">
                                        {{--DATE TIMESTAMP Hora Desde --}}

                                        <label for="desde">Hora Desde </label>
                                        <input class    = "form-control"
                                               type     = "time"
                                               name     = "desde"
                                               id       = "desde"
                                               value    = '{{ old('desde ' ,    $descanso->desde ?? ''  ) }}'
                                               placeholder="Introduzca Hora Desde">
                                        @foreach ($errors->get('desde') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    {{--DATE TIMESTAMP Hora Desde------------------------------------ --}}


                                    <div class="form-group col">
                                        {{--DATE TIMESTAMP Hora Hasta --}}

                                        <label for="hasta">Hora Hasta </label>
                                        <input class    = "form-control"
                                               type     = "time"
                                               name     = "hasta"
                                               id       = "hasta"
                                               value    = '{{ old('hasta ' ,    $descanso->hasta ?? ''  ) }}'
                                               placeholder="Introduzca Hora Hasta">
                                        @foreach ($errors->get('hasta') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    {{--DATE TIMESTAMP Hora Hasta------------------------------------ --}}



                                    {{--</div>--}}


                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('descanso.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
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

