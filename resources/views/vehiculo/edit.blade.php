@extends('adminlte::page')

@section('title', 'Editar Vehículo')

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
                                    <h3 class="card-title">Editar Vehículo</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('vehiculo.update', $vehiculo->id) }}"
                                >
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="vehiculo">Código de Vehiculo</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="vehiculo"
                                                id      ="vehiculo" readonly
                                                value   ="{{ old('vehiculo', $vehiculo->id) }}"

                                            >
                                        </div>


                                        {{-- FK1 Select--}}
                                        <div class="form-group">
                                            <label for="cliente">Cliente</label>
                                            <select
                                                class   ="form-control"
                                                name    ="cliente"
                                                id      ="cliente">
                                                @foreach($clientes as $key => $cliente)
                                                    <option value="{{ $cliente->cliente }}"
                                                            @if ($vehiculo->cliente == old('cliente', $cliente->cliente))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $cliente->razon_social }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- FK2 Select--}}
                                        <div class="form-group">
                                            <label for="modelo">Modelo</label>
                                            <select
                                                class   ="form-control"
                                                name    ="modelo"
                                                id      ="modelo">
                                                @foreach($modelos as $key => $modelo)
                                                    <option value="{{ $modelo->modelo }}"
                                                            @if ($vehiculo->modelo == old('modelo', $modelo->modelo))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $modelo->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="chapa">Chapa</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="12"
                                                type    ="text"
                                                name    ="chapa"
                                                id      ="chapa"
                                                value   ="{{ old('chapa', $vehiculo->chapa) }}"
                                            >
                                            @foreach ($errors->get('chapa') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="chasis">Chasis</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="12"
                                                type    ="text"
                                                name    ="chasis"
                                                id      ="chasis"
                                                value   ="{{ old('chasis', $vehiculo->chasis) }}"
                                            >
                                            @foreach ($errors->get('chasis') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK3 Select--}}
                                        <div class="form-group">
                                            <label for="color">Color</label>
                                            <select
                                                class   ="form-control"
                                                name    ="color"
                                                id      ="color">
                                                @foreach($colores as $key => $color)
                                                    <option value="{{ $color->color }}"
                                                            @if ($vehiculo->color == old('color', $color->color))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $color->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{--CONST Estado1--}}
                                        <div class="form-group col">
                                            <label for="combustion" >Combustion</label>
                                            <select
                                                class   ="form-control"
                                                name    ="combustion"
                                                id      ="combustion">
                                                @foreach($combustiones as $key => $combustion)
                                                    <option value="{{ $combustion }}"

                                                            @if ($vehiculo->combustion == old('combustion', $combustion) )
                                                            selected="selected"
                                                        @endif
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('combustion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Estado2--}}
                                        <div class="form-group col">
                                            <label for="tipo" >Tipo</label>
                                            <select
                                                class   ="form-control"
                                                name    ="tipo"
                                                id      ="tipo">
                                                @foreach($tipos as $key => $tipo)
                                                    <option value="{{ $tipo }}"
                                                            @if ($vehiculo->tipo == old('tipo', $tipo) )
                                                            selected="selected"
                                                        @endif
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('tipo') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="año">Año</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="12"
                                                type    ="text"
                                                name    ="año"
                                                id      ="año"
                                                value   ="{{ old('año', $vehiculo->año) }}"
                                            >
                                            @foreach ($errors->get('año') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('vehiculo.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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

