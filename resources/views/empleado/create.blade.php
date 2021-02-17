@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Empleado </li>
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
                                    <h3 class="card-title">Crear Empleado</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('empleado.store') }}">
                                    @csrf
                                    <div class="card-body">

                                        {{-- form-row 2--}}
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="nombres" >Nombres   </label>
                                                <input class    = "form-control"
                                                       maxlength="40"
                                                       type     = "text"
                                                       name     = "nombres"
                                                       id       = "nombres"
                                                       value    = "{{ old('nombres') }}"
                                                       placeholder="Introduzca nombres">
                                                @foreach ($errors->get('nombres') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>

                                            <div class="form-group col">
                                                <label for="apellidos" >Apellidos</label>
                                                <input class    = "form-control"
                                                       maxlength="40"
                                                       type     = "text"
                                                       name     = "apellidos"
                                                       id       = "apellidos"
                                                       value    = "{{ old('apellidos') }}"
                                                       placeholder="Introduzca apellidos">
                                                @foreach ($errors->get('apellidos') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>

                                      </div>
                                        {{--  end form-row--}}

                                        {{-- form-row 3--}}
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="ci" >CI</label>
                                                <input class    = "form-control"
                                                       maxlength="12"
                                                       type     = "text"
                                                       name     = "ci"
                                                       id       = "ci"
                                                       value    = "{{ old('ci') }}"
                                                       placeholder="Introduzca ci">
                                                @foreach ($errors->get('ci') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                            {{--CONST Estado--}}
                                            <div class="form-group col">
                                                <label for="estado_civil" >Estado Civil</label>
                                                <select
                                                    class   ="form-control"
                                                    name    ="estado_civil"
                                                    id      ="estado_civil">
                                                    <option value="{{ $estadosciviles['Soltero'] }}" selected > Soltero   </option>
                                                    <option value="{{ $estadosciviles['Casado'] }}">       Casado          </option>
                                                    <option value="{{ $estadosciviles['Divorciado'] }}">   Divorciado      </option>
                                                    <option value="{{ $estadosciviles['Viudo'] }}">        Viudo           </option>
                                                </select>
                                                @foreach ($errors->get('estado_civil') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>

                                            {{--CONST Sexo--}}
                                            <div class="form-group col">
                                                <label for="sexo" >Sexo</label>
                                                <select
                                                    class   ="form-control"
                                                    name    ="sexo"
                                                    id      ="sexo">
                                                    <option value="{{ $sexos['Masculino'] }}" selected > Masculino   </option>
                                                    <option value="{{ $sexos['Femenino'] }}"> Femenino               </option>
                                                </select>
                                                @foreach ($errors->get('sexo') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{--  end form-row--}}

                                        <div class="form-group">
                                            <label for="direccion" >Dirección</label>
                                            <input class    = "form-control"
                                                   maxlength="80"
                                                   type     = "text"
                                                   name     = "direccion"
                                                   id       = "direccion"
                                                   value    = "{{ old('direccion') }}"
                                                   placeholder="Introduzca direccion">
                                            @foreach ($errors->get('direccion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- form-row 3--}}
                                        <div class="form-row ">
                                        {{--FK Localidad--}}
                                            <div class="form-group col">
                                                <label for="localidad" >Localidad</label>
                                                <select
                                                    class   ="form-control "
                                                    name    ="localidad"
                                                    id      ="localidad">
                                                    <option value="">Seleccione localidad</option>
                                                    @foreach($localidades as $key => $localidad)
                                                        <option
                                                            value   ="{{ $localidad->localidad }}"
                                                            {{ old('localidad') == $localidad->localidad ? 'selected' : '' }}
                                                        >{{ $localidad->descripcion }}</option>
                                                    @endforeach
                                                </select>
                                                @foreach ($errors->get('localidad') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>

                                            <div class="form-group col">
                                                <label for="movil" >Móvil</label>
                                                <input class    = "form-control"
                                                       maxlength="20"
                                                       type     = "text"
                                                       name     = "movil"
                                                       id       = "movil"
                                                       value    = "{{ old('movil') }}"
                                                       placeholder="Introduzca movil">
                                                @foreach ($errors->get('movil') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>

                                            <div class="form-group col">
                                                <label for="telefono">Teléfono   </label>
                                                    <input class    = "form-control"
                                                           maxlength="20"
                                                           type     = "text"
                                                           name     = "telefono"
                                                           id       = "telefono"
                                                           value    = "{{ old('telefono') }}"
                                                           placeholder="Introduzca telefono">
                                                    @foreach ($errors->get('telefono') as $error)
                                                        <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{--  end form-row--}}


                                        {{-- form-row 2--}}
                                        <div class="form-row ">
                                            {{--FK Cargo--}}
                                            <div class="form-group col">
                                                <label for="cargo" >Cargo</label>
                                                <select
                                                    class   ="form-control"
                                                    name    ="cargo"
                                                    id      ="cargo">
                                                    <option value="">Seleccione cargo</option>
                                                    @foreach($cargos as $key => $cargo)
                                                        <option
                                                            value   ="{{ $cargo->cargo }}"
                                                            {{ old('cargo') == $cargo->cargo ? 'selected' : '' }}
                                                        >{{ $cargo->descripcion }}</option>
                                                    @endforeach
                                                </select>
                                                @foreach ($errors->get('cargo') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>

                                            {{--FK Turno Empleado--}}
                                            <div class="form-group col">
                                                <label for="turno_id" >Turno Empleado</label>
                                                <select
                                                    class   ="form-control"
                                                    name    ="turno_id"
                                                    id      ="turno_id">
                                                    <option value="">Seleccione turno de empleado</option>
                                                    @foreach($turnos as $key => $turno_id)
                                                        <option
                                                            value   ="{{ $turno_id->turno_id }}"
                                                            {{ old('turno_id') == $turno_id->turno_id ? 'selected' : '' }}
                                                        >{{ $turno_id->descripcion }}</option>
                                                    @endforeach
                                                </select>
                                                @foreach ($errors->get('turno_id') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{--  end form-row--}}


                                        {{--FK Grupo Trabajo--}}
                                        <div class="form-group">
                                            <label for="grupo_id" >Grupo de Trabajo</label>
                                            <select
                                                class   ="form-control"
                                                name    ="grupo_id"
                                                id      ="grupo_id">
                                                <option value="">Seleccione grupo de trabajo</option>
                                                @foreach($grupos as $key => $grupo_id)
                                                    <option
                                                        value   ="{{ $grupo_id->grupo_id }}"
                                                        {{ old('grupo_id') == $grupo_id->grupo_id ? 'selected' : '' }}
                                                    >{{ $grupo_id->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('grupo_id') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- form-row 2--}}
                                        <div class="form-row ">
                                            <div class="form-group col">
                                                <label for="fecha_nacimiento">Fecha Nacimiento </label>
                                                    <input class    = "form-control"
                                                           type     = "date"
                                                           name     = "fecha_nacimiento"
                                                           id       = "fecha_nacimiento"
                                                           value    = "{{ old('fecha_nacimiento') }}"
                                                           placeholder="Introduzca fecha nacimiento">
                                                    @foreach ($errors->get('fecha_nacimiento') as $error)
                                                        <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>

                                            {{--DATE Fecha Ingreso --}}
                                            <div class="form-group col">
                                                <label for="fecha_ingreso" >Fecha Ingreso </label>
                                                    <input class    = "form-control"
                                                           type     = "date"
                                                           name     = "fecha_ingreso"
                                                           id       = "fecha_ingreso"
                                                           value    = "{{ old('fecha_ingreso') }}"
                                                           placeholder="Introduzca fecha_ingreso">
                                                    @foreach ($errors->get('fecha_ingreso') as $error)
                                                        <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{--  end form-row--}}

                                        {{-- form-row 2--}}
                                        <div class="form-row">
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
                                                <label for="salario" >Salario </label>
                                                <input class    = "form-control currency "
                                                       type     = "number"
                                                       name     = "salario"
                                                       id       = "salario"
                                                       value    = "{{ old('salario') }}"
                                                       placeholder="0"
                                                       min      ="0"
                                                >
                                                @foreach ($errors->get('salario') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{--  end form-row--}}
                                        <hr/>
                                        {{-- form-row 2--}}
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="fecha_egreso">Fecha Egreso </label>
                                                    <input class    = "form-control"
                                                           type     = "date"
                                                           name     = "fecha_egreso"
                                                           id       = "fecha_egreso"
                                                           value    = "{{ old('fecha_egreso') }}"
                                                           placeholder="Introduzca fecha egreso">
                                                    @foreach ($errors->get('fecha_egreso') as $error)
                                                        <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>

                                            <div class="form-group col">
                                                <label for="motivo_egreso">Motivo Egreso </label>
                                                    <input class    = "form-control"
                                                           maxlength="200"
                                                           type     = "text"
                                                           name     = "motivo_egreso"
                                                           id       = "motivo_egreso"
                                                           value    = "{{ old('motivo_egreso') }}"
                                                           placeholder="Introduzca motivo_egreso">
                                                    @foreach ($errors->get('motivo_egreso') as $error)
                                                        <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{--  end form-row--}}

                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
                                        <a href="{{ route('empleado.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
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
