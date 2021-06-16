@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Taller</li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Crear Taller</h3>
                                </div>

                                {!! Form::open(['route' => 'taller.usuarios.asignar', 'method' => 'post']) !!}
                                <div class="card-body">
                                    <div class="form-group col">
                                        <label for="Usuario">Usuario</label>
                                        {!! Form::select('usuario', $usuarios , null , ['class' => 'form-control', 'placeholder' => 'Selecciona el usuario']) !!}
                                    </div>

                                    <div class="form-group col">
                                        <label for="taller">Taller</label>
                                        {!! Form::select('taller', $talleres , null , ['class' => 'form-control', 'placeholder' => 'Selecciona el taller']) !!}

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button
                                        type="submit"
                                        class="btn btn-info">Grabar
                                    </button>
                                    <a href=" " class="btn btn-secondary btn-close">Cancelar</a>
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
