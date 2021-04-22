<div class="row">
    <div class="col-md-6">
        <div class="card card-cyan">
            <div class="card-header">
                @isset($vehiculo->id)
                    <h3 class="card-title">Editar Vehículo</h3>
                @else
                    <h3 class="card-title">Crear Vehículo</h3>
                @endisset
            </div>
            <div class="card-body">
                @isset($vehiculo->id)
                    {!! Form::model($vehiculo, ['route' => ['vehiculo.update', $vehiculo->id], 'method' => 'PATCH']) !!}
                    <div class="form-group col">
                        {!! Form::label('id', 'Código de Vehiculo') !!}
                        {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                    </div>
                @else
                    {!! Form::open(
                        ['route' =>
                            ['vehiculo.store' ],
                                'method'    => 'post',
                                'id'        => 'form',
                            ]
                    ) !!}
                @endisset


                @isset($vehiculo->id)
                        {{--select Cliente  ------------------------------------ --}}
                        <div class="form-group col">
                            {{--SELECT FK Localidad --}}
                            {!! Form::label('cliente_id', 'Cliente') !!}
                            {!! Form::select('cliente_id', $clientes->pluck('razon_social', 'id')  ,
                                old('cliente_id') ,
                                [
                                    'disabled',
                                    'class' => 'form-control',
                                    'placeholder' => 'Seleccione Cliente']
                            ) !!}
                            @error("cliente_id")
                            <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                @else
                        <div class="form-group col">
                            <div class="row">
                                <div class="  col-md-10">
                                    {!! Form::label(' ', 'Cliente') !!}

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
                                                        <option
                                                            value="{{$client->razon_social }}|{{$client->id }}"></option>
                                                    @endforeach
                                                    {{-- Si refrezca la pagina convierte en array $data['users']  --}}
                                                @elseif ( isset($data['users']['data'][0]) )
                                                    @for ($i = 0; $i < count($data['users']['data']); $i++)
                                                        <option
                                                            value="{{$data['users']['data'][$i]['razon_social'] }}|{{$data['users']['data'][$i]['id'] }}"></option>
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
                                        value="{{ old("cliente_id", $vehiculo->cliente_id )  }}"
                                        class="form-control  @error('termId') is-invalid @enderror"
                                    >
                                    @error("cliente_id")
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                @endisset


                {{--select Modelo  ------------------------------------ --}}
                <div class="form-group col">
                    {!! Form::label('modelo_id', 'Modelo') !!}
                    {!! Form::select('modelo_id', $modelos->pluck('descripcion', 'id')  ,
                        old('modelo_id') ,
                        [
                            'class' => 'form-control',
                            'placeholder' => 'Seleccione Modelo']
                    ) !!}
                    @error("modelo_id")
                    <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{--                                        --}}{{-- FK2 Select--}}
                {{--                                        <div class="form-group">--}}
                {{--                                            <label for="modelo">Modelo</label>--}}
                {{--                                            <select--}}
                {{--                                                class   ="form-control"--}}
                {{--                                                name    ="modelo"--}}
                {{--                                                id      ="modelo">--}}
                {{--                                                @foreach($modelos as $key => $modelo)--}}
                {{--                                                    <option value="{{ $modelo->modelo }}"--}}
                {{--                                                            @if ($vehiculo->modelo == old('modelo', $modelo->modelo))--}}
                {{--                                                            selected="selected"--}}
                {{--                                                        @endif--}}
                {{--                                                    >{{ $modelo->descripcion }}</option>--}}
                {{--                                                @endforeach--}}
                {{--                                            </select>--}}
                {{--                                        </div>--}}

                {{--INPUT chapa ------------------------------------ --}}
                <div class="form-group col">
                    {!! Form::label('chapa', 'Chapa') !!}
                    {!! Form::text('chapa', old('chapa'), [
                        'class'         => 'form-control',
                        'id'            => 'chapa',
                        'placeholder'   => 'Ingrese Chapa',
                    ]) !!}

                    @error('chapa')
                    <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{--INPUT Chasis ------------------------------------ --}}
                <div class="form-group col">
                    {!! Form::label('chasis', 'Chasis') !!}
                    {!! Form::text('chasis', old('chasis'), [
                        'class'         => 'form-control',
                        'id'            => 'chasis',
                        'placeholder'   => 'Ingrese Chasis',
                    ]) !!}

                    @error('chasis')
                    <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{--select Colores  ------------------------------------ --}}
                <div class="form-group col">
                    {{--SELECT FK Colores --}}
                    {!! Form::label('color_id', 'Color') !!}
                    {!! Form::select('color_id', $colores->pluck('descripcion', 'id')  ,
                        old('color_id') ,
                        [
                            'class' => 'form-control',
                            'placeholder' => 'Seleccione Cliente']
                    ) !!}
                    @error("color_id")
                    <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{--                                        --}}{{-- FK3 Select--}}
                {{--                                        <div class="form-group">--}}
                {{--                                            <label for="color">Color</label>--}}
                {{--                                            <select--}}
                {{--                                                class   ="form-control"--}}
                {{--                                                name    ="color"--}}
                {{--                                                id      ="color">--}}
                {{--                                                @foreach($colores as $key => $color)--}}
                {{--                                                    <option value="{{ $color->color }}"--}}
                {{--                                                            @if ($vehiculo->color == old('color', $color->color))--}}
                {{--                                                            selected="selected"--}}
                {{--                                                        @endif--}}
                {{--                                                    >{{ $color->descripcion }}</option>--}}
                {{--                                                @endforeach--}}
                {{--                                            </select>--}}
                {{--                                        </div>--}}

                {{--CONST Combustion--}}
                <div class="form-group col">
                    <label for="combustion">Combustion</label>
                    <select
                        class="form-control"
                        name="combustion"
                        id="combustion">
                        @foreach($combustiones as $key => $combustion)
                            <option value="{{ $combustion }}"

                                    @if ($vehiculo->combustion == old('combustion', $combustion) )
                                    selected="selected"
                                @endif
                            >{{ $key }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('combustion') as $error)
                        <span class="text text-danger">{{ $error }}</span>
                    @endforeach
                </div>

                {{--CONST Tipo--}}
                <div class="form-group col">
                    <label for="tipo">Tipo</label>
                    <select
                        class="form-control"
                        name="tipo"
                        id="tipo">
                        @foreach($tipos as $key => $tipo)
                            <option value="{{ $tipo }}"
                                    @if ($vehiculo->tipo == old('tipo', $tipo) )
                                    selected="selected"
                                @endif
                            >{{ $key }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('tipo') as $error)
                        <span class="text text-danger">{{ $error }}</span>
                    @endforeach
                </div>


                {{--INPUT Chasis ------------------------------------ --}}
                <div class="form-group col">
                    {!! Form::label('año', 'Año') !!}
                    {!! Form::text('año', old('año'), [
                        'class'         => 'form-control',
                        'id'            => 'chasis',
                        'placeholder'   => 'Ingrese año',
                    ]) !!}

                    @error('año')
                    <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="card-footer">
                <button
                    type="submit"
                    class="btn btn-info">Grabar
                </button>
                <a href="{{ route('vehiculo.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
