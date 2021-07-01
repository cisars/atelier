<?php

?>
@extends('adminlte::page')
@section('title', 'Listado de OrdenesServicios')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM OrdenesServicios </li>
@stop

@section('content')

@if( !empty(session('msg')))
    @include('adminlte::partials.modals.alerts',['msg'=>session('msg'), 'type'=>session('type') ])
@endif

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">OrdenesServicios   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('orden_servicio.create')}}" class="btn bg-cyan">Nuevo OrdenServicio</a>
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('orden_servicio.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                                <tr>
                                    <th class="">Id </th>
                                    <th class="">OT </th>
                                    <th class="">Servicio </th>
                                    <th class="">Cantidad </th>
                                    <th class="">Descripción </th>
                                    <th class="">Realizado </th>
                                    <th class="">Verificado </th>
                                    <th class="">Fecha de Registro </th>
                                    <th class="">Usuario </th>
                                    <th class="">Descripción </th>
                                    <th class="">Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($ordenes_servicios as $key => $orden_servicio)
                                <tr class="">
                                    <td>{{ $orden_servicio->id      }}</td>
                                    <td>{{ $orden_servicio->orden_trabajo->descripcion      }}</td>
                                    <td>{{ $orden_servicio->servicio->descripcion      }}</td>
                                    <td>{{ $orden_servicio->cantidad      }}</td>
                                    <td>{{ $orden_servicio->descripcion      }}</td>
                                    <td>{{ $orden_servicio->realizado      }}</td>
                                    <td>{{ $orden_servicio->verificado      }}</td>
                                    <td>{{ $orden_servicio->fecha_registro      }}</td>
                                    <td>{{ $orden_servicio->usuario->usuario      }}</td>
                                    <td>{{ $orden_servicio->descripcion_verificacion      }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('orden_servicio.edit', $orden_servicio->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $orden_servicio->id }}"
                                            data-data   ="{{ $orden_servicio->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $orden_servicio->id,
                                            'ruta'  => 'orden_servicio.destroy',
                                        ]
                                        ?>
                                        @include('adminlte::partials.modals.confirmation',  $confirmation)

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
            <!-- /.col -->
            </div>
        </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection

@section('js')
    <script>
        // $('#modal-success').modal();
        // $("#modals-alerts").fadeTo(1500, 500).slideUp(500, function(){
        //     $("#modals-alerts").slideUp(500);
        // });
    </script>


@endsection
