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
                    {!! Form::text('id', old('id', $recepcion->id), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                </div>
            @else
                {!! Form::open( ) !!}
            @endisset

            {{--<div class="form-row">--}}

            {{--Set all function cons base model dropdown list char 1--}}


            <div class="row">
                <div class="form-group col-md-3">
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

                @php
                    if( isset($recepcion->id)){
                            $sololectura =   "readonly "   ;
                           }

                @endphp
                <div class="form-group col-md-9">
                    {{--SELECT FK Reserva --}}
                    {!! Form::label('reserva_id', 'Reserva') !!}
                    {!! Form::select('reserva_id', $reservasActivas  ,
                        old('reserva_id') ,
                        [
                            $sololectura  .
                            'wire:model' => 'reserva_id',
                            'wire:change' => 'traeReservaSeleccionada()',
                            'class' => 'form-control' ]
                    ) !!}
                    @error("reserva_id")
                    <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            {{--SELECT FK Reserva ------------------------------------ --}}

            <div class="row">
                <div class="form-group col-md-7">
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

                <div class="form-group col-md-5">
                    {{--SELECT FK Vehiculo --}}
                    {!! Form::label('vehiculo_id', 'Vehículo') !!}
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
            </div>
            {{--SELECT FK Vehiculo ------------------------------------ --}}

            <div class="row">
                <div class="form-group col-md-8">
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
                <div class="form-group col-md-4">
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
                           {{--                           value='{{ old('fecha_recepcion',    date('d-m-Y', strtotime( (  $recepcion->fecha_recepcion ?? '12-12-2012' )  ) )   )   }}'--}}
                           placeholder="Introduzca Fecha Recepción">
                    @foreach ($errors->get('fecha_recepcion') as $error)
                        <span class="text text-danger">{{ $error }}</span>
                    @endforeach
                </div>
                {{--DATE TIMESTAMP Fecha Recepción------------------------------------ --}}


            </div>


            <div class="col-md-12 " id="divSintomas"  >
                <label>Síntomas de ingreso</label>
                <table class="table table-sm table-hover nowrap d-table table-responsive" id="lista1">
                    <thead class="" >
                    <tr>
                        <th class="w-auto">Item</th>
                        <th class="w-100">Descripción</th>
                        <th class="w-auto"> Quitar</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($sintomas as $index => $sintoma)
{{--                        <tr class=" " style="display: none" >--}}
{{--                            <td> {{$sintoma->id}}</td>--}}
{{--                            <td> {{$sintoma->descripcion}}</td>--}}
{{--                            <td class="">--}}
{{--                                <button--}}
{{--                                    type="button"--}}
{{--                                    class="btn btn-danger">--}}
{{--                                    <i class="fas fa-minus"></i>--}}
{{--                                </button>--}}

{{--                            </td>--}}
{{--                        </tr>--}}
                    @endforeach
                    @php $ii=0; @endphp
                    @isset($vector)
                        @foreach($vector as $index => $vec)
                            @php $ii++; @endphp
{{--                            <tr wire:key=" {{ $index }}" >--}}
                            <tr  >
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
                    <div>

                        <button
                            type="button"
                            class="btn btn-warning pull-right"
                            data-toggle="modal"
                            data-target="#modal-danger "
                            data-data="">
                            <i class="fas fa-folder-plus" aria-hidden="true"></i> Nuevo síntoma
                        </button>
                    </div>

                </div>
                <div wire:ignore >
                    {{--                    @push('scripts')--}}
                    {{--                        <script>  </script>--}}
                    {{--                    @endpush--}}

                    <table class="table table-sm table-hover nowrap d-table " id="lista" >

                        <thead class="">
                        <tr>
                            <th class="">Id</th>
                            <th class="">Descripción</th>
                            <th class="">Agregar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sintomas as $index => $sintoma)
{{--                            <tr class="" wire:key="{{ $sintoma->id }}" >--}}
                            <tr class=""  >
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
                                                <i class="fas fa-check" id="icon{{$sintoma->id}}" aria-hidden="true"></i>
                                            </button>
                                            {{--                                    @if (in_array($sintoma->id, $vector, TRUE))--}}

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
                                                <i class="fas fa-plus" id="icon{{$sintoma->id}}" aria-hidden="true"></i>
                                            </button>
                                            {{--                                @endisset--}}
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
                                            <i class="fas fa-first-aid" aria-hidden="true"></i>
                                        </button>
                                        {{--                                @endisset--}}
                                    @endisset

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
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



