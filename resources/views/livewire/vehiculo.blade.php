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
                    <input type="hidden" name="cliente_id" id="cliente_id" value="{{$vehiculo->cliente_id}}">
                        <div class="form-group col">
                            {{--SELECT FK Localidad --}}
                            {!! Form::label('xxx', 'Cliente') !!}
                            {!! Form::select('cliente_id', $clientes->pluck('razon_social', 'id')  ,
                                old('xxx') ,
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
                                <div class="  col-md-10" wire:ignore>
                                    {!! Form::label(' ', 'Cliente') !!}
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
                                        value="{{ old("cliente_id", $vehiculo->cliente_id )  }}"
                                        class="form-control  @error('termId') is-invalid @enderror"
                                    >
                                    @error("cliente_id")
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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
                            'placeholder' => 'Seleccione Color']
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
