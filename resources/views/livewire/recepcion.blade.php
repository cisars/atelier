{{--    LIVEWIRE--}}
<div class="col-md-6">
    <div class="card card-cyan">
        <div class="card-header">
            @isset($recepcion->id)
                <h3 class="card-title">Editar Recepcion</h3>
            @else
                <h3 class="card-title">Crear Recepciones </h3>
            @endisset
        </div>


        <div class="card-body">

            @isset($recepcion->id)

                {{--                {!! Form::model($recepcion, ['route' => ['recepcion.update', $recepcion->id], 'method' => 'PATCH']) !!}--}}
                <div class="form-group col">
                    {!! Form::label('id', 'Código de Recepcion') !!}
                    {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                </div>
            @else
                {!! Form::open( ) !!}
            @endisset

            {{--<div class="form-row">--}}

            {{--Set all function cons base model dropdown list char 1--}}


            <div class="form-group col" >
                {{--SELECT FK Taller --}}
                {!! Form::label('taller_id', 'Taller') !!}
                {!! Form::select(
                    'taller_id',
                    $talleres->pluck('descripcion', 'id')  ,
                    $taller_id ,
                    [
                        'wire:change' => 'traeReservas()',
                        'wire:model' => 'taller_id',
                        'class' => 'form-control',
                        $tallerHabilitado,
                        'placeholder' => 'Seleccione Taller'
                        ]
                ) !!}
                @error("taller_id")
                <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{--SELECT FK Taller ------------------------------------ --}}

            <div class="form-group col">
                {{--SELECT FK Reserva --}}
                {!! Form::label('reserva_id', 'Reserva') !!}
                {!! Form::select('reserva_id', $reservasActivas  ,
                    old('reserva_id') ,
                    [
                        'wire:model' => 'reserva_id',
                        'wire:change' => 'traeReservaSeleccionada()',
                        'class' => 'form-control',
                        'placeholder' => 'Seleccione una reserva activa']
                ) !!}
                @error("reserva_id")
                <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{--SELECT FK Reserva ------------------------------------ --}}

            <div class="form-group col">
                {{--SELECT FK Cliente --}}
                {!! Form::label('cliente_id', 'Cliente') !!}
                {!! Form::text('cliente_id', $clienteRazonSocial ,
                [
                        'readonly',
                        'class' => 'form-control',
                        'placeholder' => 'Nombre del Cliente']
                ) !!}
                @error("cliente_id")
                <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{--SELECT FK Cliente ------------------------------------ --}}

            <div class="form-group col">
                {{--SELECT FK Vehiculo --}}
                {!! Form::label('vehiculo_id', 'Vehiculo') !!}
                {!! Form::text('vehiculo_id', $elVehiculo,
                   [
                       'readonly',
                       'class' => 'form-control',
                       'placeholder' => 'Marca/Modelo']
               ) !!}
                @error("vehiculo_id")
                <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{--SELECT FK Vehiculo ------------------------------------ --}}

            <div class="form-group col">
                {{--DATE TIMESTAMP Fecha Recepción --}}

                <label for="fecha_recepcion">Fecha Recepción </label>
                <input class="form-control"
                       type="date"
                       name="fecha_recepcion"
                       id="fecha_recepcion"
                       wire:model="fecha_recepcion"
                       readonly
{{--                       data-date-format="d/m/yyyy"--}}
{{--                       data-date-format="d-m-Y"--}}
                       value='{{ old('fecha_recepcion',    date('d-m-Y', strtotime( (  $recepcion->fecha_recepcion ?? '12-12-2012' )  ) )   )   }}'
                       placeholder="Introduzca Fecha Recepción">
                @foreach ($errors->get('fecha_recepcion') as $error)
                    <span class="text text-danger">{{ $error }}</span>
                @endforeach
            </div>
            {{--DATE TIMESTAMP Fecha Recepción------------------------------------ --}}

            <div class="form-group col">
                {{--SELECT FK Usuario --}}
                {!! Form::label('usuario', 'Recepcionista') !!}
                {!! Form::select('usuario', $elRecepcionista  ,
                    old('usuario') ,
                     [
                         'readonly',
                         'class' => 'form-control',
                        ]
                 ) !!}
                @error("usuario")
                <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{--SELECT FK Usuario ------------------------------------ --}}

            <div class="col-md-12 " style="display: none" id="divSintomas">
                <label>Síntomas / Diagnóstico de ingreso</label>
                <table class="table table-sm table-hover nowrap d-table" id="lista">
                    <thead class="">
                    <tr>
                        <th class="">Item</th>
                        <th class="">Descripción</th>
                        <th class="">Acción</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="">
                        <td> 1</td>
                        <td> El motor se apaga</td>
                        <td class="">
                            <a
                                href=" "
                                class="btn btn-info">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button
                                type="button"
                                class="btn btn-danger"
                                data-toggle="modal"
                                data-target="#modal-danger "
                                data-data="">
                                <i class="fas fa-trash-alt" aria-hidden="true"></i>
                            </button>
                            <button
                                type="button"
                                class="btn btn-warning"
                                data-toggle="modal"
                                data-target="#modal-danger "
                                data-data="">
                                <i class="fas fa-plus" aria-hidden="true"></i>
                            </button>

                        </td>
                    </tr>
                    <tr class="">
                        <td> 2</td>
                        <td> No encienden las luces traseras</td>

                        <td class="">
                            <a
                                href=" "
                                class="btn btn-info">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button
                                type="button"
                                class="btn btn-danger"
                                data-toggle="modal"
                                data-target="#modal-danger "
                                data-data="">
                                <i class="fas fa-trash-alt" aria-hidden="true"></i>
                            </button>

                        </td>
                    </tr>
                    <tr class="">
                        <td> 3</td>
                        <td> Pierde aceite</td>
                        <td class="">
                            <a
                                href=" "
                                class="btn btn-info">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button
                                type="button"
                                class="btn btn-danger"
                                data-toggle="modal"
                                data-target="#modal-danger "
                                data-data="">
                                <i class="fas fa-trash-alt" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            {{--</div>--}}


            <div class="card-footer  ">
                <button
                    type="button"
                    wire:click="grabaRecepcion()"
                    class="btn btn-info">Grabar
                </button>
                <button
                    type="submit"
                    class="btn btn-danger">Submit
                </button>
                <a href="{{ route('recepcion.index') }}  " class="btn btn-secondary btn-close">Cancelar</a>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

