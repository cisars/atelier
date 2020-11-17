@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Maquinaria </li>
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
                                    <h3 class="card-title">Crear Maquinaria</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('maquinaria.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   name     = "descripcion"
                                                   id       = "descripcion"
                                                   value    = "{{ old('descripcion') }}"
                                                   placeholder="Introduzca descripcion para la maquinaria nueva">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="maquinaria_tipo">Maquinarias Tipos</label>
                                            <select
                                                class   ="form-control"
                                                name    ="maquinaria_tipo"
                                                id      ="maquinaria_tipo">
                                                <option value="">Seleccione Tipo de Maquinaria</option>
                                                @foreach($maquinarias_tipos as $key => $maquinaria_tipo)
                                                    <option
                                                        value   ="{{ $maquinaria_tipo->maquinaria_tipo }}"
                                                        {{ old('maquinaria_tipo') == $maquinaria_tipo->maquinaria_tipo ? 'selected' : '' }}
                                                    >{{ $maquinaria_tipo->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('maquinaria_tipo') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Estado--}}
                                        <div class="form-group col">
                                            <label for="estado" >Estado</label>
                                            <select
                                                class   ="form-control"
                                                name    ="estado"
                                                id      ="estado">
                                                <option value="">Seleccione Estado</option>
                                                @foreach($estados as $key => $estado)
                                                    <option value="{{ $estado }}" >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('estado') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>



                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
                                        <a href="{{ route('maquinaria.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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
