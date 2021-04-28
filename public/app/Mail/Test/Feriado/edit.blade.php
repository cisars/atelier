<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Feriados
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Feriado
// $nombres  = $gen->tabla['ZnombresZ'] feriados
// $nombre   = $gen->tabla['ZnombreZ'] feriado
// 
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Feriados')
@section('css')
@stop

@section('menu-header')
<li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
<li class="breadcrumb-item active"> Editar Feriados </li>
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
                                    @isset($feriado->id)
                                        <h3 class="card-title">Editar Feriado</h3>
                                    @else
                                        <h3 class="card-title">Crear Feriados</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($feriado->id)
                                        {!! Form::model($feriado, ['route' => ['feriado.update', $feriado->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de Feriado') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['feriado.store' ],
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
                                                            @if (isset($feriado->estado) == old('estado', $estado) )
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
                                            {{--INPUT NUMERIC Día --}}
                                            {!! Form::label('dia', 'Día') !!}
                                            {!! Form::text(
                                                'dia',
                                                old('dia') ,
                                                [
                                                    'maxlength'     => '',
                                                    'type'          => 'numeric',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Día'
                                            ]) !!}
                                            @error("dia")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                        {{--INPUT NUMERIC Día ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--INPUT NUMERIC Mes --}}
                                            {!! Form::label('mes', 'Mes') !!}
                                            {!! Form::text(
                                                'mes',
                                                old('mes') ,
                                                [
                                                    'maxlength'     => '',
                                                    'type'          => 'numeric',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Mes'
                                            ]) !!}
                                            @error("mes")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                        {{--INPUT NUMERIC Mes ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--INPUT TEXT Descripción --}}
                                            {!! Form::label('descripcion', 'Descripción') !!}
                                            {!! Form::text(
                                                'descripcion',
                                                old('descripcion') ,
                                                [
                                                    'maxlength'     => '40',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Descripción'
                                                ]) !!}
                                            @error("descripcion")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                        {{--INPUT TEXT Descripción ------------------------------------ --}}


                                        {{--</div>--}}


                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('feriado.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
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