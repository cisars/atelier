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


                                    <div class="card-body" style=" background-image:url('/img/bg-ot.gif')">
                                        <div class="jumbotron m-0 p-4" style="background:rgba(225,239,245,0.7); ">
                                            <div class="row">

                                                {{--<div class="form-row">--}}
                                                <div class="form-group col-4 bg-gray-light">
                                                    {{--SELECT FK Taller --}}
                                                    {!! Form::label('taller_id', 'Taller') !!}
                                                    {{ $ordentrabajo->taller->descripcion }}
                                                </div>
                                                <div class="form-group col-4">
                                                </div>
                                                {{--SELECT FK Taller ------------------------------------ --}}
                                                <div class=" col-4   ">

                                                    {{--SELECT FK Recepción --}}
                                                    {!! Form::label('recepcion_id', 'Recepción Nro  ' ) !!}
                                                    <span class="h3">#{{ $ordentrabajo->recepcion_id }}
                                                </span>
                                                </div>
                                                {{--SELECT FK Recepción ------------------------------------ --}}

                                            </div> {{--row --}}
                                            {{--Set all function cons base model dropdown list char 1--}}
                                            <div class="row">
                                                {{--CONST   | tipo | tipo --}}
                                                <div class="form-group col-4 bg-gray-light">
                                                    <label for="tipo">Tipo</label>
                                                    {{ $ordentrabajo->tipo }}
                                                </div>
                                                {{-- FIN CONST cero------------------------------------ --}}
                                                <div class="form-group col-4">
                                                </div>
                                                {{--CONST Estado Pendiente | estado | estado --}}
                                                <div class="form-group col-4 bg-gray-light">
                                                    {{ $ordentrabajo->estado_desc }}
                                                </div>
                                                {{-- FIN CONST Estado Pendiente------------------------------------ --}}

                                            </div>{{--row --}}
                                            <div class="row">
                                                <div class="form-group col-5 bg-gray-light">
                                                    {{--DATE TIMESTAMP Fecha de Recepcion --}}

                                                    <label for="fecha_recepcion">Fecha Recepción </label>

                                                    {{ date('d-m-Y', strtotime($ordentrabajo->recepcion->fecha_recepcion)) }}
                                                </div>
                                                {{--DATE TIMESTAMP Fecha de Recepcion------------------------------------ --}}
                                                <div class="form-group col-2  ">
                                                </div>
                                                <div class="form-group col-5 bg-gray-light">
                                                    {{--DATE TIMESTAMP Fecha de Finalización --}}

                                                    <label for="fecha_fin">Fecha Finalización </label>

                                                    {{--                                                {{ date('d-m-Y', strtotime($ordentrabajo->recepcion->fecha_finalizacion)) }}--}}
                                                </div>
                                                {{--DATE TIMESTAMP Fecha de Finalización------------------------------------ --}}
                                            </div>{{--row --}}
                                            <div class="row">
                                                <div class="form-group col-5 bg-gray-light">
                                                    {{--SELECT FK Cliente --}}
                                                    {!! Form::label('cliente_id', 'Cliente') !!}

                                                    {{ $ordentrabajo->cliente->razon_social }}
                                                </div>
                                                {{--SELECT FK Cliente ------------------------------------ --}}
                                                <div class="form-group col-2  ">
                                                </div>
                                                <div class="form-group col-5 bg-gray-light">
                                                    {{--SELECT FK Vehículo --}}
                                                    {!! Form::label('vehiculo_id', 'Vehículo') !!}

                                                    {{ $ordentrabajo->vehiculo->full_desc }}
                                                </div>
                                                {{--SELECT FK Vehículo ------------------------------------ --}}
                                            </div>{{--row --}}
                                            <div class="row">
                                                <div class="form-group col-5 bg-gray-light">
                                                    {{--SELECT FK Empleado --}}
                                                    {!! Form::label('empleado_id', 'Recepcionista') !!}

                                                    {{ $ordentrabajo->empleado->apellidos . ', ' . $ordentrabajo->empleado->nombres }}
                                                </div>
                                                {{--SELECT FK Empleado ------------------------------------ --}}
                                                <div class="form-group col-2  ">
                                                </div>
                                                <div class="form-group col-5 bg-gray-light">
                                                    {{--SELECT FK Grupo de Trabajo --}}
                                                    {!! Form::label('grupo_id', 'Grupo de Trabajo') !!}
                                                </div>
                                                {{--SELECT FK Grupo de Trabajo ------------------------------------ --}}
                                            </div>{{--row --}}
                                            <div class="row">
                                                {{--CONST Prioridad Normal | prioridad | prioridad --}}
                                                <div class="form-group col-4 bg-gray-light">
                                                    {{ $ordentrabajo->prioridad_desc }}
                                                </div>
                                                {{-- FIN CONST Prioridad Normal------------------------------------ --}}
                                            </div>{{--row --}}
                                        </div>{{--  jumbotron  --}}
                                        <hr>
                                        <div class="form-group col">
                                            <label>Síntomas de ingreso</label>
                                            <table
                                                class="table table-sm table-hover nowrap d-table table-responsive"
                                                style="background:rgba(225,239,245,0.7); ">
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
                                                    'wire:model'    => 'descripcion',
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
                                            <label>Presupuesto</label>
                                            <br>
                                            {{--{{ json_encode($arrayItems) }}--}}
                                            <table
                                                class="table table-sm table-hover nowrap d-table table-responsive"
                                                style="background:rgba(255,255,255,0.7); ">
                                                <thead class="">
                                                <tr>
                                                    <th class="w-auto">#</th>
                                                    <th class="w-auto">ID</th>
                                                    <th class="w-50">Descripción</th>
                                                    <th class="w-50">Observacion</th>
                                                    <th class="w-100">Aprobado</th>
                                                    <th class="w-100">Revisar</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $ii=0 @endphp
                                                @if($arrayItems)
                                                    @foreach ($arrayItems as $key => $item)
                                                        @php $ii++ @endphp
                                                        <tr>
                                                            <td> {{ $ii }} </td>
                                                            <td> {{ $item['id'] }} </td>
                                                            <td> {{ $item['descripcion'] }} </td>
                                                            <td>
                                                                <input
                                                                    wire:key="input_obs_{{ $item['id'] }}"
                                                                    type="text"
                                                                    class="form-control-sm col-12"
                                                                    wire:model="arrayItems.{{ $item['id'] }}.descripcion_verificacion"
                                                                >
                                                            </td>
                                                            <td>
                                                                <input
                                                                    name="check_{{ $item['id'] }}"
                                                                    value="v"
                                                                    wire:key="input_check_{{ $item['id'] }}"
                                                                    type="radio"
                                                                    class="form-control-sm col-12"
                                                                    min="1"
                                                                    wire:model="arrayItems.{{ $item['id'] }}.verificado"
                                                                    wire:loading.attr="disabled"
                                                                    wire:target="arrayItems.{{ $item['id'] }}.verificado"
                                                                >
                                                            </td>
                                                            <td>
                                                                <input
                                                                    name="check_{{ $item['id'] }}"
                                                                    value="r"
                                                                    wire:key="input_check_{{ $item['id'] }}"
                                                                    type="radio"
                                                                    class="form-control-sm col-12"
                                                                    min="1"
                                                                    wire:model="arrayItems.{{ $item['id'] }}.verificado"
                                                                    wire:loading.attr="disabled"
                                                                    wire:target="arrayItems.{{ $item['id'] }}.verificado"
                                                                >
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="form-group col">
                                            {{--SELECT FK Usuario --}}
                                            {!! Form::label('usuario', 'Usuario') !!}
                                            <br>
                                            {{ Auth::user()->usuario }}
                                        </div>

                                        <div class="card-footer  ">
                                            <button
                                                wire:click="guardar"
                                                wire:loading.class="disabled"
                                                wire:target="guardar"
                                                type="submit"
                                                class="btn btn-info">Grabar
                                            </button>
                                            <a href="{{ route('servicios-realizados') }}  "
                                               class="btn btn-secondary btn-close">Volver</a>
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
    </div>
</div>
