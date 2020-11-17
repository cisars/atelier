@extends('adminlte::page')

@section('title', 'Editar Maquinaria')

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
                                    <h3 class="card-title">Editar Maquinaria</h3>
                                </div>
{{--                                @dd($maquinaria);--}}
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('maquinaria.update', $maquinaria->maquinaria) }}"
                                >

                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="maquinaria">Codigo de Maquinaria</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="maquinaria"
                                                id      ="maquinaria" readonly
                                                value   ="{{ old('maquinaria', $maquinaria->maquinaria) }}"
                                            >
                                            @foreach ($errors->get('maquinaria') as $error)
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
                                                value   ="{{ old('descripcion', $maquinaria->descripcion) }}"
                                                placeholder="Introduzca nombre de la Maquinaria">
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

                                                @foreach($maquinarias_tipos as $key => $maquinaria_tipo)

                                                    <option value="{{ $maquinaria_tipo->maquinaria_tipo }}"
                                                            @if ($maquinaria->maquinaria_tipo == old('maquinaria_tipo', $maquinaria_tipo->maquinaria_tipo))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $maquinaria_tipo->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{--CONST Estado--}}
                                        <div class="form-group col">
                                            <label for="estado" >Estado</label>
                                            <select
                                                class   ="form-control"
                                                name    ="estado"
                                                id      ="estado">

                                                @foreach($estados as $key => $estado)
                                                    <option value="{{ $estado }}"
                                                        @if ($maquinaria->estado == old('estado', $estado))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('estado') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
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

