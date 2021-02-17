@extends('adminlte::page')

@section('title', 'Editar Grupo de Trabajo')

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
                                    <h3 class="card-title">Editar Grupo de Trabajo</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('grupo.update', $grupo->grupo_id) }}"
                                >
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="descripcion"
                                                id      ="descripcion"
                                                value   ="{{ old('descripcion', $grupo->descripcion) }}"
                                                placeholder="Introduzca nombre del grupo de trabajo">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="grupo_id">Código de Grupo de Trabajo</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="grupo_id"
                                                id      ="grupo_id" readonly
                                                value   ="{{ old('grupo_id', $grupo->grupo_id) }}"
                                                 >
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('grupo.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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

