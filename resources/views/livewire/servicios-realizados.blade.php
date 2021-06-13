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


                                    <div class="card-body" style=" background-image:url('/img/bg-ot.gif')" >
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
                                                    <span class="h3" >#{{ $ordentrabajo->recepcion_id }}
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
                                                    <label for="estado">Estado</label>
                                                    {{ $ordentrabajo->estado }}
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
                                                <div class="form-group col-4">
                                                    <label for="prioridad">Prioridad </label>

                                                    {{ $ordentrabajo->prioridad }}
                                                </div>
                                                {{-- FIN CONST Prioridad Normal------------------------------------ --}}
                                            </div>{{--row --}}
                                        </div>{{--  jumbotron  --}}
                                        <hr>
                                        <div class="form-group col">
                                            <label>Síntomas de ingreso</label>
                                            <table
                                                class="table table-sm table-hover nowrap d-table table-responsive" style="background:rgba(225,239,245,0.7); ">
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
                                            <table
                                                class="table table-sm table-hover nowrap d-table table-responsive" style="background:rgba(255,255,255,0.7); ">
                                                <thead class="">
                                                <tr>
                                                    <th class="w-auto">#</th>
                                                    <th class="w-auto">ID</th>
                                                    <th class="w-100">Descripción</th>
                                                    @foreach ($arrayItems as $key => $item)
                                                        @if ($item['descripcion_verificacion'])
                                                            <th class="w-100">Observación</th>
                                                        @endif
                                                    @endforeach
                                                    <th class="w-100">Cantidad</th>
                                                    <th class="w-100">Utilizado</th>
                                                    {{--<th class="w-100">Precio Uni.</th>
                                                    <th class="w-100">Total</th>--}}
                                                    {{--<th class="w-100"></th>--}}
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
                                                            @if ($item['descripcion_verificacion'])
                                                            <td> {{ $item['descripcion_verificacion'] }} </td>
                                                            @endif
                                                            <td>
                                                                {{ $item['quantity'] }}
                                                            </td>
                                                            <td>
                                                                @if (strtolower($item['clasificacion']) != 'servicio')
                                                                    <input
                                                                        wire:key="input_quantity_{{ $item['id'] }}"
                                                                        type="number"
                                                                        class="form-control-sm col-12"
                                                                        min="1"
                                                                        wire:model="arrayItems.{{ $item['id'] }}.usado"
                                                                        wire:loading.attr="disabled"
                                                                        wire:target="arrayItems.{{ $item['id'] }}.usado"
                                                                    >
                                                                @else
                                                                    <input
                                                                        wire:key="input_usado_{{ $item['id'] }}"
                                                                        type="checkbox"
                                                                        class="form-control-sm col-12"
                                                                        min="1"
                                                                        wire:model="arrayItems.{{ $item['id'] }}.realizado"
                                                                        wire:loading.attr="disabled"
                                                                        wire:target="arrayItems.{{ $item['id'] }}.realizado"
                                                                    >
                                                                @endif
                                                            </td>
                                                            {{--<td> {{ number_format($item['precio_venta'], 0, ',','.') }} </td>
                                                            <td> {{ number_format($item['subtotal'], 0, ',','.') }} </td>--}}
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
        {{--<div class="col-6">
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
                                        <div wire:ignore class="col-md-12 " id="divServicios">
                                            <table class="table table-sm table-hover nowrap d-table table-responsive"
                                                   id="lista1">
                                                <thead class="">
                                                <tr>
                                                    <th class="w-auto">Item</th>
                                                    <th class="w-100">Descripción</th>
                                                    <th class="w-100">Precio</th>
                                                    <th class="w-100">Acción</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($servicios as $servicio)
                                                    <tr>
                                                        <td> {{ $servicio->id }} </td>
                                                        <td> {{ $servicio->descripcion }} </td>
                                                        <td> {{ number_format($servicio->precio_venta, 0, ',','.') }} </td>
                                                        <td>
                                                            <button
                                                                wire:key="ser_btn_{{ $servicio->id }}"
                                                                id="btn{{$servicio->id}}"
                                                                type="button"
                                                                class="btn btn-warning"
                                                                wire:model="btnAdd{{ $servicio->id }}"
                                                                wire:click="addItem({{$servicio->id}})"
                                                                wire:loading.attr="disabled"
                                                                wire:target="addItem"
                                                                data-toggle="modal"
                                                                data-target="#modal-danger "
                                                                data-data="">
                                                                <i class="fas fa-plus"
                                                                   id="icon{{$servicio->id}}"
                                                                   aria-hidden="true"></i>
                                                            </button>
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
                                        <div wire:ignore class="col-md-12 " id="divRepuestos">
                                            <table class="table table-sm table-hover nowrap d-table table-responsive"
                                                   id="lista2">
                                                <thead class="">
                                                <tr>
                                                    <th class="w-auto">Item</th>
                                                    <th class="w-100">Descripción</th>
                                                    <th class="w-100">Precio</th>
                                                    <th class="w-100">Acción</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($insumos as $insumo)
                                                    <tr>
                                                        <td> {{ $insumo->id }} </td>
                                                        <td> {{ $insumo->descripcion }} </td>
                                                        <td> {{ number_format($insumo->precio_venta, 0, ',','.') }} </td>
                                                        <td>
                                                            <button
                                                                wire:key="re_btn_{{ $insumo->id }}"
                                                                id="btn{{$insumo->id}}"
                                                                type="button"
                                                                class="btn btn-warning"
                                                                wire:model="btnAdd{{ $insumo->id }}"
                                                                wire:click="addItem({{$insumo->id}})"
                                                                wire:loading.attr="disabled"
                                                                wire:target="addItem"
                                                                data-toggle="modal"
                                                                data-target="#modal-danger "
                                                                data-data="">
                                                                <i class="fas fa-plus"
                                                                   id="icon{{$insumo->id}}"
                                                                   aria-hidden="true"></i>
                                                            </button>
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
                </section>
            </div>
        </div>--}}
    </div>
</div>
