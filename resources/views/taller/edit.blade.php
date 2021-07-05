@extends('adminlte::page')

@section('title', 'Editar Taller')

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
                                    <h3 class="card-title">Editar Taller</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('taller.update', $taller->id) }}"
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
                                                value   ="{{ old('descripcion', $taller->descripcion) }}"
                                                placeholder="Introduzca nombre de la Taller">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="taller">Código de Taller</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="id"
                                                id      ="id" readonly
                                                value   ="{{ old('taller', $taller->id) }}"
                                                 >
                                        </div>

                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="direccion"
                                                id      ="direccion"
                                                value   ="{{ old('direccion', $taller->direccion) }}"
                                                placeholder="Introduzca direccion">
                                            @foreach ($errors->get('direccion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="telefono"
                                                id      ="telefono"
                                                value   ="{{ old('telefono', $taller->telefono) }}"
                                                placeholder="Introduzca telefono">
                                            @foreach ($errors->get('telefono') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group col">
                                            <label for="sucursal_id" >Sucursal</label>
                                            {!! Form::select('sucursal_id', $sucursales->pluck('descripcion', 'id') , 'sucursal_id' , ['class' => 'form-control']) !!}
                                            @error("sucursal_id")
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
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

