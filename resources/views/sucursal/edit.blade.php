@extends('adminlte::page')

@section('title', 'Editar Sucursal')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar </li>
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
                                    <h3 class="card-title">Editar Sucursal</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('sucursal.update', $sucursal->sucursal) }}"
                                >
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="descripcion"
                                                id      ="descripcion"
                                                value   ="{{ old('descripcion', $sucursal->descripcion) }}"
                                                placeholder="Introduzca nombre de la Sucursal">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="sucursal">Codigo de Sucursal</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="sucursal"
                                                id      ="sucursal" readonly
                                                value   ="{{ old('sucursal', $sucursal->sucursal) }}"
                                                 >
                                        </div>

                                        <div class="form-group">
                                            <label for="direccion">Direccion</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="40"
                                                type    ="text"
                                                name    ="direccion"
                                                id      ="direccion"
                                                value   ="{{ old('direccion', $sucursal->direccion) }}"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Telefono</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="12"
                                                type    ="text"
                                                name    ="telefono"
                                                id      ="telefono"
                                                value   ="{{ old('telefono', $sucursal->telefono) }}"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="80"
                                                type    ="text"
                                                name    ="email"
                                                id      ="email"
                                                value   ="{{ old('email', $sucursal->email) }}"
                                            >
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
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

