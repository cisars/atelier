@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Usuario </li>
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
                                    <h3 class="card-title">Crear Usuario</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('usuario.store') }}">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="usuario">Usuario</label>
                                            <input class    = "form-control"
                                                   maxlength="12"
                                                   type     = "text"
                                                   name     = "usuario"
                                                   id       = "usuario"
                                                   value    = "{{ old('usuario') }}"
                                                   placeholder="Introduzca usuario nuevo">
                                            @foreach ($errors->get('usuario') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="clave">Clave</label>
                                            <input class    = "form-control"
                                                   maxlength="20"
                                                   type     = "password"
                                                   name     = "clave"
                                                   id       = "clave"
                                                   value    = "{{ old('clave') }}"
                                                   placeholder="Clave">
                                            @foreach ($errors->get('clave') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="clave_verificacion">Clave Verificacion</label>
                                            <input class    = "form-control"
                                                   maxlength="20"
                                                   type     = "password"
                                                   required
                                                   placeholder="Confirmar clave">
                                        </div>

                                        {{--FK Cliente--}}
                                        <div class="form-group col">
                                            <label for="cliente" >Cliente</label>
                                            <select
                                                class   ="form-control "
                                                name    ="cliente"
                                                id      ="cliente">
                                                <option value="">Seleccione cliente</option>
                                                @foreach($clientes as $key => $cliente)
                                                    <option
                                                        value   ="{{ $cliente->cliente }}"
                                                        {{ old('cliente') == $cliente->cliente ? 'selected' : '' }}
                                                    >{{ $cliente->razon_social }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('cliente') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--FK Empleado--}}
                                        <div class="form-group col">
                                            <label for="empleado" >Empleado</label>
                                            <select
                                                class   ="form-control "
                                                name    ="empleado"
                                                id      ="empleado">
                                                <option value="">Seleccione empleado</option>
                                                @foreach($empleados as $key => $empleado)
                                                    <option
                                                        value   ="{{ $empleado->empleado }}"
                                                        {{ old('empleado') == $empleado->empleado ? 'selected' : '' }}
                                                    >{{ $empleado->apellidos }}, {{ $empleado->nombres }}</option>

                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('empleado') as $error)
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
                                            <label for="observacion">Observacion</label>
                                            <input class    = "form-control"
                                                   maxlength="200"
                                                   type     = "text"
                                                   name     = "observacion"
                                                   id       = "observacion"
                                                   value    = "{{ old('observacion') }}"
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
                                                <option value="{{ $perfiles['Perfil1'] }}" selected > Perfil1   </option>
                                                <option value="{{ $perfiles['Perfil2'] }}"> Perfil2               </option>
                                            </select>
                                            @foreach ($errors->get('perfil') as $error)
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
                                                @if( Auth::user()->tipo == 1 )
                                                    <option value="{{ $tipos['Administrador'] }}" selected > Administrador      </option>
                                                    <option value="{{ $tipos['Bootstrap'] }}">      Bootstrap           </option>
                                                    <option value="{{ $tipos['Funcionario'] }}">    Funcionario         </option>
                                                    <option value="{{ $tipos['Cliente'] }}">        Cliente             </option>
                                                @else
                                                    <option value="{{ $tipos['Cliente'] }}" selected> Cliente           </option>
                                                @endif
                                            </select>
                                            @foreach ($errors->get('tipo') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
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
