<div>
    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card card-cyan">
                                <div class="card-header">
                                    <h3 class="card-title">Crear Entrega Vehículo</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label> Entrega </label>
                                            <input class="form-control"
                                                   type="text"
                                                   readonly>
                                        </div>
                                        <div class="form-group col">
                                            <label> Taller </label>
                                            <input class="form-control"
                                                   type="text"
                                                   wire:model="taller"
                                                   readonly>
                                        </div>
                                        <div class="form-group col">
                                            <label> Orden de Trabajo </label>
                                            {!! Form::select('name', $ordenes , null ,
                                                    [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Seleccionar orden finalizada',
                                                        'wire:model' => 'ot_id',
                                                        'wire:change' => 'seleccionarOt',
                                                    ]) !!}
                                            {{--<input class="form-control"
                                                   type="text"
                                                   placeholder="Introduzca codigo" value="2353">--}}
                                        </div>
                                    </div>

                                    <div class="form-group col">
                                        <div class="row overflow-hidden">
                                            <div class="col-md-11">
                                                <div class="col-12" wire:ignore>
                                                    {!! Form::label('   ', ' Cliente ') !!}
                                                    {!! Form::select('cliente_id', $clientes , null , [
                                                        'class' => 'form-control',
                                                        'wire:model' => 'cliente_id',
                                                        'id' => 'select2-dropdown',
                                                        'style' => 'width: 100%',
                                                        'class' => 'js-example-basic-single',
                                                        'placeholder' => 'Selecciona el cliente'
                                                    ]) !!}
                                                </div>
                                                @error("cliente_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>

                                            <div class="col-md-1">
                                                {!! Form::label('   ', ' Agregar ') !!}
                                                <a href="{{ route('cliente.create') }}  " class="btn-lg bg-yellow "><i
                                                        class="fa fa-plus pt-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="form-group col">
                                        <label> Cliente </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder="Introduzca cedula o nombre del cliente" value="">
                                    </div>--}}

                                   {{-- <div class="form-group col">
                                        <input class="form-control"
                                               type="text"
                                               placeholder="CI. Teléfono. Email" value="">
                                    </div>--}}

                                    <div class="form-group col">
                                        <label> Vehículo </label>
                                        <input class="form-control"
                                               type="text"
                                               wire:model="vehiculo"
                                               readonly
                                               placeholder="Introduzca cedula o nombre del cliente"
                                               value="Kia Picanto 2015">
                                    </div>

                                    <div class="form-group col">
                                        <input class="form-control"
                                               type="text"
                                               wire:model="vehiculo_det"
                                               placeholder="CI. Teléfono. Email"
                                               readonly
                                               value="Color: Beige. Chapa CAA 799. Año 2019  ">
                                    </div>

                                    <div class="form-group col">
                                        <label> Fecha Entrega </label>
                                        <input class="form-control"
                                               type="datetime-local"
                                               value="2021-06-14T18:47"
                                               wire:model="fecha_entrega"
                                               readonly
                                               placeholder="">
                                    </div>

                                    <div class="form-group col">
                                        <label> Empleado </label>
                                        <input class="form-control"
                                               type="text"
                                               wire:model="empleado"
                                               readonly
                                               placeholder=""
                                               value="Eusebio Ayala">
                                    </div>
                                    <div class="form-group col">
                                        <label> Observación </label>
                                        <input class="form-control"
                                               type="text"
                                               wire:model="observacion"
                                               placeholder="">
                                    </div>

                                </div>

                                <div class="card-footer  ">
                                    <button
                                        @if (!$habilitarFinalizar)
                                            disabled
                                        @endif
                                        type="button"
                                        wire:click="finalizar"
                                        class="btn btn-info">Finalizar
                                    </button>
                                    <a href="{{ route('finalizados') }}" class="btn btn-secondary btn-close">Cancelar</a>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @push('pushed_styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @endpush
    @push('pushed_scripts')

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.js-example-basic-single').select2();
                $('.js-example-basic-single').on('change', function (e) {
                    var data = $('.js-example-basic-single').select2("val");
                @this.set('cliente_id', data);
                });
            });

        </script>
    @endpush
</div>
