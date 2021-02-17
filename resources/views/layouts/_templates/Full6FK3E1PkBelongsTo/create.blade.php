@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM ZZNOMBREZZ </li>
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
                                    <h3 class="card-title">Crear ZZNOMBREZZ</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('ZZnombreZZ.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   name     = "descripcion"
                                                   id       = "descripcion"
                                                   value    = "{{ old('descripcion') }}"
                                                   placeholder="Introduzca descripcion para la ZZnombreZZ nueva">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK1 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk1ZZ">ZZFK1ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk1ZZ"
                                                id      ="ZZfk1ZZ">
                                                <option value="">Seleccione ZZfk1ZZ</option>
                                                @foreach($ZZfks1ZZ as $key => $ZZfk1ZZ)
                                                    <option
                                                        value   ="{{ $ZZfk1ZZ->ZZfk1ZZ }}"
                                                        {{ old('ZZfk1ZZ') == $ZZfk1ZZ->ZZfk1ZZ ? 'selected' : '' }}
                                                    >{{ $ZZfk1ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('ZZfk1ZZ') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK2 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk2ZZ">ZZFK2ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk2ZZ"
                                                id      ="ZZfk2ZZ">
                                                <option value="">Seleccione ZZfk2ZZ</option>
                                                @foreach($ZZfks2ZZ as $key => $ZZfk2ZZ)
                                                    <option
                                                        value   ="{{ $ZZfk2ZZ->ZZfk2ZZ }}"
                                                        {{ old('ZZfk2ZZ') == $ZZfk2ZZ->ZZfk2ZZ ? 'selected' : '' }}
                                                    >{{ $ZZfk2ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('ZZfk2ZZ') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK3 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk3ZZ">ZZFK3ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk3ZZ"
                                                id      ="ZZfk3ZZ">
                                                <option value="">Seleccione ZZfk3ZZ</option>
                                                @foreach($ZZfks3ZZ as $key => $ZZfk3ZZ)
                                                    <option
                                                        value   ="{{ $ZZfk3ZZ->ZZfk3ZZ }}"
                                                        {{ old('ZZfk3ZZ') == $ZZfk3ZZ->ZZfk3ZZ ? 'selected' : '' }}
                                                    >{{ $ZZfk3ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('ZZfk3ZZ') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK4 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk4ZZ">ZZFK4ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk4ZZ"
                                                id      ="ZZfk4ZZ">
                                                <option value="">Seleccione ZZfk4ZZ</option>
                                                @foreach($ZZfks4ZZ as $key => $ZZfk4ZZ)
                                                    <option
                                                        value   ="{{ $ZZfk4ZZ->ZZfk4ZZ }}"
                                                        {{ old('ZZfk4ZZ') == $ZZfk4ZZ->ZZfk4ZZ ? 'selected' : '' }}
                                                    >{{ $ZZfk4ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('ZZfk4ZZ') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK5 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk2ZZ">ZZFK5ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk5ZZ"
                                                id      ="ZZfk5ZZ">
                                                <option value="">Seleccione ZZfk5ZZ</option>
                                                @foreach($ZZfks5ZZ as $key => $ZZfk5ZZ)
                                                    <option
                                                        value   ="{{ $ZZfk5ZZ->ZZfk5ZZ }}"
                                                        {{ old('ZZfk5ZZ') == $ZZfk5ZZ->ZZfk5ZZ ? 'selected' : '' }}
                                                    >{{ $ZZfk5ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('ZZfk5ZZ') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK6 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk6ZZ">ZZFK6ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk6ZZ"
                                                id      ="ZZfk6ZZ">
                                                <option value="">Seleccione ZZfk6ZZ</option>
                                                @foreach($ZZfks6ZZ as $key => $ZZfk6ZZ)
                                                    <option
                                                        value   ="{{ $ZZfk6ZZ->ZZfk6ZZ }}"
                                                        {{ old('ZZfk6ZZ') == $ZZfk6ZZ->ZZfk6ZZ ? 'selected' : '' }}
                                                    >{{ $ZZfk6ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('ZZfk6ZZ') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Estado1--}}
                                        <div class="form-group col">
                                            <label for="ZZestado1ZZ" >ZZESTADO1ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZestado1ZZ"
                                                id      ="ZZestado1ZZ">
                                                <option value="">Seleccione ZZESTADO1ZZ</option>
                                                @foreach($ZZestados1ZZ as $key => $ZZestado1ZZ)
                                                    <option
                                                        value   ="{{ $ZZestado1ZZ }}"
                                                        {{ old('ZZestado1ZZ') == $ZZestado1ZZ ? 'selected' : '' }}
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('ZZestado1ZZ') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Estado2--}}
                                        <div class="form-group col">
                                            <label for="ZZestado2ZZ" >ZZESTADO2ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZestado2ZZ"
                                                id      ="ZZestado2ZZ">
                                                <option value="">Seleccione ZZESTADO2ZZ</option>
                                                @foreach($ZZestados2ZZ as $key => $ZZestado2ZZ)
                                                    <option
                                                        value   ="{{ $ZZestado2ZZ }}"
                                                        {{ old('ZZestado2ZZ') == $ZZestado2ZZ ? 'selected' : '' }}
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('ZZestado2ZZ') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Estado3--}}
                                        <div class="form-group col">
                                            <label for="ZZestado3ZZ" >ZZESTADO3ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZestado3ZZ"
                                                id      ="ZZestado3ZZ">
                                                <option value="">Seleccione ZZESTADO3ZZ</option>
                                                @foreach($ZZestados3ZZ as $key => $ZZestado3ZZ)
                                                    <option
                                                        value   ="{{ $ZZestado3ZZ }}"
                                                        {{ old('ZZestado3ZZ') == $ZZestado3ZZ ? 'selected' : '' }}
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('ZZestado3ZZ') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>


                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="40"
                                                type    ="text"
                                                name    ="direccion"
                                                id      ="direccion"
                                                value   ="{{ old('direccion') }}"
                                                placeholder="Dirección de la ZZNOMBREZZ">
                                            @foreach ($errors->get('direccion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
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
