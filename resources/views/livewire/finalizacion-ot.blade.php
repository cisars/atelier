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
                                                <div class="form-group col-5 bg-gray-light">
                                                    {{ $ordentrabajo->prioridad_desc }}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>


                                        <div class="form-group col">
                                            <label>Presupuesto</label>
                                            <table
                                                class="table table-sm table-hover nowrap d-table table-responsive" style="background:rgba(255,255,255,0.7); ">
                                                <thead class="">
                                                <tr>
                                                    <th class="w-auto">#</th>
                                                    <th class="w-auto">ID</th>
                                                    <th class="w-100">Descripción</th>
                                                    <th class="w-100">Cantidad</th>
                                                    <th class="w-100">Precio</th>
                                                    <th class="w-100">Subtotal</th>
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
                                                                {{ $item['quantity'] }}
                                                            </td>
                                                            <td> {{ number_format($item['precio_venta'], 0, ',','.') }} </td>
                                                            <td> {{ number_format($item['subtotal'], 0, ',','.') }} </td>
                                                        </tr>
                                                    @endforeach

                                                @endif
                                                <tr>
                                                    <td align="right" colspan="5"><b>Total</b></td>
                                                    <td>{{ number_format(array_sum(array_column($arrayItems, 'subtotal')), 0, ',', '.') }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-4">
                                                {{--SELECT FK Usuario --}}
                                                {!! Form::label('usuario', 'Usuario') !!}

                                                {{ Auth::user()->usuario }}
                                            </div>
                                            <div class="form-group col-8">
                                                {{--SELECT FK Usuario --}}
                                                {!! Form::label('mecanico', 'Mecánico Responsable') !!}

                                                {{ Auth::user()->empleado->apellidos }}, {{ Auth::user()->empleado->nombres }}
                                            </div>
                                            {{--SELECT FK Usuario ------------------------------------ --}}
                                        </div>

                                        {{--</div>--}}


                                        <div class="card-footer  ">
                                            <button
                                                wire:click="finalizar"
                                                type="submit"
                                                class="btn btn-info">Finalizar
                                            </button>
                                            <button
                                                wire:click="rechazar"
                                                type="submit"
                                                class="btn btn-warning">Rechazar
                                            </button>
                                            <a href="{{ route('orden_trabajo.index') }}  "
                                               class="btn btn-secondary btn-close">Volver</a>
                                            {{--<button @if (!$enviarMail || $ordentrabajo->importe_total == 0) disabled
                                                    @endif type="button" wire:click="enviarPresupuesto"
                                                    class="btn btn-danger btn-close"><i
                                                    class="fa fa-file-pdf"></i> Enviar
                                                presupuesto
                                            </button>--}}
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
