@extends('adminlte::page')

@section('title', 'Editar Modelo')

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
                                    <h3 class="card-title">Editar Modelo</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('modelo.update', $modelo->id) }}"
                                >
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="modelo">Codigo de Modelo</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="modelo"
                                                id      ="modelo" readonly
                                                value   ="{{ old('modelo', $modelo->id) }}"
                                            >
                                            @foreach ($errors->get('modelo') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="descripcion"
                                                id      ="descripcion"
                                                value   ="{{ old('descripcion', $modelo->descripcion) }}"
                                                placeholder="Introduzca nombre de la Modelo">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="marca">Marca</label>
                                            <select
                                                class   ="form-control"
                                                name    ="marca"
                                                id      ="marca">
                                                @foreach($marcas as $key => $marca)
                                                    <option value="{{ $marca->marca }}"
                                                            @if ($modelo->marca == old('marca', $marca->marca))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $marca->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('modelo.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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

