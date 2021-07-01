<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Recepciones
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Recepcion
// $nombres  = $gen->tabla['ZnombresZ'] recepciones
// $nombre   = $gen->tabla['ZnombreZ'] recepcion
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de Recepciones   ')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Recepciones    </li>
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
                        <h3 class="card-title">Recepciones      </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('recepcion.create')}}" class="btn bg-cyan">Nueva Recepción</a>
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('recepcion.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Id </th>
                                <th class="">Taller </th>
                                <th class="">Reserva </th>
                                <th class="">Cliente </th>
                                <th class="">Vehiculo </th>
                                <th class="">Fecha Recepción </th>
                                <th class="">Recepcionista </th>
                                <th class="">Acciones </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recepciones as $key => $recepcion)
                                <tr class="">
                                    <td>{{ $recepcion->id      }}</td>
                                    <td>{{ $recepcion->taller->descripcion      }}</td>
                                    <td>Id.{{ $recepcion->reserva->id }} #{{ $recepcion->reserva->ticket }} </td>
                                    <td>{{ $recepcion->cliente->razon_social      }}</td>
                                    <td>
                                        {{ $recepcion->vehiculo->modelo->marca->descripcion }},
                                        {{ $recepcion->vehiculo->modelo->descripcion }} </td>
                                    <td>{{ $recepcion->fecha_recepcion      }}</td>
                                    <td>{{ $recepcion->usuario      }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('recepcion.edit', $recepcion->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $recepcion->id }}"
                                            data-data   ="{{ $recepcion->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $recepcion->id,
                                            'ruta'  => 'recepcion.destroy',
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
