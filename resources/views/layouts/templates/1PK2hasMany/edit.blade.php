@extends('adminlte::page')

@section('title', 'Editar {{('NOMBRE')}}')

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
                                    <h3 class="card-title">Editar {{('NOMBRE')}}</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('{{('nombre')}}.update', ${{('nombre')}}->{{('nombre')}}) }}"
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
                                                value   ="{{ old('descripcion', ${{('nombre')}}->descripcion) }}"
                                                placeholder="Introduzca nombre de la {{('NOMBRE')}}">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="{{('nombre')}}">Codigo de {{('NOMBRE')}}</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="{{('nombre')}}"
                                                id      ="{{('nombre')}}" readonly
                                                value   ="{{ old('{{('nombre')}}', ${{('nombre')}}->{{('nombre')}}) }}"
                                                 >
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('{{('nombre')}}.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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

