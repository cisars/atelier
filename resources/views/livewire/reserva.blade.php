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

                {{--                SELECT FK Cliente ------------------------------------ --}}
                {{--                <input wire:change="test()" wire:model="test" type="text" class="form-control @error('test') is-invalid @enderror">--}}

                @isset($reserva->id)
                    <input type="hidden" name="term" value="0">
                    <div class="form-group col">
                        <div class="row">
                            <div class="col-10">

                                {!! Form::label('term', 'Cliente') !!}
                                {!! Form::select('term', $clientes->pluck('razon_social', 'id')  ,
                                    old('term') ,
                                    [
                                        'name'=>'term',
                                        'class' => 'form-control',
                                        'disabled']
                                ) !!}
                                @error("term")
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-2">
                                {{--                            SELECT FK Cliente--}}
                                {!! Form::label('termId', 'Id') !!}
                                {!! Form::text('termId',
                                    old('termId', $reserva->cliente_id)  ,
                                    [
                                        'name' => 'cliente_id',
                                        'class' => 'form-control',
                                        'readonly'
                                        ]
                                ) !!}
                                @error("cliente_id")
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @else
                    <div class="form-group col">
                        <div class="row">
                            <div class="  col-md-10" wire:ignore>
                                {!! Form::label('cliente_desc', 'Cliente') !!} {{ $termId }}

                                {!! Form::select('termId', $clientes->pluck('razon_social', 'id') , null , [
                                                        'class' => 'form-control',
                                                        'wire:model' => 'termId',
                                                        'id' => 'select2-dropdown',
                                                        'style' => 'width: 100%',
                                                        'class' => 'js-example-basic-single',
                                                        'placeholder' => 'Selecciona el cliente'
                                                    ]) !!}

                                @push('pushed_styles')
                                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
                                @endpush
                                @push('pushed_scripts')
                                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                    <script>
                                        $(document).ready(function () {
                                            $('[name="termId"]').select2();
                                            $('[name="termId"]').on('change', function (e) {
                                                var data = $('[name="termId"]').select2("val");
                                            @this.set('termId', data);
                                            /*@this.emit('updateVehiculoList');*/
                                                Livewire.emit('updateVehiculoList')
                                            });
                                        });
                                    </script>
                                @endpush
                            </div>

                            <div class=" col-md-2">
                                <label for="termId">Id</label>
                                <input
                                    readonly
                                    wire:model.defer="termId"
                                    id="cliente_id"
                                    name="cliente_id"
                                    value="{{ old("cliente_id", $reserva->cliente_id )  }}"
                                    class="form-control  @error('termId') is-invalid @enderror"
                                >
                                @error("cliente_id")
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endisset


                @isset($reserva->id)

                    <div class="form-group col">
                        {{--EDITAR --}}
                        {!! Form::label('vehiculo_id', 'Vehículo') !!}
                        {!! Form::select('vehiculo_id', $vehiculos->pluck('full_desc', 'id')   ,
                            old('vehiculo_id') ,
                            [
                                'class' => 'form-control',
                                'placeholder' => 'Seleccione el cliente y luego el vehículo']
                        ) !!}
                        @error("vehiculo_id")
                        <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @else

                    <div class="form-group col">
                        <div class="row overflow-hidden">
                            <div class="col-md-11">
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

                            <div class="col-md-1">
                                {!! Form::label('   ', ' Agregar ') !!}
                                <a href="{{ route('vehiculo.create') }}  " class="btn-lg bg-yellow "><i
                                        class="fa fa-plus pt-2"></i></a>
                            </div>
                        </div>
                    </div>
                @endisset

                {{--SELECT FK Vehículo ------------------------------------ --}}

                <div class="form-group col">
                    <div class="row">
                        <div class="col-md-3">
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


                        <div class="col-md-3">

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


                        <div class="col-md-3">
                            <label for="para_fecha">Para Fecha </label>

                            <input class="form-control"
                                   type="date"
                                   name="para_fecha"
                                   id="para_fecha"
                                   wire:model="para_fecha"

                                   placeholder="Introduzca Para Fecha">
                            @foreach ($errors->get('para_fecha') as $error)
                                <span class="text text-danger">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="col-md-3">
                            <label for="forma">Estado</label>
                            <select
                                class="form-control"
                                name="estado"
                                id="estado">
                                @foreach ($estados as $key => $estado)
                                    <option value="{{   $estado    }}"
                                            @if ($reserva->estado == old('estado', $estado) )
                                            selected="selected"
                                        @endif
                                    >{{   $key    }} </option>
                                @endforeach
                            </select>
                            @foreach ($errors->get('estado') as $error)
                                <span class="text text-danger">{{   $error    }}</span>
                            @endforeach
                        </div>
                    </div>


                </div>
                {{--DATE TIMESTAMP Para Fecha------------------------------------ --}}

                <div class="form-group col">
                    <div class="row">
                        <div class="col-md-3">
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
                        <div class="col-md-3">
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
                        <div class="col-md-3">
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
                                    (!$para_fecha ? 'disabled' : ''),
                                    'type'          => 'numeric',
                                    'class'         => 'form-control',
                                    'placeholder'   => 'Ticket'
                            ]) !!}
                            @error("ticket")
                            <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-3">
                            <label for="forma">Prioridad</label>
                            <select
                                class="form-control"
                                name="prioridad"
                                id="prioridad"

                            >
                                @foreach ($prioridades as $key => $prioridad)
                                    <option value="{{   $prioridad    }}"
                                            @if ($reserva->prioridad == old('estado', $prioridad) )
                                            selected="selected"
                                        @endif
                                    >{{   $key    }} </option>
                                @endforeach
                            </select>
                            @foreach ($errors->get('prioridad') as $error)
                                <span class="text text-danger">{{   $error    }}</span>
                            @endforeach
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
