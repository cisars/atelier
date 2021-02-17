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
@section('title', 'Salida Repuesto')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> ABM Salida Repuesto </li>
@stop
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-cyan">
                                <div class="card-header">
                                        <h3 class="card-title">Crear Salida Repuesto</h3>
                                </div>


                                <div class="card-body">

                                    {!! Form::open() !!}

                                    {{--<div class="form-row">--}}

                                        <div class="form-group col">
                                            <label> OT </label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   placeholder = "Introduzca codigo" value="1">
                                        </div>

                                        <div class="form-group col">
                                            <label> Fecha </label>
                                            <input class    = "form-control"
                                                   type     = "date"
                                                   placeholder="Introduzca descripcion" value="25/01/2021 07:30">
                                        </div>

                                        <div class="form-group col">
                                            <label> Cliente </label>
                                            <input class    = "form-control"
                                                   type     = "number"
                                                   placeholder="Introduzca descripcion" value="Juan Roblez">
                                        </div>


                                    <div class="form-group col">
                                        <label>Vehículo </label>
                                        <input class    = "form-control"
                                               type     = "text"
                                               placeholder="Introduzca descripcion" value="Toyota Platz">
                                    </div>




                                        <div class="form-group col">
                                            <label> Observación </label>
                                            <input class    = "form-control"
                                                   type     = "text"
                                                   placeholder="Introduzca impuesto" value="Orden de Salida 29663 ERP Concesionaria">
                                        </div>


                                    <label> Salida </label>
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
                                            <th class="">Sector     </th>
                                            <th class="">Repuesto   </th>
                                            <th class="">Medida     </th>
                                            <th class="">Cantidad   </th>
                                            <th class="">Registro   </th>
                                            <th class="">Mecánico   </th>
                                            <th class="">Acción   </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr class="">
                                            <td> Sector 1 </td>
                                            <td> Engranaje 3mm  </td>
                                            <td> Unidad </td>
                                            <td> 4.00  </td>
                                            <td> 19/01/2021 07:50 </td>
                                            <td> Edgar Lopez </td>


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
                                            <td> Sector 1 </td>
                                            <td> Aceite Castrol 20/50  </td>
                                            <td> Litros </td>
                                            <td> 0.75  </td>
                                            <td> 20/01/2021 07:50 </td>
                                            <td> Edgar Lopez </td>

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
                                            <td> Sector 1 </td>
                                            <td> Faro Trasero HY  </td>
                                            <td> Unidad </td>
                                            <td> 2.00  </td>
                                            <td> 19/01/2021 07:50 </td>
                                            <td> Edgar Lopez </td>

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
                                                class="btn btn-info">Grabar</button>
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
