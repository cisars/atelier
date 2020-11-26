@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Reserva </li>
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
                                    <h3 class="card-title">Crear Reserva</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('reserva.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   name     = "descripcion"
                                                   id       = "descripcion"
                                                   value    = "{{ old('descripcion') }}"
                                                   placeholder="Introduzca descripcion para la reserva nueva">
                                            @foreach ($errors->get('descripcion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK1 Select--}}
                                        <div class="form-group">
                                            <label for="taller">Taller</label>
                                            <select
                                                class   ="form-control"
                                                name    ="taller"
                                                id      ="taller">
                                                <option value="">Seleccione taller</option>
                                                @foreach($talleres as $key => $taller)
                                                    <option
                                                        value   ="{{ $taller->taller }}"
                                                        {{ old('taller') == $taller->taller ? 'selected' : '' }}
                                                    >{{ $taller->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('taller') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK2 Select--}}
                                        <div class="form-group">
                                            <label for="cliente">Cliente</label>
                                            <select
                                                class   ="form-control"
                                                name    ="cliente"
                                                id      ="cliente">
                                                <option value="">Seleccione cliente</option>
                                                @foreach($clientes as $key => $cliente)
                                                    <option
                                                        value   ="{{ $cliente->cliente }}"
                                                        {{ old('cliente') == $cliente->cliente ? 'selected' : '' }}
                                                    >{{ $cliente->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('cliente') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK3 Select--}}
                                        <div class="form-group">
                                            <label for="vehiculo">Vehiculo</label>
                                            <select
                                                class   ="form-control"
                                                name    ="vehiculo"
                                                id      ="vehiculo">
                                                <option value="">Seleccione vehiculo</option>
                                                @foreach($vehiculos as $key => $vehiculo)
                                                    <option
                                                        value   ="{{ $vehiculo->vehiculo }}"
                                                        {{ old('vehiculo') == $vehiculo->vehiculo ? 'selected' : '' }}
                                                    >{{ $vehiculo->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('vehiculo') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK4 Select--}}
                                        <div class="form-group">
                                            <label for="empleado">Empleado</label>
                                            <select
                                                class   ="form-control"
                                                name    ="empleado"
                                                id      ="empleado">
                                                <option value="">Seleccione empleado</option>
                                                @foreach($empleados as $key => $empleado)
                                                    <option
                                                        value   ="{{ $empleado->empleado }}"
                                                        {{ old('empleado') == $empleado->empleado ? 'selected' : '' }}
                                                    >{{ $empleado->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('empleado') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- FK5 Select--}}
                                        <div class="form-group">
                                            <label for="cliente">Usuario</label>
                                            <select
                                                class   ="form-control"
                                                name    ="usuario"
                                                id      ="usuario">
                                                <option value="">Seleccione usuario</option>
                                                @foreach($usuarios as $key => $usuario)
                                                    <option
                                                        value   ="{{ $usuario->usuario }}"
                                                        {{ old('usuario') == $usuario->usuario ? 'selected' : '' }}
                                                    >{{ $usuario->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('usuario') as $error)
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
                                            <label for="estado" >Estado</label>
                                            <select
                                                class   ="form-control"
                                                name    ="estado"
                                                id      ="estado">
                                                <option value="">Seleccione Estado</option>
                                                @foreach($estados as $key => $estado)
                                                    <option
                                                        value   ="{{ $estado }}"
                                                        {{ old('estado') == $estado ? 'selected' : '' }}
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('estado') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Estado2--}}
                                        <div class="form-group col">
                                            <label for="forma_reserva" >Forma Reserva</label>
                                            <select
                                                class   ="form-control"
                                                name    ="forma_reserva"
                                                id      ="forma_reserva">
                                                <option value="">Seleccione Forma Reserva</option>
                                                @foreach($formas_reservas as $key => $forma_reserva)
                                                    <option
                                                        value   ="{{ $forma_reserva }}"
                                                        {{ old('forma_reserva') == $forma_reserva ? 'selected' : '' }}
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('forma_reserva') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{--CONST Estado3--}}
                                        <div class="form-group col">
                                            <label for="prioridad" >Prioridad</label>
                                            <select
                                                class   ="form-control"
                                                name    ="prioridad"
                                                id      ="prioridad">
                                                <option value="">Seleccione Prioridad</option>
                                                @foreach($prioridades as $key => $prioridad)
                                                    <option
                                                        value   ="{{ $prioridad }}"
                                                        {{ old('prioridad') == $prioridad ? 'selected' : '' }}
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('prioridad') as $error)
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
                                                value   ="{{ old('direccion') }}"
                                                placeholder="Direccion de la Reserva">
                                            @foreach ($errors->get('direccion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
                                        <a href="{{ route('reserva.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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
