@extends('adminlte::page')

@section('title', 'Editar Sector')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar</li>
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
                                    <h3 class="card-title">Editar Sector</h3>
                                </div>
                                {!! Form::model($sector, ['route' => ['sector.update', $sector->id], 'method' => 'PATCH']) !!}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="sector">Código de Sector</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="sector"
                                            id="sector" readonly
                                            value="{{ old('sector', $sector->id) }}"
                                        >
                                        @foreach ($errors->get('sector') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="descripcion"
                                            id="descripcion"
                                            value="{{ old('descripcion', $sector->descripcion) }}"
                                            placeholder="Introduzca nombre de la Sector">
                                        @foreach ($errors->get('descripcion') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label for="sucursal">Talleres</label>
                                        {!! Form::select('taller_id', $talleres , null , ['class' => 'form-control','placeholder' => 'Selecciona el taller']) !!}
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <button
                                        type="submit"
                                        class="btn btn-info">Grabar
                                    </button>
                                    <a href="{{ route('sector.index') }}"
                                       class="btn btn-secondary btn-close">Cancelar</a>
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

