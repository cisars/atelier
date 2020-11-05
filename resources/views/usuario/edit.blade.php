@extends('adminlte::page')

@section('title', 'Editar Usuario')

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
                                    <h3 class="card-title">Editar Usuario</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('usuario.update', $usuario->usuario) }}"
                                >
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="usuario">Usuario</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="12"
                                                type    ="text"
                                                name    ="usuario"
                                                id      ="usuario" readonly
                                                value   ="{{ old('usuario', $usuario->usuario) }}"
                                                >
                                        </div>

                                        <div class="form-group">
                                            <label for="clave">Clave</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="12"
                                                type    ="password"
                                                name    ="clave"
                                                id      ="clave"
                                                value   ="{{ old('clave', $usuario->clave) }}"
                                                placeholder="Introduzca clave">
                                            @foreach ($errors->get('clave') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label >Clave verificacion</label>
                                            <input
                                                class   ="form-control"
                                                maxlength="12"
                                                type    ="password"

                                                placeholder="Repita la clave">

                                        </div>



                                        {{--FK Empleado--}}
                                        <div class="form-group">
                                            <label for="empleado" >Empleado</label>
                                            <select
                                                class   ="form-control"
                                                name    ="empleado"
                                                id      ="empleado">
                                                <option value="">Seleccione empleado</option>
                                                @foreach($empleados as $key => $empleado)
                                                    <option value="{{ $empleado->empleado }}"
                                                        {{ $empleado->empleado  == old('empleado', $empleado->empleado) ? 'selected' : ''  }} >
                                                        {{ $empleado->apellidos }},
                                                        {{ $empleado->nombres }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('empleado') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--FK Cliente--}}
                                        <div class="form-group">
                                            <label for="cliente" >Cliente</label>
                                            <select
                                                class   ="form-control"
                                                name    ="cliente"
                                                id      ="cliente">
                                                <option value="">Seleccione cliente</option>
                                                @foreach($clientes as $key => $cliente)
                                                    <option value="{{ $cliente->cliente }}"
                                                        {{ $cliente->cliente  == old('cliente', $cliente->cliente) ? 'selected' : ''  }} >
                                                        {{ $cliente->razon_social }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('cliente') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Estado--}}
                                        <div class="form-group col">
                                            <label for="estado" >Estado</label>
                                            <select
                                                class   ="form-control"
                                                name    ="estado"
                                                id      ="estado">
                                                <option value="{{ $estados['Activo'] }}" selected > Activo   </option>
                                                <option value="{{ $estados['Inactivo'] }}"> Inactivo               </option>
                                            </select>
                                            @foreach ($errors->get('estado') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group col">
                                            <label for="observacion">Observacion </label>
                                            <input class    = "form-control"
                                                   maxlength="200"
                                                   type     = "text"
                                                   name     = "observacion"
                                                   id       = "observacion"
                                                   value    = "{{ old('observacion', $usuario->observacion)  }}"
                                                   placeholder="Introduzca observacion">
                                            @foreach ($errors->get('observacion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Perfil--}}
                                        <div class="form-group col">
                                            <label for="perfil" >Perfil</label>
                                            <select
                                                class   ="form-control"
                                                name    ="perfil"
                                                id      ="perfil">

<option value = "{{ $perfiles['Perfil1']}}"       {{ $perfiles['Perfil1'] == old('perfil',      $usuario->perfil) ? 'selected' : '' }} > Perfil1 </option>
<option value = "{{ $perfiles['Perfil2']}}"       {{ $perfiles['Perfil2'] == old('perfil',      $usuario->perfil) ? 'selected' : '' }} > Perfil2 </option>

                                            </select>

                                            @foreach ($errors->get('estado_civil') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Tipo--}}
                                        <div class="form-group col">
                                            <label for="tipo" >Tipo</label>
                                            <select
                                                class   ="form-control"
                                                name    ="tipo"
                                                id      ="tipo">

                                                <option value = "{{ $tipos['Administrador']}}"  {{ $tipos['Administrador'] == old('perfil', $usuario->tipo) ? 'selected' : '' }} > Administrador </option>
                                                <option value = "{{ $tipos['Funcionario']}}"    {{ $tipos['Funcionario'] == old('perfil',   $usuario->tipo) ? 'selected' : '' }} > Funcionario </option>
                                                <option value = "{{ $tipos['Cliente']}}"        {{ $tipos['Cliente'] == old('perfil',       $usuario->tipo) ? 'selected' : '' }} > Cliente </option>
                                                <option value = "{{ $tipos['Bootstrap']}}"      {{ $tipos['Bootstrap'] == old('perfil',     $usuario->tipo) ? 'selected' : '' }} > Bootstrap </option>

                                            </select>

                                            @foreach ($errors->get('tipo') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('usuario.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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

