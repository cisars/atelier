@extends('adminlte::page')

@section('title', 'Cargo')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    @isset($cargo)
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
                                    @isset($cargo)
                                        <h3 class="card-title">Editar Cargo</h3>
                                    @else
                                        <h3 class="card-title">Crear Cargo</h3>
                                    @endisset
                                </div>
                                <div class="card-body">
                                    @isset($cargo)
                                        {!! Form::model($cargo, ['route' => ['cargo.update', $cargo->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Codigo de Cargo') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['cargo.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset
{{--                                                                    {{ dd($errors->all() ) }}--}}
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    {{--                                    @method('PATCH')--}}
                                        <div class="form-group col">
                                            {!! Form::label('descripcion', 'Descripcion') !!}
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
                                        <a href="{{ route('cargo.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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

