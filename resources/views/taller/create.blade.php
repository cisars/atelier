@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Taller </li>
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
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('taller.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   name     = "descripcion"
                                                   id       = "descripcion"
                                                   value    = "{{ old('descripcion') }}"
                                                   placeholder="Introduzca descripcion para taller  ">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Direccion</label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   name     = "direccion"
                                                   id       = "direccion"
                                                   value    = "{{ old('direccion') }}"
                                                   placeholder="Introduzca direccion ">
                                            @foreach ($errors->get('direccion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Telefono</label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   name     = "telefono"
                                                   id       = "telefono"
                                                   value    = "{{ old('telefono') }}"
                                                   placeholder="Introduzca telefono para  taller  ">
                                            @foreach ($errors->get('telefono') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="localidad">Localidad</label>
                                            <select
                                                class   ="form-control"
                                                name    ="localidad"
                                                id      ="localidad">
                                                <option value="">Seleccione localidad</option>
                                                @foreach($localidades as $key => $localidad)
                                                    <option
                                                        value   ="{{ $localidad->localidad }}"
                                                        {{ old('localidad') == $localidad->localidad ? 'selected' : '' }}
                                                    >{{ $localidad->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('localidad') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
                                        <a href="{{ route('taller.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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
