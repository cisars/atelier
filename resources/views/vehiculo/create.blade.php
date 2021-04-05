@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Vehiculo </li>
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
                                    <h3 class="card-title">Crear Vehiculo</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('vehiculo.store') }}">
                                    @csrf
                                    <div class="card-body">

                                        {{-- FK1 Select--}}
                                        <div class="form-group">
                                            <label for="cliente">Cliente</label>
                                            <select
                                                class   ="form-control"
                                                name    ="cliente_id"
                                                id      ="cliente_id">
                                                <option value="">Seleccione cliente</option>
                                                @foreach($clientes as $key => $cliente)
                                                    <option
                                                        value   ="{{ $cliente->id }}"
                                                        {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}
                                                    >{{ $cliente->razon_social }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('cliente_id') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK2 Select--}}
                                        <div class="form-group">
                                            <label for="modelo">Marca/Modelo</label>
                                            <select
                                                class   ="form-control"
                                                name    ="modelo_id"
                                                id      ="modelo_id">
                                                <option value="">Seleccione modelo</option>
                                                @foreach($modelos as $key => $modelo)
                                                    <option
                                                        value   ="{{ $modelo->id }}"
                                                        {{ old('modelo_id') == $modelo->id ? 'selected' : '' }}
                                                    >{{ $modelo->marca->descripcion }}, {{ $modelo->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('modelo_id') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="chapa">Chapa</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="12"
                                                type    ="text"
                                                name    ="chapa"
                                                id      ="chapa"
                                                value   ="{{ old('chapa') }}"
                                                placeholder="Chapa">
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
                                                value   ="{{ old('chasis') }}"
                                                placeholder="Chasis">
                                            @foreach ($errors->get('chasis') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK3 Select--}}
                                        <div class="form-group">
                                            <label for="color">Color</label>
                                            <select
                                                class   ="form-control"
                                                name    ="color_id"
                                                id      ="color_id">
                                                <option value="">Seleccione color</option>
                                                @foreach($colores as $key => $color)
                                                    <option
                                                        value   ="{{ $color->id }}"
                                                        {{ old('color_id') == $color->id ? 'selected' : '' }}
                                                    >{{ $color->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('color_id') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Estado1--}}
                                        <div class="form-group col">
                                            <label for="combustion" >Combustion</label>
                                            <select
                                                class   ="form-control"
                                                name    ="combustion"
                                                id      ="combustion">
                                                <option value="">Seleccione Combustion</option>
                                                @foreach($combustiones as $key => $combustion)
                                                    <option
                                                        value   ="{{ $combustion }}"
                                                        {{ old('combustion') == $combustion ? 'selected' : '' }}
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
                                                <option value="">Seleccione Tipo</option>
                                                @foreach($tipos as $key => $tipo)
                                                    <option
                                                        value   ="{{ $tipo }}"
                                                        {{ old('tipo') == $tipo ? 'selected' : '' }}
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
                                                value   ="{{ old('año') }}"
                                                placeholder="Año">
                                            @foreach ($errors->get('año') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
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
