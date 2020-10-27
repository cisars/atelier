@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Sucursal </li>
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
                                    <h3 class="card-title">Crear Sucursal</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('sucursal.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   name     = "descripcion"
                                                   id       = "descripcion"
                                                   value    = "{{ old('descripcion') }}"
                                                   placeholder="Introduzca descripcion para la sucursal nueva">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Direccion</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="40"
                                                type    ="text"
                                                name    ="direccion"
                                                id      ="direccion"
                                                value   ="{{ old('direccion') }}"
                                                placeholder="Direccion de la Sucursal">
                                            @foreach ($errors->get('direccion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach

                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Telefono</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="12"
                                                type    ="text"
                                                name    ="telefono"
                                                id      ="telefono"
                                                value   ="{{ old('telefono')  }}"
                                                placeholder="Telefono habilitado">
                                            @foreach ($errors->get('telefono') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach

                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="80"
                                                type    ="text"
                                                name    ="email"
                                                id      ="email"
                                                value   ="{{ old('email') }}"
                                                placeholder="Correo valido">
                                            @foreach ($errors->get('email') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
                                        <a href="{{ route('sucursal.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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
