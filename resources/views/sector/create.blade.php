@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Sector</li>
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
                                    <h3 class="card-title">Crear Sector</h3>
                                </div>
                                <form
                                    role="form"
                                    id="form"
                                    method="POST"
                                    action="{{ route('sector.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <input class="form-control"
                                                   type="text"
                                                   name="descripcion"
                                                   id="descripcion"
                                                   value="{{ old('descripcion') }}"
                                                   placeholder="Introduzca descripcion para la sector nueva">
                                            @error('descripcion')
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="sucursal">Taller</label>
                                            {!! Form::select('taller', $talleres , null , ['class' => 'form-control', 'placeholder' => 'Seleccionar el taller']) !!}
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar
                                        </button>
                                        <a href="{{ route('sector.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
                                    </div>
                                </form>
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
