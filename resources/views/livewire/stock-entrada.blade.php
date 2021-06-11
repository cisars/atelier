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
                                        <h3 class="card-title">Editar Entrada</h3>
                                    </div>


                                    <div class="card-body">

                                        <div class="row">

                                            {{--<div class="form-row">--}}
                                            <div class="form-group col-4">
                                                {{--SELECT FK Taller --}}
                                                {!! Form::label('taller_id', 'Taller') !!}
                                                <br>
                                                {{ $entrada->taller->descripcion }}
                                            </div>
                                            {{--SELECT FK Taller ------------------------------------ --}}
                                            <div class="form-group col">
                                                {{--SELECT FK Recepción --}}
                                                {!! Form::label('recepcion_id', 'Vehículo') !!}
                                                <br>
                                                {{ $entrada->ordentrabajo->vehiculo->full_desc }}
                                            </div>
                                            {{--SELECT FK Recepción ------------------------------------ --}}
                                        </div> {{--row --}}

                                        <div class="row">
                                            <div class="form-group col-4">
                                                {{--SELECT FK Cliente --}}
                                                {!! Form::label('cliente_id', 'Cliente') !!}
                                                <br>
                                                {{ $entrada->ordentrabajo->cliente->razon_social }}
                                            </div>
                                            <div class="form-group col">
                                                {{--SELECT FK Cliente --}}
                                                {!! Form::label('ot_id', 'Orden Trabajo') !!}
                                                <br>
                                                #{{ $entrada->ordentrabajo->id }}
                                            </div>
                                        </div>{{--row --}}

                                        <hr>

                                        <div class="form-group col">
                                            <label>Presupuesto aprobado</label>
                                            <table
                                                class="table table-sm table-hover nowrap d-table table-responsive">
                                                <thead class="">
                                                <tr>
                                                    <th class="w-auto">#</th>
                                                    <th class="w-auto">ID</th>
                                                    <th class="w-100">Descripción</th>
                                                    <th class="w-100">Cantidad</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $ii=0 @endphp

                                                {{--@foreach ($entrada->ordentrabajo->ordenes_servicios as $servicio)
                                                    @php $ii++ @endphp
                                                    <tr>
                                                        <td> {{ $ii }} </td>
                                                        <td> {{ $servicio->servicio_id }} </td>
                                                        <td> {{ $servicio->servicio->descripcion }} </td>
                                                        <td>
                                                            {{ $servicio->cantidad }}
                                                        </td>
                                                    </tr>
                                                @endforeach--}}
                                                @foreach ($entrada->ordentrabajo->ordenes_repuestos as $repuesto)
                                                    @php $ii++ @endphp
                                                    <tr>
                                                        <td> {{ $ii }} </td>
                                                        <td> {{ $repuesto->producto_id }} </td>
                                                        <td> {{ $repuesto->repuesto->descripcion }} </td>
                                                        <td>
                                                            {{ $repuesto->cantidad }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="form-group col">
                                            <label>Alta de productos/repuestos</label>
                                            <table
                                                class="table table-sm table-hover nowrap d-table table-responsive">
                                                <thead class="">
                                                <tr>
                                                    <th class="w-auto">#</th>
                                                    <th class="w-auto">ID</th>
                                                    <th class="w-75">Descripción</th>
                                                    <th class="w-25">Sector</th>
                                                    <th class="w-auto">Cantidad</th>
                                                    <th class="w-100"></th>
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
                                                                {!! Form::select('sector_id', $sectores , null , [
                                                                        'class' => 'form-control',
                                                                        'wire:model' => 'arrayItems.'.$item['id'].'sector_id'
                                                                        ]) !!}
                                                            </td>
                                                            <td>
                                                                <input
                                                                    wire:key="input_quantity_{{ $item['id'] }}"
                                                                    type="number"
                                                                    class="form-control-sm col-12"
                                                                    min="1"
                                                                    wire:model="arrayItems.{{ $item['id'] }}.quantity"
                                                                    wire:keyup="subtotal({{ $item['id'] }})"
                                                                    wire:change="subtotal({{ $item['id'] }})"
                                                                    wire:loading.attr="disabled"
                                                                    wire:target="subtotal({{ $item['id'] }})"
                                                                >
                                                            </td>
                                                            <td>
                                                                <button wire:key="pre_btn_{{ $item['id'] }}"
                                                                        type="button"
                                                                        wire:click="delItem({{ $item['id'] }})"
                                                                        class="btn btn-danger btn-xs"><i
                                                                        class="fas fa-minus"></i></button>
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
                                        {{--SELECT FK Usuario ------------------------------------ --}}


                                        {{--</div>--}}


                                        <div class="card-footer  ">
                                            <button
                                                wire:click="guardar"
                                                type="submit"
                                                class="btn btn-info">Grabar
                                            </button>
                                            <a href="{{ route('stock.entradas') }}  "
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
        <div class="col-6">
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
                                                    <th class="w-100">Acción</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($insumos as $insumo)
                                                    <tr>
                                                        <td> {{ $insumo->id }} </td>
                                                        <td> {{ $insumo->descripcion }} </td>
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
        </div>
    </div>
</div>
