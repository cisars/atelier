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
@section('title', 'Finalizacion de OT')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/Reservas "> Finalizacion </a></li>
    <li class="breadcrumb-item active"> ABM Finalizacion de OT</li>
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
                                    <h3 class="card-title">Crear Finalizacion de OT</h3>
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
                                                   placeholder=""
                                                   value="17/01*2021 12:30">
                                        </div>


                                    </div>
                                    <div class="form-group col">
                                        <label> Cliente </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder="Introduzca cedula o nombre del cliente"
                                               value="Juan Robles. ">
                                    </div>
                                    <div class="form-group col">

                                        <input class="form-control"
                                               type="text"
                                               placeholder=""
                                               value="CI 825396. Telefono 0981562356. Emailjroblez@gmail">
                                    </div>

                                    <div class="form-group col">
                                        <label> Vehiculo </label>
                                        <input class="form-control"
                                               type="text"
                                               placeholder="Introduzca cedula o nombre del cliente"
                                               value="Toyota Platz">
                                    </div>
                                    <div class="form-group col">

                                        <input class="form-control"
                                               type="text"
                                               placeholder="CI. Telefono. Email"
                                               value="Color: Gris plata. Placa CAA 2563. Año 2019">
                                    </div>

                                         <div class="form-group col">
                                            <label> Estado </label>
                                            <select class="form-control">
                                                <option value="" selected> Verificado</option>
                                                <option value=""> opcion 1</option>
                                            </select>
                                        </div>





                                    <label> A finalizar </label>
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
                                            <th class="">Mecanico    </th>
                                            <th class="">Verificador   </th>
                                            <th class="">Observacion   </th>
                                            <th class="">Accion   </th>
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
                                            <td> v </td>
                                            <td> 18/01/2021 15:45 </td>
                                            <td> Roque Saucedo  </td>
                                            <td> Juan Sosa</td>
                                            <td> OK!   </td>

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
