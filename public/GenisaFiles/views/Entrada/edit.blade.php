<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Entradas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Entrada
// $nombres  = $gen->tabla['ZnombresZ'] entradas
// $nombre   = $gen->tabla['ZnombreZ'] entrada
// 
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Entradas')
@section('css')
@stop

@section('menu-header')
<li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
<li class="breadcrumb-item active"> Editar Entradas </li>
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
                                    @isset($entrada->id)
                                        <h3 class="card-title">Editar Entrada</h3>
                                    @else
                                        <h3 class="card-title">Crear Entradas</h3>
                                    @endisset
                                </div>


                                <div class="card-body">
                                    @isset($entrada->id)
                                        {!! Form::model($entrada, ['route' => ['entrada.update', $entrada->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de Entrada') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['entrada.store' ],
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
                                            {{--INPUT TEXT Nro Documento --}}
                                            {!! Form::label('numero_documento', 'Nro Documento') !!}
                                            {!! Form::text(
                                                'numero_documento',
                                                old('numero_documento') ,
                                                [
                                                    'maxlength'     => '12',
                                                    'type'          => 'text',
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Nro Documento'
                                                ]) !!}
                                            @error("numero_documento")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                        {{--INPUT TEXT Nro Documento ------------------------------------ --}}

                                        <div class="form-group col">
                                            {{--DATE TIMESTAMP Fecha --}}

                                            <label for="fecha">Fecha </label>
                                            <input class    = "form-control"
                                                   type     = "date"
                                                   name     = "fecha"
                                                   id       = "fecha"
                                                   value    = '{{ old('fecha',    date('Y-m-d', strtotime($entrada->fecha ?? date('Y-m-d') ))  )   }}'
                                                   placeholder="Introduzca Fecha">
                                            @foreach ($errors->get('fecha') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div> 
                                        {{--DATE TIMESTAMP Fecha------------------------------------ --}}

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
                                        <a href="{{ route('entrada.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
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