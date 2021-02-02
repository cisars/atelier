@extends('adminlte::page')

@section('title', 'Sucursal')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    @isset($sucursal)
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
                                    @isset($sucursal)
                                        <h3 class="card-title">Editar Sucursal</h3>
                                    @else
                                        <h3 class="card-title">Crear Sucursal</h3>
                                    @endisset

                                </div>

                                <div class="card-body">
                                @isset($sucursal)
                                    {!! Form::model($sucursal, ['route' => ['sucursal.update', $sucursal->id], 'method' => 'PATCH']) !!}
                                    <div class="form-group col">
                                        {!! Form::label('id', 'Codigo de Sucursal') !!}
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
                                            {!! Form::label('descripcion', 'Descripcion') !!}
                                            {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control','descripcion' => 'descripcion']) !!}
                                            @error('descripcion')
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="localidad_id" >Localidad</label>
                                            {!! Form::select('localidad_id', $localidades->pluck('descripcion', 'id') , 'localidad_id' , ['class' => 'form-control']) !!}
                                            @error("localidad_id")
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col">

                                            {!! Form::label('direccion', 'Direccion') !!}
                                            {!! Form::text('direccion', old('direccion'), ['class' => 'form-control','direccion' => 'direccion']) !!}
                                            @error('direccion')
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col">

                                            {!! Form::label('telefono', 'Telefono') !!}
                                            {!! Form::text('telefono', old('telefono'), ['class' => 'form-control','telefono' => 'telefono']) !!}
                                            @error('telefono')
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col">

                                            {!! Form::label('email', 'Email') !!}
{{--                                            {!! Form::email('email', old('email'), 'Email',  ['class' => 'form-control','email' => 'email']) !!}--}}
                                            {!! Form::text('email', old('email'), ['class' => 'form-control','email' => 'email']) !!}
                                            @error('email')
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('sucursal.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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

