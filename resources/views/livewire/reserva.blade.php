<div class="row">

    <div class="col-md-6">
        <div class="card card-cyan">
            <div class="card-header">
                @isset($reserva->id)
                    <h3 class="card-title">Editar Reserva</h3>
                @else
                    <h3 class="card-title">Crear Reservas</h3>
                @endisset
            </div>


            <div class="card-body">
                @isset($reserva->id)
                    {!! Form::model($reserva, ['route' => ['reserva.update', $reserva->id], 'method' => 'PATCH']) !!}
                    <div class="form-group col">
                        {!! Form::label('id', 'Código de Reserva') !!}
                        {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                    </div>
                @else
                <!--  Nueva reserva -->
                    {!! Form::open(
                        ['route' =>
                            ['reserva.store' ],
                                'method'    => 'post',
                                'id'        => 'form',
                            ]
                    ) !!}
                @endisset

                {{--<div class="form-row">--}}

                {{--Set all function cons base model dropdown list char 1--}}


                <div class="form-group col">
                    <div class="row">
                        <div class="col-md-3">
                            {{--SELECT FK Taller --}}
                            {!! Form::label('taller_id', 'Taller') !!}
                            {!! Form::select('taller_id', $talleres->pluck('descripcion', 'id')  ,
                                old('taller_id') ,
                                [
                                    'class' => 'form-control',
                                   ]
                            ) !!}
                            @error("taller_id")
                            <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">

                            {{--SELECT FK Usuario --}}
                            {!! Form::label('usuario', 'Usuario empleado') !!}

                            {!! Form::select('usuario', $usuarios->pluck('usuario', 'usuario' )  ,
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
                        <div class="col-md-6">

                            {{--SELECT FK Empleado --}}
                            {!! Form::label('empleado_id', 'Empleado') !!}
                            {!! Form::select('empleado_id', $empleados->pluck('full_name', 'id') ,
                                old('empleado_id') ,
                                [
                                    'class' => 'form-control',
                                    ]
                            ) !!}
                            @error("empleado_id")
                            <span class="text text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>
                </div>
                {{--SELECT FK Taller ------------------------------------ --}}

                {{--                <div class="form-group col">--}}
                {{--                    --}}{{--SELECT FK Cliente --}}
                {{--                    {!! Form::label('cliente_id', 'Cliente') !!}--}}
                {{--                    {!! Form::select('cliente_id', $clientes->pluck('razon_social', 'id')  ,--}}
                {{--                        old('cliente_id') ,--}}
                {{--                        [--}}
                {{--                            'class' => 'form-control',--}}
                {{--                            'placeholder' => 'Seleccione Cliente']--}}
                {{--                    ) !!}--}}
                {{--                    @error("cliente_id")--}}
                {{--                    <span class="text text-danger">{{ $message }}</span>--}}
                {{--                    @enderror--}}
                {{--                </div>--}}
                {{--SELECT FK Cliente ------------------------------------ --}}
                {{--<input wire:change="test()" wire:model="test" type="text" class="form-control @error('test') is-invalid @enderror">--}}
                <div class="form-group col">
                    <div class="row">

                        <div class="  col-md-10">
                            {!! Form::label('cliente_desc', 'Cliente') !!}

                            <input
                                list="browsers"
                                class="form-control  "
                                wire:model="term"
                                wire:keyup="onChangeClient()"
                            >
                            <div wire:loading>Buscando clientes...</div>
                            <div wire:loading.remove>
                                @if ($term == "")
                                    <div class="text-gray-500 text-sm">
                                        Ingrese términos para buscar clientes.
                                    </div>
                                @else
                                    {{-- @if(isset($data['users']) && (isset($data['users'][0]->razon_social ) || isset($data['users']->razon_social )) )--}}
                                    <datalist id="browsers">
                                        @if(isset($data['users'][0]->razon_social)   )
                                            @foreach($data['users'] as $client)
                                                <option value="{{$client->razon_social }}|{{$client->id }}"></option>
                                            @endforeach
                                            {{-- Si refrezca la pagina convierte en array $data['users']  --}}
                                        @elseif ( isset($data['users']['data'][0]) )
                                            @for ($i = 0; $i < count($data['users']['data']); $i++)
                                                <option value="{{$data['users']['data'][$i]['razon_social'] }}|{{$data['users']['data'][$i]['id'] }}"></option>
                                            @endfor
                                        @endif
                                    </datalist>

                                    @if( count($data['users']) == 0 )
                                    <div class="text-gray text-sm">
                                        Sin resultados para <b>{{$term}} </b>.
                                    </div>

                                @endif
                                @endif

                            </div>
                        </div>

                        <div class=" col-md-2">
                            <label for="termId">Id</label>
                            <input
                                readonly
                                wire:model.defer="termId"
                                id="cliente_id"
                                name="cliente_id"
                                {{ old("cliente_id", $reserva->cliente_id )  }}
                                class="form-control  @error('termId') is-invalid @enderror"
                            >
                            @error("cliente_id")
                            <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group col">
                    {{--SELECT FK Vehículo --}}
                    {!! Form::label('vehiculo_id', 'Vehículo') !!}
                    {!! Form::select('vehiculo_id', $vehiculos  ,
                        old('vehiculo_id') ,
                        [
                            'class' => 'form-control',
                            'placeholder' => 'Seleccione el cliente y luego el vehículo']
                    ) !!}
                    @error("vehiculo_id")
                    <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{--SELECT FK Vehículo ------------------------------------ --}}

                <div class="form-group col">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="fecha">Fecha </label>
                            <input class="form-control"
                                   type="date"
                                   readonly
                                   name="fecha"
                                   id="fecha"
                                   value="{{  date('Y-m-d', strtotime(($reserva->fecha ?? date('d-m-Y')))) }}"
                                   placeholder="Introduzca Fecha">
                            @foreach ($errors->get('fecha') as $error)
                                <span class="text text-danger">{{ $error }}</span>
                            @endforeach
                        </div>


                        <div class="col-md-4">

                            <label for="forma">Forma</label>
                            <select
                                class="form-control"
                                name="forma_reserva"
                                id="forma_reserva">
                                @foreach ($formas as $key => $forma_reserva)
                                    <option value="{{   $forma_reserva    }}"
                                            @if ($reserva->forma_reserva == old('forma_reserva', $forma_reserva) )
                                            selected="selected"
                                        @endif
                                    >{{   $key    }} </option>
                                @endforeach
                            </select>
                            @foreach ($errors->get('forma_reserva') as $error)
                                <span class="text text-danger">{{   $error    }}</span>
                            @endforeach

                        </div>


                        <div class="col-md-4">
                            <label for="para_fecha">Para Fecha </label>
                            <input class="form-control"
                                   type="date"
                                   name="para_fecha"
                                   id="para_fecha"
                                   wire:model="para_fecha"
                                   value='{{ old('para_fecha',    date('d-m-Y', strtotime($reserva->para_fecha ))  )   }}'
                                   placeholder="Introduzca Para Fecha">
                            @foreach ($errors->get('para_fecha') as $error)
                                <span class="text text-danger">{{ $error }}</span>
                            @endforeach
                        </div>
                    </div>


                </div>
                {{--DATE TIMESTAMP Para Fecha------------------------------------ --}}

                <div class="form-group col">
                    <div class="row">
                        <div class="col-md-4">
                            {{--DATE TIMESTAMP Para Hora --}}

                            <label for="para_hora">Para Hora </label>
                            <input class="form-control"
                                   type="time"
                                   name="para_hora"
                                   id="para_hora"
                                   readonly
                                   wire:model="para_hora"
                                   value='{{ old('para_hora' ,    $reserva->para_hora ?? ''  ) }}'
                                   placeholder="Introduzca Para Hora">
                            @foreach ($errors->get('para_hora') as $error)
                                <span class="text text-danger">{{ $error }}</span>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            {{--INPUT NUMERIC Sector --}}
                            {!! Form::label('sector', 'Sector') !!}
                            {!! Form::text(
                                'sector',
                                old('sector') ,
                                [
                                    'wire:model'    => "sector",
                                    'readonly',
                                    'maxlength'     => '',
                                    'type'          => 'numeric',
                                    'class'         => 'form-control',
                                    'placeholder'   => 'Sector'
                            ]) !!}
                            @error("sector")
                            <span class="text text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-md-4">
                            {{--INPUT NUMERIC Ticket --}}
                            {!! Form::label('ticket', 'Ticket') !!}
                            {!! Form::text(
                                'ticket',
                                old('ticket') ,
                                [
                                    'wire:keyup'    => "traeHoraSector()",
                                    'wire:change'    => "traeHoraSector()",
                                    'wire:model'    => "ticket",
                                    'maxlength'     => '',
                                    'type'          => 'numeric',
                                    'class'         => 'form-control',
                                    'placeholder'   => 'Ticket'
                            ]) !!}
                            @error("ticket")
                            <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group col">
                    {{--INPUT TEXT Observación --}}
                    {!! Form::label('observacion', 'Observación') !!}
                    {!! Form::textarea(
                        'observacion',
                        old('observacion') ,
                        [
                            'maxlength'     => '200',
                            'cols'          => '5',
                            'rows'          => '5',
                            'type'          => 'text',
                            'class'         => 'form-control',
                            'placeholder'   => 'Observación'
                        ]) !!}
                    @error("observacion")
                    <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{--INPUT TEXT Observación ------------------------------------ --}}












                {{--                <div class="form-group col">--}}
                {{--                    --}}{{--SELECT FK Parametro ID --}}
                {{--                    {!! Form::label('parametro_id', 'Parametro ID') !!}--}}
                {{--                    {!! Form::text(--}}
                {{--                        'ticket',--}}
                {{--                        old('ticket') ,--}}
                {{--                        [--}}
                {{--                            'maxlength'     => '',--}}
                {{--                            'id'            => 'parametro_id',--}}
                {{--                            'name'          => 'parametro_id',--}}
                {{--                            'type'          => 'text',--}}
                {{--                            'class'         => 'form-control',--}}
                {{--                            'placeholder'   => 'Ticket'--}}
                {{--                    ]) !!}--}}
                {{--                    @error("parametro_id")--}}
                {{--                    <span class="text text-danger">{{ $message }}</span>--}}
                {{--                    @enderror--}}
                {{--                </div>--}}
                {{--                --}}{{--SELECT FK Parametro ID ------------------------------------ --}}


                {{--</div>--}}


                <div class="card-footer  ">

                    <a href="/agendamiento"
                       target="_blank"
                       class="btn bg-maroon pull-right"><i class="fa fa-calendar"></i>
                        Calendario Reservas
                    </a>
                    <button
                        type="submit"
                        class="btn btn-info">Grabar
                    </button>
                    <a href="{{ route('reserva.index') }}  " class="btn btn-secondary btn-close">Indice</a>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
