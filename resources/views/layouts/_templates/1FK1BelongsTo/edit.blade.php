@extends('adminlte::page')

@section('title', 'Editar ZZNOMBREZZ')

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
                                    <h3 class="card-title">Editar ZZNOMBREZZ</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('ZZnombreZZ.update', $ZZnombreZZ->ZZnombreZZ) }}"
                                >
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="ZZnombreZZ">Código de ZZNOMBREZZ</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="ZZnombreZZ"
                                                id      ="ZZnombreZZ" readonly
                                                value   ="{{ old('ZZnombreZZ', $ZZnombreZZ->ZZnombreZZ) }}"
                                            >
                                            @foreach ($errors->get('ZZnombreZZ') as $error)
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
                                                value   ="{{ old('descripcion', $ZZnombreZZ->descripcion) }}"
                                                placeholder="Introduzca nombre de la ZZNOMBREZZ">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="ZZfkZZ">ZZFKZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfkZZ"
                                                id      ="ZZfkZZ">
                                                @foreach($ZZfksZZ as $key => $ZZfkZZ)
                                                    <option value="{{ $ZZfkZZ->ZZfkZZ }}"
                                                            @if ($ZZnombreZZ->ZZfkZZ == old('ZZfkZZ', $ZZfkZZ->ZZfkZZ))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $ZZfkZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="40"
                                                type    ="text"
                                                name    ="direccion"
                                                id      ="direccion"
                                                value   ="{{ old('direccion', $ZZnombreZZ->direccion) }}"
                                            >
                                            @foreach ($errors->get('direccion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('ZZnombreZZ.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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

