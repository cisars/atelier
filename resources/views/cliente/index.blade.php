<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Clientes
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Cliente
// $nombres  = $gen->tabla['ZnombresZ'] clientes
// $nombre   = $gen->tabla['ZnombreZ'] cliente
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de Clientes')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Clientes </li>
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
                        <h3 class="card-title">Clientes   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('cliente.create')}}" class="btn bg-cyan">Nuevo Cliente</a>
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('cliente.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                                <tr>

                                    <th class="">Razon Social </th>
                                    <th class="">Documento </th>
                                    <th class="">Dirección </th>
                                    <th class="">Localidad </th>
                                    <th class="">Teléfono </th>
                                    <th class="">Móvil </th>
                                    <th class="">Fecha de Nacimiento </th>
                                    <th class="">Tipo de Personeria </th>
                                    <th class="w-10">Acción</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $key => $cliente)

                                <tr class="">
                                    <td>{{ $cliente->razon_social      }}</td>
                                    <td>{{ $cliente->documento      }}</td>
                                    <td>{{ $cliente->direccion      }}</td>
                                    <td>{{ $cliente->localidad_id      }}</td>
                                    <td>{{ $cliente->telefono      }}</td>
                                    <td>{{ $cliente->movil      }}</td>
                                    <td>{{ $cliente->fecha_nacimiento      }}</td>
                                    <td>{{ $cliente->personeria      }}</td>

                                    <td class="">
                                        <a
                                            href="{{ route('cliente.edit', $cliente->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $cliente->id }}"
                                            data-data   ="{{ $cliente->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                    <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $cliente->id,
                                            'ruta'  => 'cliente.destroy',
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
