<div>
    <section class="py-3" style="background-color: #efe9ec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body" style="
                                    background-image:url('{{ asset('/img/fondo4.png') }}')  ;
                                    background-repeat: no-repeat;
                                    background-position: top right 20px ; ">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <div class="form-group ">
                                        <span class="text-maroon h3 "
                                              style="text-shadow: 1px 1px #FFF;"> Bienvenido, </span>
                                        <span class="text-bold h3 "
                                              style="text-shadow: 1px 1px #FFF;"> {{Auth::user()->usuario}} </span><br>
                                        <i class="fa fa-star text-maroon" style="text-shadow: 1px 1px #FFF;"></i> <span
                                            style="text-shadow: 1px 1px #FFF;"> {{Auth::user()->cliente->razon_social}} </span>
                                    </div>

                                    <div class="row pt-2">
                                        <!-- MultiStep Form -->
                                        <div class=" col-sm-12 col-md-6 col-lg-4   ">

                                            <div class="row">
                                                <div class="form-group col-4 ">
                                                    <label class="font-weight-normal text-maroon"
                                                           style="text-shadow: 1px 1px #FFF;">Tu vehículo</label>
                                                </div>
                                                @isset($vehiculo->id)
                                                    {!! Form::model($vehiculo, ['route' => ['vehiculo.update', $vehiculo->id], 'method' => 'PATCH']) !!}
                                                @else
                                                    {!! Form::open(
                                                        ['route' =>
                                                            ['vehiculo.store' ],
                                                                'method'    => 'post',
                                                                'id'        => 'form',
                                                            ]
                                                    ) !!}
                                                @endisset
                                                {{--FK Cliente--}}
                                                <div class="form-group row">
                                                    {!! Form::select(
                                                        'vehiculo_id',
                                                        $vehiculos
                                                        ,old('vehiculo_id') ,
                                                        [
                                                            'wire:model'    => 'vehiculo_id',
                                                            'class'         => 'form-control text-maroon',
                                                            'placeholder'   => 'Resumen de servicios',
                                                            'wire:change'   => 'changeOption()'
                                                            ]) !!}
                                                    @error("vehiculo_id")
                                                    <span class="text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {!! Form::close() !!}
                                            </div>

                                            <div class="btn-group col-md-12">
                                                <a wire:click="changeOption(1)"
                                                   class="btn btn-outline-danger col-4 btn-block @if($options == 1) active @endif @if(!$vehiculo_id) disabled @endif"
                                                   href="#">Inicio</a>
                                                <a wire:click="changeOption(2)"
                                                   class="btn btn-outline-danger col-4 @if($options == 2) active @endif @if(!$vehiculo_id) disabled @endif"
                                                   href="#">Diagnóstico</a>
                                                <a wire:click="changeOption(3)"
                                                   class="btn btn-outline-danger col-4 @if($options == 3) active @endif @if(!$vehiculo_id) disabled @endif"
                                                   href="#">Bitácora</a>
                                                <a wire:click="changeOption(4)"
                                                   class="btn btn-outline-danger col-4 btn-block @if($options == 4) active @endif @if(!$vehiculo_id) disabled @endif"
                                                   href="#">Vehículos
                                                </a>
                                                <!--                                                <a wire:model="options" value="1" class="btn btn-outline-danger col-4 btn-block" href="midiagnostico">Diagnóstico</a>
                                                                                                <a wire:model="options" value="2" class="btn btn-outline-danger col-4" href="lineatiempo">Bitácora</a>
                                                                                                <a wire:model="options" value="3" class="btn btn-outline-danger col-4 btn-block" href="misvehiculos">Vehículos
                                                                                                </a>-->
                                            </div>


                                            <div class="row ">
                                                <div class="col-md-12 mx-0">
                                                    <form id="msform">
                                                        <!-- progressbar -->
                                                        <ul id="progressbar">
                                                            <li class="active fa fa-key">
                                                                <strong class="person">
                                                                    Recepción</strong></li>
                                                            <li class="active fa fa-heart">
                                                                <strong class="person">
                                                                    Diagnóstico</strong></li>
                                                            <li class="active fa fa-business-time">
                                                                <strong class="person">
                                                                    Reparación</strong></li>
                                                            <li class="fa fa-check">
                                                                <strong class="person">
                                                                    Finalizado</strong></li>
                                                            <li class="fa fa-car"><strong class="person">
                                                                    Entrega</strong>
                                                            </li>
                                                        </ul> <!-- fieldsets -->

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-8 mt-lg-5  ">

                                            <div class="  "
                                                 style="background-color: #d81b60; height:100px; margin-top:28px">

                                                <p class="text-right text-white h1 pt-5"
                                                   style="text-shadow: 1px 1px #000;">
                                                    @if($options != 0)
{{--                                                        <span x-data="{show: false}" x-show.transition.duration.1000ms="show" x-init="setTimeout(() => { show = true })"  >{{ $mimarca . ', '. $mimodelo }}</span>--}}
                                                        {{ $mimarca . ', '. $mimodelo }}
                                                    @else
                                                        Resumen de Servicios
                                                    @endif
                                                </p>
                                                @if($options != 0)
                                                    <div class="text-sm text-maroon float-right right align-right">
                                                        <i class="fa fa-clock"></i> Servicio del
                                                        21 de Junio del 2020
                                                    </div>
                                                @else
                                                    <div class="text-sm text-maroon float-right right align-right">
                                                        <i class="fa fa-clock"></i> Fecha del servicio
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row pt-2   ">
                                        @if($options == 0)

                                            @foreach($client->vehiculos as $key => $vehiculo)
                                                <div class="card col-sm-4 ">
                                                    <div class="card-header  text-maroon">
                                                        <i class="fa fa-car"></i>
                                                        {{  $vehiculo->modelo->marca->descripcion }},
                                                        {{  $vehiculo->modelo->descripcion }}
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- MultiStep Form -->
                                                            <div class=" col-sm-12  ">
                                                                {{--                                    <h2><strong>Sign Up Your User Account</strong></h2>--}}
                                                                <table
                                                                    class="table table-hover table-striped text-nowrap table-sm  text-sm text-right">

                                                                    @foreach($vehiculo->reservas as $key2 => $res)

                                                                        <tr>
                                                                            <td class="text-maroon">
                                                                                <i class="fa fa-ticket-alt"></i> Ticket # {{$res->ticket}} | {{ date('d/m/Y', strtotime($res->para_fecha)) }}
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                        <tr>
                                                                            <td class="text-maroon">
                                                                                <i class="fa fa-clock"></i> -
                                                                            </td>
                                                                        </tr>
{{--                                                                    <tr>--}}
{{--                                                                        <td class="text-maroon">--}}
{{--                                                                            <i class="fa fa-clock"></i> 15 de Marzo del--}}
{{--                                                                            2019--}}
{{--                                                                        </td>--}}
{{--                                                                    </tr>--}}
{{--                                                                    <tr>--}}
{{--                                                                        <td class="text-maroon">--}}
{{--                                                                            <i class="fa fa-clock"></i> 19 de Diciembre--}}
{{--                                                                            del 2019--}}
{{--                                                                        </td>--}}
{{--                                                                    </tr>--}}
{{--                                                                    <tr>--}}
{{--                                                                        <td class="text-maroon bg-maroon">--}}
{{--                                                                            <i class="fa fa-clock"></i> 21 de Junio del--}}
{{--                                                                            2020 <i class="fa fa-hand-point-left"></i>--}}
{{--                                                                            (ACTUAL)--}}
{{--                                                                        </td>--}}
{{--                                                                    </tr>--}}
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                                <div class="card col-sm-4 ">

                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- MultiStep Form -->
                                                            <div class=" col-sm-12 btn btn-outline-danger  p-5 " wire:click="newCar()">
                                                                 <button class="form-control text-maroon  "  > <i class=" fa fa-plus-circle"></i> Agregar Vehículo </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card  col-sm-12">
                                                    <div class="card-body">
                                                        <div class="   text-maroon text-center  "
                                                             style="background-color: #efe9ec">
                                                            <br>
                                                            Por favor selecciona un vehículo. <br> Ante
                                                            cualquier duda comunícate con nosotros en la línea directa
                                                            <br><br>
                                                        </div>
                                                    </div>
                                                </div>


                                        @endif
                                        @if($options == 1)
                                            <div class="col-md-4">
{{$mivehiculo}}

                                                <div class="col-md-12">
                                                    <div class="card card-maroon card-outline">

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="card-title  text-maroon">
                                                                    <img src="{{ asset('/img/icono1.png') }}"
                                                                         class="figure-img">
                                                                    Síntomas de Ingreso
                                                                </div>
                                                                <!-- MultiStep Form -->
                                                                <div class=" col-sm-12  ">
                                                                    <table
                                                                        class="table table-hover text-nowrap table-sm text-sm">

                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <i class="fa fa-check text-maroon"></i>
                                                                                Sin
                                                                                datos
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                -
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                -
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="card card-maroon card-outline">

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="card-title  text-maroon">
                                                                    <img src="{{ asset('/img/icono2.png') }}"
                                                                         class="figure-img">
                                                                    Diagnóstico del Taller
                                                                </div>
                                                                <!-- MultiStep Form -->
                                                                <div class=" col-sm-12  ">
                                                                    <table
                                                                        class="table table-hover text-nowrap table-sm text-sm">

                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <i class="fa fa-check text-maroon"></i>
                                                                                Sin
                                                                                datos
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                -
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                -
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header  text-maroon">
                                                        <i class="fa fa-user"></i>
                                                        Recepcionista
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- MultiStep Form -->
                                                            <div class=" col-sm-12  ">
                                                                {{--                                    <h2><strong>Sign Up Your User Account</strong></h2>--}}
                                                                <div class=" col-12  pull-right align-right">
                                                                    <h5>Miguel Pozo</h5>
                                                                </div>
                                                                <table
                                                                    class="table table-hover text-nowrap table-sm  text-sm">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Correo
                                                                        </td>
                                                                        <td>
                                                                            mpozo@atelier.com
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Hora recepción
                                                                        </td>
                                                                        <td>
                                                                            00:00 hs
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Observaciones
                                                                        </td>
                                                                        <td>
                                                                            -
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header  text-maroon">
                                                        <i class="fa fa-user"></i>
                                                        Historial
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- MultiStep Form -->
                                                            <div class=" col-sm-12  ">
                                                                <table
                                                                    class="table table-hover table-striped text-nowrap table-sm  text-sm">

                                                                        @php setlocale(LC_TIME,"es_ES"); @endphp
                                                                    @foreach($mivehiculo->reservas as $key => $res)
                                                                        <tr>
                                                                            <td class="text-maroon">
                                                                                <i class="fa fa-ticket-alt"></i> Ticket  {{ $res->ticket }} {{ date('H:i', strtotime($res->para_hora)) }} {{ date('d/m/Y', strtotime($res->para_fecha)) }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            <i class="fa fa-clock"></i> 15 de Marzo del
                                                                            2019
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            <i class="fa fa-clock"></i> 19 de Diciembre
                                                                            del 2019
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon bg-maroon">
                                                                            <i class="fa fa-clock"></i> 21 de Junio del
                                                                            2020 <i class="fa fa-hand-point-left"></i>
                                                                            (ACTUAL)
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header  text-maroon">
                                                        <i class="fa fa-car"></i>
                                                        Ficha del Vehiculo
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- MultiStep Form -->
                                                            <div class=" col-sm-12  ">
                                                                {{--                                    <h2><strong>Sign Up Your User Account</strong></h2>--}}
                                                                <table
                                                                    class="table table-hover text-nowrap table-sm  text-sm">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Marca
                                                                        </td>
                                                                        <td class="text-bold  " align="right">
                                                                            @if($mimarca) {{$mimarca}} @else {{'-'}} @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Modelo
                                                                        </td>
                                                                        <td class="text-bold  " align="right">
                                                                            @if($mimodelo) {{$mimodelo}} @else {{'-'}} @endif
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Chapa
                                                                        </td>
                                                                        <td class="text-bold  " align="right">
                                                                            @if($mivehiculo->chapa) {{$mivehiculo->chapa}} @else {{'-'}} @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Chasis
                                                                        </td>
                                                                        <td class="text-bold  " align="right">
                                                                            @if($mivehiculo->chasis) {{$mivehiculo->chasis}} @else {{'-'}} @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Color
                                                                        </td>
                                                                        <td class="text-bold  " align="right">
                                                                            @if($micolor) {{$micolor}} @else {{'-'}} @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Combustion
                                                                        </td>
                                                                        <td class="text-bold  " align="right">
                                                                            @if($micombustion) {{$micombustion}} @else {{'-'}} @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Tipo
                                                                        </td>
                                                                        <td class="text-bold  " align="right">
                                                                            @if($mitipo) {{$mitipo}} @else {{'-'}} @endif
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            Año
                                                                        </td>
                                                                        <td class="text-bold  " align="right">
                                                                            @if($mivehiculo->año) {{$mivehiculo->año}} @else {{'-'}} @endif
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                        @if($options == 2)
                                            <div class="col-md-12">
                                                {{-- Diagnostico del taller--}}
                                                <div class="card card-maroon">
                                                    <div class="card-header   ">
                                                        <i class="fa fa-clipboard-check"></i>
                                                        Diagnostico del taller
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- MultiStep Form -->
                                                            <div class=" col-sm-12  ">
                                                                {{--                                    <h2><strong>Sign Up Your User Account</strong></h2>--}}
                                                                <table class="table table-hover text-nowrap  ">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            <i class="fa fa-arrow-right"></i> Item
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            <i class="fa fa-arrow-right"></i> Item
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            <i class="fa fa-arrow-right"></i> Item
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            <i class="fa fa-arrow-right"></i> Item
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-maroon">
                                                                            <i class="fa fa-arrow-right"></i> Item
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--Presupuesto--}}
                                                <div class="card card-maroon">
                                                    <div class="card-header   ">
                                                        <i class="fa fa-car"></i>
                                                        Presupuesto segun O.T. Nro #352
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- MultiStep Form -->
                                                            <div class=" col-sm-12  ">
                                                                <div class="form-group">Asunción, 17 de abril del 2020
                                                                </div>
                                                                {{--                                    <h2><strong>Sign Up Your User Account</strong></h2>--}}
                                                                <table
                                                                    class="table table-hover text-nowrap table-striped  ">

                                                                    <thead>
                                                                    <th class="w-75">Descripción</th>
                                                                    <th class="w-25">Monto</th>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <i class="fa fa-check-square text-maroon"></i>
                                                                            Item
                                                                        </td>
                                                                        <td>
                                                                            0 Gs.
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <i class="fa fa-check-square  text-maroon"></i>
                                                                            Item
                                                                        </td>
                                                                        <td>
                                                                            0 Gs.
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <i class="fa fa-check-square  text-maroon"></i>
                                                                            Item
                                                                        </td>
                                                                        <td>
                                                                            0 Gs.
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <i class="fa fa-check-square  text-maroon"></i>
                                                                            Item
                                                                        </td>
                                                                        <td>
                                                                            0 Gs.
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <i class="text-bold"></i> Total
                                                                        </td>
                                                                        <td>
                                                                            <i class="text-bold"></i> 0 Gs.
                                                                        </td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($options == 3)
                                            <div class="col-12">
                                                <!-- The time line -->
                                                <div class="timeline">
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-maroon">10 Feb. 2021</span>
                                                    </div>
                                                    <!-- /.timeline-label -->

                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-maroon"></i>
                                                        <i class="fas fa-key bg-maroon"></i>
                                                        <div class="timeline-item " style="background-color: #efe9ec">
                                                            <span class="time"><i class="fas fa-clock"></i> 10:35</span>
                                                            <h3 class="timeline-header"><a href="#">Recepción</a> del
                                                                vehículo
                                                            </h3>

                                                            <div class="timeline-body">
                                                                - Hora de entrada 10:35hs <br>
                                                                - Recepcionista encargado fue <a href="#"> Carlos
                                                                    Torres</a> <br>
                                                                - Síntomas de entrada: Síntoma 1, Síntoma 2, Síntoma 3
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-heart bg-maroon"></i>
                                                        <div class="timeline-item" style="background-color: #efe9ec">
                                                            <span class="time"><i class="fas fa-clock"></i> 12:02</span>
                                                            <h3 class="timeline-header no-border"><a href="#">Diagnóstico</a>
                                                                del taller realizado </h3>
                                                            <div class="timeline-body">
                                                                - Problema 1 <br>
                                                                - Problema 2 <br>
                                                                - Problema 3 <br>
                                                                - Problema 4
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-maroon"></i>
                                                        <div class="timeline-item" style="background-color: #efe9ec">
                                                            <span class="time"><i class="fas fa-clock"></i> 12:30</span>
                                                            <h3 class="timeline-header no-border">Se le envio un <a
                                                                    href="#">Presupuesto</a></h3>
                                                            <div class="timeline-body">
                                                                - Clic aqui para acceder al <a href="#"> Presupuesto</a>
                                                                <br>
                                                                - Estado de la OT: <B>PENDIENTE</B>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-maroon"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 12:47</span>
                                                            <h3 class="timeline-header no-border"><a href="#">
                                                                    Presupuesto </a> <B>APROBADO</B>. Correo de
                                                                Confirmación </h3>

                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-business-time bg-maroon"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 13:45</span>
                                                            <h3 class="timeline-header"> Inicio del servicio
                                                            </h3>
                                                            <div class="timeline-body">
                                                                <em>Durante el servicio, si se encuentra alguna falla
                                                                    adicional será consultado antes de tomar cualquier
                                                                    acción</em>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-maroon">11 Feb. 2021</span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-maroon"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 09:40</span>
                                                            <h3 class="timeline-header"><a href="#"> Realización de
                                                                    Servicios </a> . Correo de notificación
                                                            </h3>
                                                            <div class="timeline-body">
                                                                Concluyeron los trabajos de reparación/mantenimiento. Se
                                                                aguarda la verificación de las tareas por parte del
                                                                jefe de mecánicos
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-check bg-maroon"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 09:40</span>
                                                            <h3 class="timeline-header"> Servicios verificados
                                                                satisfactoriamente
                                                            </h3>

                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-maroon"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 09:50</span>
                                                            <h3 class="timeline-header"><a href="#"> Verificación de
                                                                    Servicios </a> Notificación por correo
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-maroon"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 10:10</span>
                                                            <h3 class="timeline-header"><a href="#"> Cierre de O.T. </a>
                                                                Notificación por correo.
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-clock bg-maroon"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 11:20</span>
                                                            <h3 class="timeline-header"> Pendiente de pago
                                                            </h3>

                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-check bg-maroon"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 11:40</span>
                                                            <h3 class="timeline-header"> Pago realizado. Gracias!
                                                            </h3>

                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-car bg-maroon"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 15:40</span>
                                                            <h3 class="timeline-header"> El vehículo ah sido retirado
                                                                del taller!
                                                            </h3>

                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->

                                                    <div>
                                                        <i class="fas fa-user bg-gray"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($options == 5)

                                            <div class="col-lg-12">
                                                <div class="card  ">
                                                    <div class="card-header text-maroon">
                                                        <h3 class="card-title"><i class="fa fa-pen-alt"></i> Nuevo
                                                            Vehículo</h3>
                                                    </div>
                                                    <form wire:submit.prevent="submitVehiculo"  >
                                                        @csrf
                                                        <div class="card-body">

                                                            {{-- FK2 Select--}}
                                                            <div class="form-group">
                                                                <label for="modelo">Marca/Modelo</label>
                                                                <select
                                                                    class="form-control"
                                                                    name="modeloSel"
                                                                    id="modeloSel"
                                                                    wire:model="modeloSel"
                                                                >
                                                                    <option value="">Seleccione modelo</option>
                                                                    @foreach($losModelos as $key => $modelo)
                                                                        <option
                                                                            value="{{ $modelo->id }}"
                                                                            {{ old('modeloSel') == $modelo->modelo ? 'selected' : '' }}
                                                                        >
                                                                            {{ $modelo->marca->descripcion }},
                                                                            {{ $modelo->descripcion }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @foreach ($errors->get('modeloSel') as $error)
                                                                    <span class="text text-danger">{{ $error }}</span>
                                                                @endforeach
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="chapaSel">Chapa</label>
                                                                <input
                                                                    class="form-control"
                                                                    maxlength="12"
                                                                    type="text"
                                                                    name="chapaSel"
                                                                    id="chapaSel"
                                                                    value="{{ old('chapaSel') }}"
                                                                    placeholder="Chapa"
                                                                    wire:model="chapaSel"
                                                                >
                                                                @foreach ($errors->get('chapaSel') as $error)
                                                                    <span class="text text-danger">{{ $error }}</span>
                                                                @endforeach
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="chasisSel">Chasis</label>
                                                                <input
                                                                    class="form-control"
                                                                    maxlength="12"
                                                                    type="text"
                                                                    name="chasisSel"
                                                                    id="chasisSel"
                                                                    value="{{ old('chasisSel') }}"
                                                                    placeholder="Chasis"
                                                                    wire:model="chasisSel"
                                                                >
                                                                @foreach ($errors->get('chasisSel') as $error)
                                                                    <span class="text text-danger">{{ $error }}</span>
                                                                @endforeach
                                                            </div>

                                                            {{-- FK3 Select--}}
                                                            <div class="form-group">
                                                                <label for="colorSel">Color</label>
                                                                <select
                                                                    class="form-control"
                                                                    wire:model="colorSel"
                                                                >
                                                                    <option value="-1">Seleccione color</option>
                                                                    @foreach($losColores as $key => $color)
                                                                        <option value="{{ $color->id }}" >{{ $color->descripcion }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                            {{--CONST Estado1--}}
                                                            <div class="form-group col">
                                                                <label for="combustionSel">Combustion</label>
                                                                <select
                                                                    class="form-control"
                                                                    name="combustionSel"
                                                                    id="combustionSel"
                                                                    wire:model="combustionSel"
                                                                >
                                                                    <option value="">Seleccione Combustion</option>
                                                                    @foreach($lasCombustiones as $key => $combustion)
                                                                        <option
                                                                            value="{{ $combustion }}"
                                                                            {{ old('combustionSel') == $combustion ? 'selected' : '' }}
                                                                        >{{ $key }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @foreach ($errors->get('combustionSel') as $error)
                                                                    <span class="text text-danger">{{ $error }}</span>
                                                                @endforeach
                                                            </div>

                                                            {{--CONST Estado2--}}
                                                            <div class="form-group col">
                                                                <label for="tipoSel">Tipo</label>
                                                                <select
                                                                    class="form-control"
                                                                    name="tipoSel"
                                                                    id="tipoSel"
                                                                    wire:model="tipoSel"
                                                                >
                                                                    <option value="">Seleccione Tipo</option>
                                                                    @foreach($losTipos as $key => $tipo)
                                                                        <option
                                                                            value="{{ $tipo }}"
                                                                            {{ old('tipoSel') == $tipo ? 'selected' : '' }}
                                                                        >{{ $key }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @foreach ($errors->get('tipoSel') as $error)
                                                                    <span class="text text-danger">{{ $error }}</span>
                                                                @endforeach
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="anoSel">Año</label>
                                                                <input
                                                                    class="form-control"
                                                                    maxlength="12"
                                                                    type="text"
                                                                    name="anoSel"
                                                                    id="anoSel"
                                                                    value="{{ old('anoSel') }}"
                                                                    placeholder="Año"
                                                                    wire:model="anoSel"
                                                                >
                                                                @foreach ($errors->get('anoSel') as $error)
                                                                    <span class="text text-danger">{{ $error }}</span>
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                        <div class="card-footer">
                                                            <button
                                                                type="submit"
                                                                class="btn bg-maroon"><i class="fa fa-plus"></i> Agregar
                                                            </button>
                                                            <a  wire:click="changeOption(0)"
                                                               class="btn btn-secondary btn-close">Cancelar</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                        @if($options == 4)
                                            <div class="col-lg-12">
                                                <div class="card card-maroon">
                                                    <div class="card-header   ">
                                                        <i class="fa fa-car"></i>
                                                        Mis Vehículos
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <a href="{{route('mivehiculo')}}" class="btn bg-maroon">Nuevo
                                                                Vehiculo</a>

                                                        </div>

                                                        <table class="table table-sm table-hover nowrap d-table"
                                                               id="lista">
                                                            <thead class="">
                                                            <tr>
                                                                {{--                                                                <th class="w-10">Código </th>--}}
                                                                {{--                                                                <th class="">Cliente</th>--}}
                                                                <th class="">Modelo</th>
                                                                <th class="">Chapa</th>
                                                                <th class="">Chasis</th>
                                                                <th class="">Color</th>
                                                                <th class="">Combustion</th>
                                                                <th class="">Tipo</th>
                                                                <th class="">Año</th>
                                                                <th class="w-10">Acción</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($client->vehiculos as $key => $vehiculo)
                                                                <tr>
                                                                    {{--                                                                    <td>{{ $vehiculo->id }}</td>--}}
                                                                    {{--                                                                    <td>--}}

                                                                    {{--                                                                        {{ $vehiculo->cliente->razon_social }}--}}
                                                                    {{--                                                                    </td>--}}
                                                                    <td>
                                                                        {{  $vehiculo->modelo->descripcion }}
                                                                    </td>
                                                                    <td>{{ $vehiculo->chapa }}</td>
                                                                    <td>{{ $vehiculo->chasis }}</td>
                                                                    <td>
                                                                        {{ $vehiculo->color->descripcion }}
                                                                    </td>
                                                                    <td>{{ $vehiculo->fuel }}</td>
                                                                    <td>{{ $vehiculo->type }}</td>
                                                                    <td>{{ $vehiculo->año }}</td>
                                                                    <td class=" ">
                                                                        <a
                                                                            href="{{ route('vehiculo.edit', $vehiculo->id) }}"
                                                                            class="btn btn-warning">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <button
                                                                            type="button"
                                                                            class="btn btn-outline-danger"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-danger{{$vehiculo->id}}"
                                                                            data-data="{{$vehiculo->id}}">
                                                                            <i class="fas fa-trash-alt"
                                                                               aria-hidden="true"></i>
                                                                        </button>
                                                                        <?php
                                                                        $confirmation = [
                                                                            'pk' => 'id',
                                                                            'value' => $vehiculo->id,
                                                                            'ruta' => 'vehiculo.destroy',
                                                                        ]
                                                                        ?>
                                                                        @include('adminlte::partials.modals.confirmation',  $confirmation)
                                                                        {{--                                    <x-alertas :confirmation="$confirmation" ></x-alertas>--}}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>

                                                        <!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                            </div>
                                        @endif
                                    </div>{{--  fin contenido--}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
