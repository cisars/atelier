@extends('adminlte::page')

@section('title', 'Editar Empleado')

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
                                    <h3 class="card-title">Editar Empleado</h3>
                                </div>
                                <form
                                    role    ="form"
                                    id      ="form"
                                    method  ="POST"
                                    action  ="{{ route('empleado.update', $empleado->empleado) }}"
                                >
                                    {{--  return back()->route('welcome');--}}
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="empleado">Código de Empleado</label>
                                            <input
                                                class   ="form-control"
                                                type    ="text"
                                                name    ="empleado"
                                                id      ="empleado" readonly
                                                value   ="{{ old('empleado', $empleado->empleado) }}"
                                            >
                                            @foreach ($errors->get('empleado') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>

                                        {{-- form-row 2--}}
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="nombres" >Nombres   </label>
                                                <input class    = "form-control"
                                                       maxlength="40"
                                                       type     = "text"
                                                       name     = "nombres"
                                                       id       = "nombres"
                                                       value    = "{{ old('nombres', $empleado->nombres) }}"
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
                                                       value    = "{{ old('apellidos', $empleado->apellidos) }}"
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
                                                       value    = "{{ old('ci', $empleado->ci) }}"
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

                                                    <option value = "{{ $estadosciviles['Soltero']}}"       {{ $estadosciviles['Soltero'] == old('estado_civil',     $empleado->estado_civil) ? 'selected' : '' }} > Soltero </option>
                                                    <option value = "{{ $estadosciviles['Casado']}}"        {{ $estadosciviles['Casado'] == old('estado_civil',      $empleado->estado_civil) ? 'selected' : '' }} > Casado </option>
                                                    <option value = "{{ $estadosciviles['Divorciado']}}"    {{ $estadosciviles['Divorciado'] == old('estado_civil',  $empleado->estado_civil) ? 'selected' : '' }} > Divorciado </option>
                                                    <option value = "{{ $estadosciviles['Viudo']}}"         {{ $estadosciviles['Viudo'] == old('estado_civil',       $empleado->estado_civil) ? 'selected' : '' }} > Viudo </option>

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
                                                    <option value="{{ $sexos['Masculino']}}"    {{ $sexos['Masculino'] == old('sexo', $empleado->sexo) ? 'selected' : ''  }} > Masculino </option>
                                                    <option value="{{ $sexos['Femenino']}}"     {{ $sexos['Femenino'] == old('sexo', $empleado->sexo) ? 'selected' : ''   }} > Femenino </option>
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
                                                   value    = "{{ old('direccion', $empleado->direccion) }}"
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
                                                        <option value="{{ $localidad->localidad }}"
                                                            {{ $localidad->localidad  == old('localidad', $empleado->localidad) ? 'selected' : ''  }} >
                                                            {{ $localidad->descripcion }}
                                                        </option>
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
                                                       value    = "{{ old('movil', $empleado->movil) }}"
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
                                                       value    = "{{ old('telefono', $empleado->telefono)  }}"
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
                                                        <option value="{{ $cargo->cargo }}"
                                                            {{ $cargo->cargo  == old('cargo', $empleado->cargo) ? 'selected' : ''  }} >
                                                            {{ $cargo->descripcion }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @foreach ($errors->get('cargo') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>

                                            {{--FK Turno Empleado--}}
                                            <div class="form-group col">
                                                <label for="turno_empleado" >Turno Empleado</label>
                                                <select
                                                    class   ="form-control"
                                                    name    ="turno_empleado"
                                                    id      ="turno_empleado">
                                                    <option value="">Seleccione turno de empleado</option>
                                                    @foreach($turnos as $key => $turno_empleado)
                                                        <option value="{{ $turno_empleado->turno_empleado }}"
                                                            {{ $turno_empleado->turno_empleado  == old('cargo', $empleado->turno_empleado) ? 'selected' : ''  }} >
                                                            {{ $turno_empleado->descripcion }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @foreach ($errors->get('turno_empleado') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{--  end form-row--}}


                                        {{--FK Grupo Trabajo--}}
                                        <div class="form-group">
                                            <label for="grupo_trabajo" >Grupo de Trabajo</label>
                                            <select
                                                class   ="form-control"
                                                name    ="grupo_trabajo"
                                                id      ="grupo_trabajo">
                                                <option value="">Seleccione grupo de trabajo</option>
                                                @foreach($grupos as $key => $grupo_trabajo)
                                                    <option value="{{ $grupo_trabajo->grupo_trabajo }}"
                                                        {{ $grupo_trabajo->grupo_trabajo  == old('cargo', $empleado->grupo_trabajo) ? 'selected' : ''  }} >
                                                        {{ $grupo_trabajo->descripcion }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @foreach ($errors->get('grupo_trabajo') as $error)
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
                                                       value    = "{{ old('fecha_nacimiento', $empleado->fecha_nacimiento)  }}"
                                                       placeholder="Introduzca fecha nacimiento">
                                                @foreach ($errors->get('fecha_nacimiento') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>


                                            {{--TimePicker Fecha Ingreso --}}
                                            <div class="bootstrap-timepicker">

                                                <label>Fecha de Ingreso:</label>
                                                <div class              = "input-group date fecha1"
                                                     id                 = "timepicker1"
                                                     data-target-input  = "nearest">
                                                    <input
                                                        type     = "text"
                                                        name     = "fecha_ingreso"
                                                        id       = "fecha_ingreso"
                                                        value    = "{{ old('fecha_ingreso', $empleado->fecha_ingreso)  }}"
                                                        class    = "form-control datetimepicker-input"
                                                        data-target = ".fecha1"/>
                                                    @foreach ($errors->get('fecha_ingreso') as $error)
                                                        <span class="text text-danger">{{ $error }}</span>
                                                    @endforeach
                                                    <div class="input-group-append"
                                                         data-target = ".fecha1"
                                                         data-toggle = "datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                    </div>
                                                </div>
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
                                                       value    = "{{ old('salario', $empleado->salario)  }}"
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

                                            {{-- TimePicker Fecha Ingreso --}}
                                            <div class="bootstrap-timepicker">
                                                <label>Fecha de Ingreso:</label>
                                                <div class              = "input-group date fecha2"
                                                     id                 = "timepicker2"
                                                     data-target-input  = "nearest">
                                                    <input
                                                        type     = "text"
                                                        name     = "fecha_egreso"
                                                        id       = "fecha_egreso"
                                                        value    = "{{ old('fecha_egreso', $empleado->fecha_egreso)  }}"
                                                        class    = "form-control datetimepicker-input"
                                                        data-target = ".fecha2"/>
                                                    @foreach ($errors->get('fecha_egreso') as $error)
                                                        <span class="text text-danger">{{ $error }}</span>
                                                    @endforeach
                                                    <div class="input-group-append"
                                                         data-target = ".fecha2"
                                                         data-toggle = "datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group col">
                                                <label for="motivo_egreso">Motivo Egreso </label>
                                                <input class    = "form-control"
                                                       maxlength="200"
                                                       type     = "text"
                                                       name     = "motivo_egreso"
                                                       id       = "motivo_egreso"
                                                       value    = "{{ old('motivo_egreso', $empleado->motivo_egreso)  }}"
                                                       placeholder="Introduzca motivo_egreso">
                                                @foreach ($errors->get('motivo_egreso') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{--  end form-row--}}
                                    </div>
                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
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

    <script>
        {{-- --}}
        //    $('#timepicker').datetimepicker({
        //        format: 'MM/DD/YYYY hh:mm:ss'
        //    });

        // $('#timepicker').datetimepicker
        $('.fecha1').datetimepicker
        ({
            collapse:false,
            sideBySide:false,
            useCurrent:true,
            showClose:true,
            tooltips: {
                today:               'Seleccionar HOY',
                clear: 				 'Limpiar campos',
                close: 				 'Cerrar el selector',
                selectMonth: 		 'Seleccione mes',
                prevMonth: 			 'Mes anterior',
                nextMonth: 			 'Próximo mes',
                selectYear: 		 'Seleccionar año',
                prevYear: 			 'Año anterior',
                nextYear: 			 'El próximo año',
                selectDecade: 		 'Seleccionar década',
                prevDecade: 		 'Década anterior',
                nextDecade: 		 'Próxima década',
                prevCentury: 		 'Siglo anterior',
                nextCentury: 		 'Próximo siglo',
                incrementHour: 		 'Incremento de hora',
                pickHour: 			 'Elegir hora',
                decrementHour:		 'Hora de disminución',
                incrementMinute: 	 'Incremento de minutos',
                pickMinute: 		 'Elegir minuto',
                decrementMinute:	 'Disminuir minuto',
                incrementSecond: 	 'Incremento de segundo',
                pickSecond: 		 'Elija segundo',
                decrementSecond:	 'Disminuir segundo',
            },
            //   timePicker: true,
            timePickerIncrement: 30,
            format:'YYYY-MM-DD hh:mm:ss',
            icons:{
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-arrow-up',
                down: 'fa fa-arrow-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-calendar-check-o',
                clear: 'fa fa-eraser',
                close: 'fa fa-close'
            },

            buttons: {
                showToday: false,
                showClear: false,
                showClose: false
            },
        });

        $('.fecha2').datetimepicker
        ({
            collapse:false,
            sideBySide:false,
            useCurrent:false,
            showClose:true,
            tooltips: {
                today:               'Seleccionar HOY',
                clear: 				 'Limpiar campos',
                close: 				 'Cerrar el selector',
                selectMonth: 		 'Seleccione mes',
                prevMonth: 			 'Mes anterior',
                nextMonth: 			 'Próximo mes',
                selectYear: 		 'Seleccionar año',
                prevYear: 			 'Año anterior',
                nextYear: 			 'El próximo año',
                selectDecade: 		 'Seleccionar década',
                prevDecade: 		 'Década anterior',
                nextDecade: 		 'Próxima década',
                prevCentury: 		 'Siglo anterior',
                nextCentury: 		 'Próximo siglo',
                incrementHour: 		 'Incremento de hora',
                pickHour: 			 'Elegir hora',
                decrementHour:		 'Hora de disminución',
                incrementMinute: 	 'Incremento de minutos',
                pickMinute: 		 'Elegir minuto',
                decrementMinute:	 'Disminuir minuto',
                incrementSecond: 	 'Incremento de segundo',
                pickSecond: 		 'Elija segundo',
                decrementSecond:	 'Disminuir segundo',
            },
            //   timePicker: true,
            timePickerIncrement: 30,
            format:'YYYY-MM-DD hh:mm:ss',
            icons:{
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-arrow-up',
                down: 'fa fa-arrow-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-calendar-check-o',
                clear: 'fa fa-eraser',
                close: 'fa fa-close'
            },

            buttons: {
                showToday: false,
                showClear: false,
                showClose: false
            },
        });

        //Y-m-d H:i:s
        // format:'DD-MM-YYYY hh:mm',

        // en controler puede reformatear asi
        //        $requestData['fecha_ingreso'] = date("Y-m-d H:i:s", strtotime(request('fecha_ingreso')));
        //        $requestData['fecha_egreso'] = date("Y-m-d H:i:s", strtotime(request('fecha_egreso')));
    </script>
@endsection

