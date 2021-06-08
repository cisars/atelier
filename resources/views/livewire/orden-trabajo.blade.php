<div>
    <div class="row">
        <div class="col-6">
            <div class="col-lg-12">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-cyan">
                                    <div class="card-header">
                                        @isset($ordentrabajo->id)
                                            <h3 class="card-title">Editar OrdenTrabajo</h3>
                                        @else
                                            <h3 class="card-title">Crear OrdenesTrabajos</h3>
                                        @endisset
                                    </div>


                                    <div class="card-body">
                                        @isset($ordentrabajo->id)
                                            {!! Form::model($ordentrabajo, ['route' => ['orden_trabajo.update', $ordentrabajo->id], 'method' => 'PATCH']) !!}
                                            <div class="row">
                                                <div class="form-group col">
                                                    {!! Form::label('id', 'Código de OrdenTrabajo') !!}
                                                    {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                                </div>

                                        @else
                                            {!! Form::open(
                                                ['route' =>
                                                    ['orden_trabajo.store' ],
                                                        'method'    => 'post',
                                                        'id'        => 'form',
                                                    ]
                                            ) !!}
                                            <div class="row">
                                                @endisset

                                                    {{--<div class="form-row">--}}
                                                    <div class="form-group col-4">
                                                        {{--SELECT FK Taller --}}
                                                        {!! Form::label('taller_id', 'Taller') !!}
                                                        {!! Form::select('taller_id', $talleres->pluck('descripcion', 'id')  ,
                                                            old('taller_id') ,
                                                            [
                                                                'class' => 'form-control',
                                                                'placeholder' => 'Seleccione Taller']
                                                        ) !!}
                                                        @error("taller_id")
                                                        <span class="text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    {{--SELECT FK Taller ------------------------------------ --}}
                                                <div class="form-group col">
                                                    {{--SELECT FK Recepción --}}
                                                    {!! Form::label('recepcion_id', 'Recepción') !!}
                                                    {!! Form::select('recepcion_id', $recepciones->pluck('id', 'id')  ,
                                                        old('recepcion_id') ,
                                                        [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Seleccione Recepción']
                                                    ) !!}
                                                    @error("recepcion_id")
                                                    <span class="text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{--SELECT FK Recepción ------------------------------------ --}}
                                                </div>  {{--row --}}

                                                {{--Set all function cons base model dropdown list char 1--}}

                                                <div class="row">
                                                    {{--CONST   | tipo | tipo --}}
                                                    <div class="form-group col-4">
                                                        <label for="tipo">Tipo</label>
                                                        <select
                                                            class="form-control"
                                                            name="tipo"
                                                            id="tipo">
                                                            @foreach ($tipos as $key => $tipo)
                                                                <option value="{{   $tipo    }}"
                                                                        @if (isset($ordentrabajo->tipo) == old('tipo', $tipo) )
                                                                        selected="selected"
                                                                    @endif
                                                                >{{   $key    }} </option>
                                                            @endforeach
                                                        </select>
                                                        @foreach ($errors->get('tipo') as $error)
                                                            <span class="text text-danger">{{   $error    }}</span>
                                                        @endforeach
                                                    </div>
                                                    {{-- FIN CONST cero------------------------------------ --}}

                                                    {{--CONST Estado Pendiente | estado | estado --}}
                                                    <div class="form-group col-4">
                                                        <label for="estado">Estado Pendiente</label>
                                                        <select
                                                            class="form-control"
                                                            name="estado"
                                                            id="estado">
                                                            @foreach ($estados as $key => $estado)
                                                                <option value="{{   $estado    }}"
                                                                        @if (isset($ordentrabajo->estado) == old('estado', $estado) )
                                                                        selected="selected"
                                                                    @endif
                                                                >{{   $key    }} </option>
                                                            @endforeach
                                                        </select>
                                                        @foreach ($errors->get('estado') as $error)
                                                            <span class="text text-danger">{{   $error    }}</span>
                                                        @endforeach
                                                    </div>
                                                    {{-- FIN CONST Estado Pendiente------------------------------------ --}}

                                                    {{--CONST Prioridad Normal | prioridad | prioridad --}}
                                                    <div class="form-group col-4">
                                                        <label for="prioridad">Prioridad Normal</label>
                                                        <select
                                                            class="form-control"
                                                            name="prioridad"
                                                            id="prioridad">
                                                            @foreach ($prioridades as $key => $prioridad)
                                                                <option value="{{   $prioridad    }}"
                                                                        @if (isset($ordentrabajo->prioridad) == old('prioridad', $prioridad) )
                                                                        selected="selected"
                                                                    @endif
                                                                >{{   $key    }} </option>
                                                            @endforeach
                                                        </select>
                                                        @foreach ($errors->get('prioridad') as $error)
                                                            <span class="text text-danger">{{   $error    }}</span>
                                                        @endforeach
                                                    </div>
                                                    {{-- FIN CONST Prioridad Normal------------------------------------ --}}
                                                </div>{{--row --}}


                                            <div class="row">
                                                <div class="form-group col-6">
                                                    {{--DATE TIMESTAMP Fecha de Recepcion --}}

                                                    <label for="fecha_recepcion">Fecha de Recepcion </label>
                                                    <input class="form-control"
                                                           type="date"
                                                           name="fecha_recepcion"
                                                           id="fecha_recepcion"
                                                           value='{{ old('fecha_recepcion',    date('Y-m-d', strtotime($ordentrabajo->fecha_recepcion ?? date('Y-m-d') ))  )   }}'
                                                           placeholder="Introduzca Fecha de Recepcion">
                                                    @foreach ($errors->get('fecha_recepcion') as $error)
                                                        <span class="text text-danger">{{ $error }}</span>
                                                    @endforeach
                                                </div>
                                                {{--DATE TIMESTAMP Fecha de Recepcion------------------------------------ --}}

                                                <div class="form-group col-6">
                                                    {{--DATE TIMESTAMP Fecha de Finalización --}}

                                                    <label for="fecha_fin">Fecha de Finalización </label>
                                                    <input class="form-control"
                                                           type="date"
                                                           name="fecha_fin"
                                                           id="fecha_fin"
                                                           value='{{ old('fecha_fin',    date('Y-m-d', strtotime($ordentrabajo->fecha_fin ?? date('Y-m-d') ))  )   }}'
                                                           placeholder="Introduzca Fecha de Finalización">
                                                    @foreach ($errors->get('fecha_fin') as $error)
                                                        <span class="text text-danger">{{ $error }}</span>
                                                    @endforeach
                                                </div>
                                                {{--DATE TIMESTAMP Fecha de Finalización------------------------------------ --}}
                                            </div>{{--row --}}


                                            <div class="row">
                                                <div class="form-group col-6">
                                                    {{--SELECT FK Cliente --}}
                                                    {!! Form::label('cliente_id', 'Cliente') !!}
                                                    {!! Form::select('cliente_id', $clientes->pluck('razon_social', 'id')  ,
                                                        old('cliente_id') ,
                                                        [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Seleccione Cliente']
                                                    ) !!}
                                                    @error("cliente_id")
                                                    <span class="text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{--SELECT FK Cliente ------------------------------------ --}}

                                                <div class="form-group col-6">
                                                    {{--SELECT FK Vehículo --}}
                                                    {!! Form::label('vehiculo_id', 'Vehículo') !!}
                                                    {!! Form::select('vehiculo_id', $vehiculos->pluck('id', 'id')  ,
                                                        old('vehiculo_id') ,
                                                        [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Seleccione Vehículo']
                                                    ) !!}
                                                    @error("vehiculo_id")
                                                    <span class="text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{--SELECT FK Vehículo ------------------------------------ --}}
                                            </div>{{--row --}}

                                            <div class="row">
                                                <div class="form-group col-6">
                                                    {{--SELECT FK Empleado --}}
                                                    {!! Form::label('empleado_id', 'Empleado') !!}
                                                    {!! Form::select('empleado_id', $empleados->pluck('apellidos', 'id')  ,
                                                        old('empleado_id') ,
                                                        [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Seleccione Empleado']
                                                    ) !!}
                                                    @error("empleado_id")
                                                    <span class="text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{--SELECT FK Empleado ------------------------------------ --}}

                                                <div class="form-group col-6">
                                                    {{--SELECT FK Grupo de Trabajo --}}
                                                    {!! Form::label('grupo_id', 'Grupo de Trabajo') !!}
                                                    {!! Form::select('grupo_id', $grupos->pluck('apellidos', 'id')  ,
                                                        old('grupo_id') ,
                                                        [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Seleccione Grupo de Trabajo']
                                                    ) !!}
                                                    @error("grupo_id")
                                                    <span class="text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{--SELECT FK Grupo de Trabajo ------------------------------------ --}}
                                            </div>{{--row --}}

                                                <div class="form-group col">
                                                    <label>Síntomas de ingreso</label>
                                                    <table
                                                        class="table table-sm table-hover nowrap d-table table-responsive"
                                                        id="lista1">
                                                        <thead class="">
                                                        <tr>
                                                            <th class="w-auto">Item</th>
                                                            <th class="w-100">Descripción</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($ordentrabajo->recepcion->sintomas as $sintoma)
                                                            <tr>
                                                                <td> {{ $sintoma->id }} </td>
                                                                <td> {{ $sintoma->descripcion }} </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-group col">
                                                    {{--INPUT TEXT Descripción --}}
                                                    {!! Form::label('descripcion', 'Descripción') !!}
                                                    {!! Form::text(
                                                        'descripcion',
                                                        old('descripcion') ,
                                                        [
                                                            'maxlength'     => '200',
                                                            'type'          => 'text',
                                                            'class'         => 'form-control',
                                                            'placeholder'   => 'Descripción'
                                                        ]) !!}
                                                    @error("descripcion")
                                                    <span class="text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{--INPUT TEXT Descripción ------------------------------------ --}}

                                                <div class="form-group col">
                                                    {{--INPUT NUMERIC Importe Total --}}
                                                    {!! Form::label('importe_total', 'Importe Total') !!}
                                                    {!! Form::text(
                                                        'importe_total',
                                                        old('importe_total') ,
                                                        [
                                                            'maxlength'     => '12,0',
                                                            'type'          => 'numeric',
                                                            'class'         => 'form-control',
                                                            'placeholder'   => 'Importe Total'
                                                    ]) !!}
                                                    @error("importe_total")
                                                    <span class="text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{--INPUT NUMERIC Importe Total ------------------------------------ --}}

                                                <div class="form-group col">
                                                    {{--SELECT FK Usuario --}}
                                                    {!! Form::label('usuario', 'Usuario') !!}
                                                    {!! Form::select('usuario', $usuarios->pluck('usuario', 'id')  ,
                                                        old('usuario') ,
                                                        [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Seleccione Usuario']
                                                    ) !!}
                                                    @error("usuario")
                                                    <span class="text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{--SELECT FK Usuario ------------------------------------ --}}


                                                {{--</div>--}}


                                                <div class="card-footer  ">
                                                    <button
                                                        type="submit"
                                                        class="btn btn-info">Grabar
                                                    </button>
                                                    <a href="{{ route('orden_trabajo.index') }}  "
                                                       class="btn btn-secondary btn-close">Cancelar</a>
                                                </div>

                                                {!! Form::close() !!}
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
        <div class="col-6">
            <div class="col-lg-12">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-cyan">
                                    <div class="card-header">
                                        <h3 class="card-title">Servicios</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12 " id="divSintomas">
                                            <table class="table table-sm table-hover nowrap d-table table-responsive"
                                                   id="lista1">
                                                <thead class="">
                                                <tr>
                                                    <th class="w-auto">Item</th>
                                                    <th class="w-100">Descripción</th>
                                                    <th class="w-100">Precio</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($serviciosArray as $servicioItem)
                                                    <tr>
                                                        <td> {{ $servicioItem->id }} </td>
                                                        <td> {{ $servicioItem->descripcion }} </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-12">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-cyan">
                                    <div class="card-header">
                                        <h3 class="card-title">Repuestos</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12 " id="divSintomas">
                                            <table class="table table-sm table-hover nowrap d-table table-responsive"
                                                   id="lista1">
                                                <thead class="">
                                                <tr>
                                                    <th class="w-auto">Item</th>
                                                    <th class="w-100">Descripción</th>
                                                    <th class="w-100">Precio</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($serviciosArray as $servicioItem)
                                                    <tr>
                                                        <td> {{ $servicioItem->id }} </td>
                                                        <td> {{ $servicioItem->descripcion }} </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-12">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-cyan">
                                    <div class="card-header">
                                        @isset($ordentrabajo->id)
                                            <h3 class="card-title">Editar OrdenTrabajo</h3>
                                        @else
                                            <h3 class="card-title">Crear OrdenesTrabajos</h3>
                                        @endisset
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12 " id="divSintomas">
                                            <label>Síntomas de ingreso</label>
                                            <table class="table table-sm table-hover nowrap d-table table-responsive"
                                                   id="lista1">
                                                <thead class="">
                                                <tr>
                                                    <th class="w-auto">Item</th>
                                                    <th class="w-100">Descripción</th>
                                                    <th class="w-auto"> Quitar</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $ii=0; @endphp
                                                @isset($vector)
                                                    @foreach($vector as $index => $vec)
                                                        @php $ii++; @endphp
                                                        {{--                            <tr wire:key=" {{ $index }}" >--}}
                                                        <tr>
                                                            <td> {{$ii}} </td>
                                                            <td> {{$vec  }}</td>
                                                            <td>
                                                                <button
                                                                    type="button"
                                                                    wire:click="delSintoma({{$index}})"
                                                                    class="btn btn-danger">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                                </tbody>
                                            </table>
                                            <hr>

                                            <div class="form-group ">

                                                <div class="text-bold">Listado de Síntomas para agregar</div>

                                            </div>
                                            <div wire:ignore>
                                                {{--                    @push('scripts')--}}
                                                {{--                        <script>  </script>--}}
                                                {{--                    @endpush--}}

                                                <table class="table table-sm table-hover nowrap d-table " id="lista">

                                                    <thead class="">
                                                    <tr>
                                                        <th class="">Id</th>
                                                        <th class="">Descripción</th>
                                                        <th class="">Agregar</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($sintomas as $index => $sintoma)
                                                        <tr class="">
                                                            <td> {{$sintoma->id}}</td>
                                                            <td> {{$sintoma->descripcion}}</td>
                                                            <td class="">
                                                                <a
                                                                    href=" "
                                                                    class="btn btn-info">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                @isset($vector )
                                                                    @if (array_key_exists ($sintoma->id, $vector ))
                                                                        <button
                                                                            id="btn{{$sintoma->id}}"
                                                                            type="button"
                                                                            class="btn btn-success"
                                                                            wire:click="addSintoma({{$sintoma->id}})"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-danger "
                                                                            data-data="">
                                                                            <i class="fas fa-check"
                                                                               id="icon{{$sintoma->id}}"
                                                                               aria-hidden="true"></i>
                                                                        </button>
                                                                    @else
                                                                        <button
                                                                            id="btn{{$sintoma->id}}"
                                                                            type="button"
                                                                            class="btn btn-warning"
                                                                            wire:model="btnAdd"
                                                                            wire:click="addSintoma({{$sintoma->id}})"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-danger "
                                                                            data-data="">
                                                                            <i class="fas fa-plus"
                                                                               id="icon{{$sintoma->id}}"
                                                                               aria-hidden="true"></i>
                                                                        </button>
                                                                    @endif
                                                                @else
                                                                    <button
                                                                        id="btn{{$sintoma->id}}"
                                                                        type="button"
                                                                        class="btn btn-warning"
                                                                        wire:model="btnAdd"
                                                                        wire:click="addSintoma({{$sintoma->id}})"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-danger "
                                                                        data-data="">
                                                                        <i class="fas fa-first-aid"
                                                                           aria-hidden="true"></i>
                                                                    </button>
                                                                @endisset
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    </div>
</div>
