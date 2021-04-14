{{--    {!! Form::open() !!}--}}
{{--<div class="form-row">--}}


<div class="form-row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4 text-right">
                <input wire:change="consultarCalendario()"
                       wire:model="fechaSeleccionada"
                       name="fechaSeleccionada"
                       id="fechaSeleccionada"
                       class="form-control     "
                       data-date-inline-picker="true"
                       type="date"
                       max="{{date('Y-m-d', strtotime(date('Y-m-d').' + 15 days ')) }}"
                       min="{{date('Y-m-d')}}"
                       autofocus="autofocus"

                >
            </div>
        </div>

        {{--CREAR LOS TURNOS-----------------------------------------------------------------------------------------------------}}
        <div class="row align-items-center overflow-scroll    ">
            <div class="  justify-content-center align-items-center  " style="width: 18px">
            </div>
            @php $aux_apertura = $parametro->hora_apertura @endphp
            @php $titulosTurnos = 0 @endphp
            @while( $aux_apertura <= $parametro->hora_cierre )
                {{--Verifica si el horario esta fuera de los descansos --}}
                @if ( $parametro->horaTurno($aux_apertura) )
                    @php $titulosTurnos++ ; @endphp
                    @if($titulosTurnos%2==0)

                        <div class="col p-2 m-1 justify-content-center align-items-center btn bg-gray     ">
                            Turno  {{ $titulosTurnos/2}} </th>
                        </div>
                    @endif
                @endif
                @php  $aux_apertura =  date('H:i', strtotime($aux_apertura.' + '.  $parametro->periodicidad .' minutes '));  @endphp
            @endwhile
        </div>

        {{--CREAR CABECERA DE LOS HORARIOS--------------------------------------------------------------------------------------}}
        <div class="row align-items-center overflow-scroll   ">
            <div class="  justify-content-center align-items-center  " style="width: 18px">
                #
            </div>
            @php $aux_apertura = $parametro->hora_apertura @endphp
            @while( $aux_apertura <= $parametro->hora_cierre )
                {{--Verifica si el horario esta fuera de los descansos --}}
                @if ( $parametro->horaTurno($aux_apertura) )
                    <div class="col p-2 m-1 justify-content-center align-items-center btn bg-gray     ">
                        {{ date('H:i', strtotime($aux_apertura)) }}</th>
                    </div>
                @endif
                @php  $aux_apertura =  date('H:i', strtotime($aux_apertura.' + '.  $parametro->periodicidad .' minutes '));  @endphp
            @endwhile
        </div>

        {{-- DIBUJAR CUPOS-----------------------------------------------------------------------------------------------------}}
        @php $iticket= 0; @endphp
        @php $cid = $client->id  ; @endphp
        @php $colorMiReserva = 'btn-warning  '; @endphp

        @for ($isector = 1; $isector < $parametro->sectores + 1; $isector++)
            @php $turnoCalculado = $parametro->hora_apertura @endphp
            <div class="row align-items-center overflow-scroll   ">
                <div class="justify-content-center align-items-center  " style="width: 18px">
                    {{$isector}}
                    @php
                        if ($isector%2==0){
                            $colorLibre = 'bg-green-light';
                            $colorOcupado = 'bg-red-light';
                        }else{
                            $colorLibre = 'bg-green';
                            $colorOcupado = 'bg-maroon';
                        }
                    @endphp
                </div>
                {{--  Mientras el turno este dentro del horario establecido en el parametro de hora apertura y hora cierre--}}
                {{-- ---------------------------------------------------------------------------------------------------- --}}
                @while( $turnoCalculado <= $parametro->hora_cierre )
                    {{-- Si esta fuera del horario de descanso se imprime--}}
                    @if ( $parametro->horaTurno($turnoCalculado) )
                        @php $iticket = $iticket + 1  ; @endphp
                        {{-- Si esta disponible se pinta en verde--}}
                        @if( isset($grillaReservas) &&  $grillaReservas->contains('ticket', $iticket)   )
                            @if( $grillaReservas->contains( function($val, $key)use($iticket, $cid ){
                                    return $val->ticket == $iticket && $val->cliente_id == $cid ;
                                }) )
                                <div class="col p-3 m-1 justify-content-center align-items-center btn  {{$colorMiReserva}}"
                                     style="cursor:pointer"
                                     title="Sector {{$isector}} Turno {{$turnoCalculado}} hs."
                                     wire:click.prevent="editarCupo( {{$iticket}})">
                                    {{-- OCUPADO--}}
                                    <i class="fa fa-ticket-alt"></i> {{$iticket}} Ticket
                                </div>
                            @else
                                <div class="col p-3 m-1 justify-content-center align-items-center btn {{$colorOcupado}}"
                                     style="cursor:not-allowed"
                                     title="Sector {{$isector}} Turno {{$turnoCalculado}} hs."
                                >
                                    {{-- OCUPADO--}}
                                    <i class="fa fa-lock"></i> Ocup.
                                </div>
                            @endif
                        @else
                            <div class="col p-3 m-1 justify-content-center align-items-center btn {{$colorLibre}}"
                                 style="cursor: pointer"
                                 title="Sector {{$isector}} Turno {{$turnoCalculado}} hs."
                                 wire:click.prevent="seleccionarCupo({{$isector}},'{{$turnoCalculado}}',{{$iticket}})">
                                {{-- LIBRE--}}
                                <i class="fa fa-car"></i> Libre
                            </div>

                        @endif
                    @endif
                    @php $turnoCalculado =  date('H:i', strtotime($turnoCalculado.' + '.  $parametro->periodicidad .' minutes ')); @endphp
                @endwhile
                {{-- FIN Horarios-------------------------------------------------------------------------------------------}}
            </div>
        @endfor
        {{-- FIN CUPOS-----------------------------------------------------------------------------------------------------}}
    </div>



    <div class="modal " tabindex="-1" role="dialog" id="modalReserva" wire:ignore>
        <form wire:submit.prevent="submitReserva"
              class="small"
            {{--                        role    ="form"--}}
            {{--                        id      ="form"--}}
            {{--                        method  ="POST"--}}
            {{--                        action  ="{{ route('reserva.store') }}"--}}
        >

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div
{{--                        class="modal-header" --}}
                        id="colorTituloCupo">
                        <h5  class="modal-title"
                            id="tituloCupo">
{{--                            Solicitud de Reserva via Online--}}
                            {{ $cupo['sector'] ?? '' }}
                            {{ $cupo['turno'] ?? '' }}
                            {{ $cupo['ticket'] ?? '' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <div class="card-body">

                            {{-- FK2 Select--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="cliente">Cliente  </label>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                Para el dia
                                                <label class="text-maroon" id="laFecha">
{{--                                                    {{ date('d/m/Y', strtotime($fechaSeleccionada)) }}--}}
                                                </label>
                                            </div>
                                        </div>
                                        <select readonly class="form-control input-sm">
                                            <option value="{{ $client->id }}" selected
                                            >{{ $client->razon_social }}</option>
                                        </select>
                                    </div>
                                </div>


                                {{--CONST Estado2--}}

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="forma_reserva">Forma Reserva</label>
                                        <select disabled
                                                class="form-control input-sm"
                                                name="forma_reserva"
                                                id="forma_reserva"
                                        >
                                            <option value="">Online</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="forma_reserva">Sector</label>
                                        <input disabled
                                               class="form-control input-sm"
                                               name="sectorSel"
                                               value="{{ $sectorSel ?? '' }}"
                                               id="sectorSel"
                                               wire:model="sectorSel">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="forma_reserva">Turno</label>
                                        <input disabled
                                               class="form-control input-sm"
                                               name="turnoSel"
                                               value="{{ $turnoSel ?? '' }}"
                                               id="turnoSel"
                                               wire:model="turnoSel">

                                    </div>
                                </div>


                                {{-- FK3 Select--}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="vehiculoSel">Vehículo</label>
                                        <select
                                            class="form-control input-sm"
                                            name="vehiculoSel"
                                            id="vehiculoSel"
                                            wire:model="vehiculoSel">
{{--                                            @if ($vehiculoSel)--}}
{{--                                                <option selected--}}
{{--                                                    value="{{ $vehiculoSel }}"--}}
{{--                                                > {{ $vehiculoSelDescripcion }}--}}

{{--                                                </option>--}}
{{--                                            @endif--}}
                                            <option value="">Seleccione vehiculo</option>
                                            @foreach($misvehiculos as $key => $vehiculo)
                                                <option
                                                    value="{{ $vehiculo->id }}"
                                                    {{ old('vehiculoSel') == $vehiculo->id ? 'selected' : '' }}
                                                > {{ $vehiculo->modelo->marca->descripcion }}
                                                    , {{ $vehiculo->modelo->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @foreach ($errors->get('vehiculoSel') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="vehiculo">Descripción del problema</label>
                                        <textarea
                                            class="form-control input-sm"
                                            name="observacionSel"
                                            type="text"
                                            rows="10"
                                            cols="25"
                                            id="observacionSel"
                                            wire:model="observacionSel"></textarea>

                                        @foreach ($errors->get('observacionSel') as $error)
                                            <span class="text text-danger">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="text-maroon pull-left"><i class="fa fa-ticket"></i>
                            <span id="ticketSel" wire:model="ticketSel"></span>
                        </div>
                        <button type="submit" class="" id="botonAccion">
                            <i id="iconoCupo" ></i> <span id="accionCupo" ></span>
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                        {{--                <a href="{{ route('reserva.index') }}" class="btn btn-secondary btn-close">Cancelar</a>--}}
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

