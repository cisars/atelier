@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Sector </li>
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
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('sector.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   name     = "descripcion"
                                                   id       = "descripcion"
                                                   value    = "{{ old('descripcion') }}"
                                                   placeholder="Introduzca descripcion para la sector nueva">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="sucursal">Sucursal</label>
                                            <select
                                                class   ="form-control"
                                                name    ="sucursal"
                                                id      ="sucursal">
                                                <option value="">Seleccione sucursal</option>
                                                @foreach($sucursales as $key => $sucursal)
                                                    <option
                                                        value   ="{{ $sucursal->sucursal }}"
                                                        {{ old('sucursal') == $sucursal->sucursal ? 'selected' : '' }}
                                                    >{{ $sucursal->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('sucursal') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>



                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
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
