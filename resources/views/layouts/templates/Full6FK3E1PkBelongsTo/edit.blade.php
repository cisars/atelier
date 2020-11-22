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
                                            <label for="ZZnombreZZ">Codigo de ZZNOMBREZZ</label>
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
                                            <label for="descripcion">Descripcion</label>
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

                                        {{-- FK1 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk1ZZ">ZZFK1ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk1ZZ"
                                                id      ="ZZfk1ZZ">
                                                @foreach($ZZfks1ZZ as $key => $ZZfk1ZZ)
                                                    <option value="{{ $ZZfk1ZZ->ZZfk1ZZ }}"
                                                            @if ($ZZnombreZZ->ZZfk1ZZ == old('ZZfk1ZZ', $ZZfk1ZZ->ZZfk1ZZ))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $ZZfk1ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- FK2 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk2ZZ">ZZFK2ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk2ZZ"
                                                id      ="ZZfk2ZZ">
                                                @foreach($ZZfks2ZZ as $key => $ZZfk2ZZ)
                                                    <option value="{{ $ZZfk2ZZ->ZZfk2ZZ }}"
                                                            @if ($ZZnombreZZ->ZZfk2ZZ == old('ZZfk2ZZ', $ZZfk2ZZ->ZZfk2ZZ))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $ZZfk2ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- FK3 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk3ZZ">ZZFK3ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk3ZZ"
                                                id      ="ZZfk3ZZ">
                                                @foreach($ZZfks3ZZ as $key => $ZZfk3ZZ)
                                                    <option value="{{ $ZZfk3ZZ->ZZfk3ZZ }}"
                                                            @if ($ZZnombreZZ->ZZfk3ZZ == old('ZZfk3ZZ', $ZZfk3ZZ->ZZfk3ZZ))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $ZZfk3ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- FK4 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk4ZZ">ZZFK4ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk4ZZ"
                                                id      ="ZZfk4ZZ">
                                                @foreach($ZZfks4ZZ as $key => $ZZfk4ZZ)
                                                    <option value="{{ $ZZfk4ZZ->ZZfk4ZZ }}"
                                                            @if ($ZZnombreZZ->ZZfk4ZZ == old('ZZfk4ZZ', $ZZfk4ZZ->ZZfk4ZZ))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $ZZfk4ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- FK5 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk5ZZ">ZZFK5ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk5ZZ"
                                                id      ="ZZfk5ZZ">
                                                @foreach($ZZfks5ZZ as $key => $ZZfk5ZZ)
                                                    <option value="{{ $ZZfk5ZZ->ZZfk5ZZ }}"
                                                            @if ($ZZnombreZZ->ZZfk5ZZ == old('ZZfk5ZZ', $ZZfk5ZZ->ZZfk5ZZ))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $ZZfk5ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- FK6 Select--}}
                                        <div class="form-group">
                                            <label for="ZZfk6ZZ">ZZFK6ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZfk6ZZ"
                                                id      ="ZZfk6ZZ">
                                                @foreach($ZZfks6ZZ as $key => $ZZfk6ZZ)
                                                    <option value="{{ $ZZfk6ZZ->ZZfk6ZZ }}"
                                                            @if ($ZZnombreZZ->ZZfk6ZZ == old('ZZfk6ZZ', $ZZfk6ZZ->ZZfk6ZZ))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $ZZfk6ZZ->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{--CONST Estado1--}}
                                        <div class="form-group col">
                                            <label for="ZZestado1ZZ" >ZZESTADO1ZZ</label>
                                            <select
                                                class   ="form-control"
                                                name    ="ZZestado1ZZ"
                                                id      ="ZZestado1ZZ">
                                                @foreach($ZZestados1ZZ as $key => $ZZestado1ZZ)
                                                    <option value="{{ $ZZestado1ZZ }}"
                                                            @if ($ZZnombreZZ->ZZestado1ZZ ==  $ZZestado1ZZ )
                                                            selected="selected"
                                                        @endif
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
                                                @foreach($ZZestados2ZZ as $key => $ZZestado2ZZ)
                                                    <option value="{{ $ZZestado2ZZ }}"
                                                            @if ($ZZnombreZZ->ZZestado2ZZ ==  $ZZestado2ZZ )
                                                            selected="selected"
                                                        @endif
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
                                                @foreach($ZZestados3ZZ as $key => $ZZestado3ZZ)
                                                    <option value="{{ $ZZestado3ZZ }}"
                                                            @if ($ZZnombreZZ->ZZestado3ZZ ==  $ZZestado3ZZ )
                                                            selected="selected"
                                                        @endif
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('ZZestado3ZZ') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="direccion">Direccion</label>
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

