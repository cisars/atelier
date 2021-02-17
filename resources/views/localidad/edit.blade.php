@extends('adminlte::page')

@section('title', 'Localidad')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    @isset($localidad)
        <li class="breadcrumb-item active"> Editar </li>
    @else
        <li class="breadcrumb-item active"> Nuevo </li>
    @endisset

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
                                    @isset($localidad)
                                        <h3 class="card-title">Editar Localidad</h3>
                                    @else
                                        <h3 class="card-title">Crear Localidad</h3>
                                    @endisset
                                </div>
                                <div class="card-body">
                                    @isset($localidad)
                                        {!! Form::model($localidad, ['route' => ['localidad.update', $localidad->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de Localidad') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['sucursal.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset
                                    {{--                                {{ dd($errors->all() ) }}--}}
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    {{--                                    @method('PATCH')--}}
                                        <div class="form-group col">
                                            {!! Form::label('descripcion', 'Descripción') !!}
                                            {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control', 'id' => 'descripcion']) !!}
                                            @error('descripcion')
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('localidad.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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

@endsection

