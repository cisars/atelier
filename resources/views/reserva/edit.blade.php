@extends('adminlte::page')

@section('title', 'Editar Reserva')

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
                                    <h3 class="card-title">Editar Reserva</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('reserva.update', $reserva->reserva) }}"
                                >
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="reserva">Codigo de Reserva</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="reserva"
                                                id      ="reserva" readonly
                                                value   ="{{ old('reserva', $reserva->reserva) }}"
                                            >
                                            @foreach ($errors->get('reserva') as $error)
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
                                                @foreach($talleres as $key => $taller)
                                                    <option value="{{ $taller->taller }}"
                                                            @if ($reserva->taller == old('taller', $taller->taller))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $taller->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- FK2 Select--}}
                                        <div class="form-group">
                                            <label for="cliente">Cliente</label>
                                            <select
                                                class   ="form-control"
                                                name    ="cliente"
                                                id      ="cliente">
                                                @foreach($clientes as $key => $cliente)
                                                    <option value="{{ $cliente->cliente }}"
                                                            @if ($reserva->cliente == old('cliente', $cliente->cliente))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $cliente->razon_social }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- FK3 Select--}}
                                        <div class="form-group">
                                            <label for="vehiculo">Vehiculo</label>
                                            <select
                                                class   ="form-control"
                                                name    ="vehiculo"
                                                id      ="vehiculo">
                                                @foreach($vehiculos as $key => $vehiculo)
                                                    <option value="{{ $vehiculo->vehiculo }}"
                                                            @if ($reserva->vehiculo == old('vehiculo', $vehiculo->vehiculo))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $vehiculo->modelo }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- FK4 Select--}}
                                        <div class="form-group">
                                            <label for="empleado">Empleado</label>
                                            <select
                                                class   ="form-control"
                                                name    ="empleado"
                                                id      ="empleado">
                                                @foreach($empleados as $key => $empleado)
                                                    <option value="{{ $empleado->empleado }}"
                                                            @if ($reserva->empleado == old('empleado', $empleado->empleado))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $empleado->apellidos. ', '.$empleado->nombres }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- FK5 Select--}}
                                        <div class="form-group">
                                            <label for="usuario">Usuario</label>
                                            <select
                                                class   ="form-control"
                                                name    ="usuario"
                                                id      ="usuario">
                                                @foreach($usuarios as $key => $usuario)
                                                    <option value="{{ $usuario->usuario }}"
                                                            @if ($reserva->usuario == old('usuario', $usuario->usuario))
                                                            selected="selected"
                                                        @endif
                                                    >{{ $usuario->usuario }}</option>
                                                @endforeach
                                            </select>
                                        </div>



                                        {{--CONST Estado1--}}
                                        <div class="form-group col">
                                            <label for="estado" >Estado</label>
                                            <select
                                                class   ="form-control"
                                                name    ="estado"
                                                id      ="estado">
                                                @foreach($estados as $key => $estado)
                                                    <option value="{{ $estado }}"
                                                            @if ($reserva->estado ==  $estado )
                                                            selected="selected"
                                                        @endif
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
                                                @foreach($formas_reservas as $key => $forma_reserva)
                                                    <option value="{{ $forma_reserva }}"
                                                            @if ($reserva->forma_reserva ==  $forma_reserva )
                                                            selected="selected"
                                                        @endif
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
                                                @foreach($prioridades as $key => $prioridad)
                                                    <option value="{{ $prioridad }}"
                                                            @if ($reserva->prioridad ==  $prioridad )
                                                            selected="selected"
                                                        @endif
                                                    >{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('prioridad') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

{{--                                        <div class="form-group">--}}
{{--                                            <label for="direccion">Direccion</label>--}}
{{--                                            <input--}}
{{--                                                class   ="form-control"--}}
{{--                                                maxlength="40"--}}
{{--                                                type    ="text"--}}
{{--                                                name    ="direccion"--}}
{{--                                                id      ="direccion"--}}
{{--                                                value   ="{{ old('direccion', $reserva->direccion) }}"--}}
{{--                                            >--}}
{{--                                            @foreach ($errors->get('direccion') as $error)--}}
{{--                                                <span class="text text-danger">{{ $error }}</span>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}

                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
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

