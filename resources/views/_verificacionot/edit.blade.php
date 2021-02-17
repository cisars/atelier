<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ProductosServicios
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] ProductoServicio
// $nombres  = $gen->tabla['ZnombresZ'] productos_servicios
// $nombre   = $gen->tabla['ZnombreZ'] producto_servicio
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Verificación OT')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/Reservas "> Verificación</a></li>
    <li class="breadcrumb-item active"> ABM Verificación OT</li>
@stop
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card card-cyan">
                                <div class="card-header">
                                    <h3 class="card-title">Crear Verificación OT</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label> OT </label>
                                            <input class="form-control"
                                                   type="text"
                                                   placeholder="Introduzca codigo" value="1">
                                        </div>
                                        <div class="form-group col">
                                            <label> Fecha </label>
                                            <input class="form-control"
                                                   type="date"
                                                   placeholder="" value="">
                                        </div>


                                    </div>
                                    <div class="form-group col">
                                        <label> Cliente </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder="Introduzca cedula o nombre del cliente" value="">
                                    </div>


                                    <div class="form-group col">

                                        <input class="form-control"
                                               type="text"
                                               placeholder="CI. Teléfono. Email" value="">
                                    </div>

                                    <div class="form-group col">
                                        <label> Vehículo </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder="Introduzca cedula o nombre del cliente"
                                               value="Kia Picanto 2015">
                                    </div>
                                    <div class="form-group col">

                                        <input class="form-control"
                                               type="text"
                                               placeholder="CI. Teléfono. Email"
                                               value="Color: Gris. 4 puertas. Naftero.
		                                        Placa CAA 2656. Chasis 202014522">
                                    </div>

                                         <div class="form-group col">
                                            <label> Estado </label>
                                            <select class="form-control">
                                                <option value="" selected> Seleccione estado</option>
                                                <option value=""> opcion 1</option>
                                            </select>
                                        </div>





                                    <label> Entrada 1 </label>
                                    <div class="form-row col ">
                                        <div class="form-group col ">
                                            <button
                                                type        ="button"
                                                class       ="btn btn-warning " >
                                                <i class ="fas fa-plus" > DET</i>
                                            </button>
                                            <button
                                                type        ="button"
                                                class       ="btn btn-warning  " >
                                                <i class ="fas fa-minus" > DET</i>
                                            </button>
                                        </div>
                                    </div>
                                    <table class="table table-sm table-hover nowrap d-table" id="lista">
                                        <thead class="">
                                        <tr>
                                            <th class="">#     </th>
                                            <th class="">Servicio   </th>
                                            <th class="">Verificado     </th>
                                            <th class="">Fecha   </th>
                                            <th class="">Mecánico    </th>
                                            <th class="">Verificador    </th>
                                            <th class="">Observación   </th>
                                            <th class="">Acción   </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr class="">
                                            <td> 1 </td>
                                            <td> Limpieza de Filtro Motor  </td>
                                            <td> v </td>
                                            <td> 18/01/2021 15:45  </td>
                                            <td> Juan Villalba</td>
                                            <td> Juan Sosa</td>
                                            <td> OK </td>


                                            <td class="">
                                                <a
                                                    href=" "
                                                    class= "btn btn-info">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button
                                                    type        ="button"
                                                    class       ="btn btn-danger"
                                                    data-toggle ="modal"
                                                    data-target ="#modal-danger "
                                                    data-data   ="">
                                                    <i class ="fas fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <button
                                                    type        ="button"
                                                    class       ="btn btn-warning  " >
                                                    <i class ="fas fa-plus" ></i>
                                                </button>

                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>   2 </td>
                                            <td> Cambio de Aceite </td>
                                            <td> x </td>
                                            <td> 18/01/2021 15:45 </td>
                                            <td> Roque Saucedo  </td>
                                            <td> Juan Sosa</td>
                                            <td> Se detecto suciedad  </td>

                                            <td class="">
                                                <a
                                                    href=" "
                                                    class= "btn btn-info">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button
                                                    type        ="button"
                                                    class       ="btn btn-danger"
                                                    data-toggle ="modal"
                                                    data-target ="#modal-danger "
                                                    data-data   ="">
                                                    <i class ="fas fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <button
                                                    type        ="button"
                                                    class       ="btn btn-warning  " >
                                                    <i class ="fas fa-plus" ></i>
                                                </button>

                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td> 3 </td>
                                            <td> Mant. Sensor Arranque  </td>
                                            <td> v </td>
                                            <td> 18/01/2021 15:45 </td>
                                            <td> Alicia Vera </td>
                                            <td> Juan Sosa</td>
                                            <td> OK  </td>

                                            <td class="">
                                                <a
                                                    href=" "
                                                    class= "btn btn-info">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button
                                                    type        ="button"
                                                    class       ="btn btn-danger"
                                                    data-toggle ="modal"
                                                    data-target ="#modal-danger "
                                                    data-data   ="">
                                                    <i class ="fas fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <button
                                                    type        ="button"
                                                    class       ="btn btn-warning  " >
                                                    <i class ="fas fa-plus" ></i>
                                                </button>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>



                                </div>

                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar
                                        </button>
                                        <a href="" class="btn btn-secondary btn-close">Cancelar</a>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
@endsection

@section('js')

    <script>
    </script>
@endsection
