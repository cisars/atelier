@extends('adminlte::page')

@section('title', 'Editar Sector')

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
                                    <h3 class="card-title">Editar Sector</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('sector.update', $sector->sector) }}"
                                >
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="sector">Código de Sector</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="sector"
                                                id      ="sector" readonly
                                                value   ="{{ old('sector', $sector->sector) }}"
                                            >
                                            @foreach ($errors->get('sector') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="descripcion"
                                                id      ="descripcion"
                                                value   ="{{ old('descripcion', $sector->descripcion) }}"
                                                placeholder="Introduzca nombre de la Sector">
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
                                                @foreach($sucursales as $key => $sucursal)
                                                    <option value="{{ $sucursal->sucursal }}"
                                                            @if ($sector->sucursal == old('sucursal', $sucursal->sucursal))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $sucursal->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
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

