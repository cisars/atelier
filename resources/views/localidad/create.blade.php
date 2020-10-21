@extends('adminlte::page')

@section('title', 'Atelier')

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('Editar Localidad') }}</h1>
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
                                    <h3 class="card-title">Crear Cargo</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('localidad.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input class    ="form-control"
                                                   type     ="text"
                                                   name     ="descripcion"
                                                   id       ="descripcion"
                                                   value    ="{{ old('descripcion') }}"
                                                   placeholder="Introduzca descripcion para la localidad nueva">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('localidad.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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
@yield('js')
