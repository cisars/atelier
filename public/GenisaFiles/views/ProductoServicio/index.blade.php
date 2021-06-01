<?php

?>
@extends('adminlte::page')
@section('title', 'Listado de ProductosServicios')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM ProductosServicios </li>
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
                        <h3 class="card-title">ProductosServicios   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('producto_servicio.create')}}" class="btn bg-cyan">Nuevo ProductoServicio</a>
                            @if( trim(Auth::user()->perfil) == 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('producto_servicio.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                                <tr>
                                    <th class="">Id </th>
                                    <th class="">Codigo </th>
                                    <th class="">Descripcion </th>
                                    <th class="">Clasificacion </th>
                                    <th class="">Unidad </th>
                                    <th class="">Impuesto </th>
                                    <th class="">Precio de Venta </th>
                                    <th class="">Estado </th>
                                    <th class="">Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($productos_servicios as $key => $producto_servicio)
                                <tr class="">
                                    <td>{{ $producto_servicio->id      }}</td>
                                    <td>{{ $producto_servicio->codigo      }}</td>
                                    <td>{{ $producto_servicio->descripcion      }}</td>
                                    <td>{{ $producto_servicio->clasificacion->descripcion      }}</td>
                                    <td>{{ $producto_servicio->unidad->descripcion      }}</td>
                                    <td>{{ $producto_servicio->impuesto      }}</td>
                                    <td>{{ $producto_servicio->precio_venta      }}</td>
                                    <td>{{ $producto_servicio->estado      }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('producto_servicio.edit', $producto_servicio->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $producto_servicio->id }}"
                                            data-data   ="{{ $producto_servicio->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $producto_servicio->id,
                                            'ruta'  => 'producto_servicio.destroy',
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