<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Reservas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Reserva
// $nombres  = $gen->tabla['ZnombresZ'] reservas
// $nombre   = $gen->tabla['ZnombreZ'] reserva
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de Reservas')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Reservas </li>
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
                        <h3 class="card-title">Reservas   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('reserva.create')}}" class="btn bg-cyan">Nuevo Reserva</a>
                            @if( trim(Auth::user()->perfil) == 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('reserva.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Id </th>
                                <th class="">Taller </th>
                                <th class="">Cliente </th>
                                <th class="">Vehículo </th>
                                <th class="">Fecha </th>
                                <th class="">Para Fecha </th>
                                <th class="">Empleado </th>
                                <th class="">Estado </th>
                                <th class="">Forma Reserva </th>
                                <th class="">Prioridad </th>
                                <th class="">Observación </th>
                                <th class="">Usuario </th>
                                <th class="">Para Hora </th>
                                <th class="">Sector </th>
                                <th class="">Ticket </th>

                                <th class="">Acciones </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservas as $key => $reserva)
                                <tr class="">
                                    <td>{{ $reserva->id      }}</td>
                                    <td>{{ $reserva->taller->descripcion      }}</td>
                                    <td>{{ $reserva->cliente->razon_social      }}</td>
                                    <td>{{ $reserva->vehiculo->id      }}</td>
                                    <td>{{ $reserva->fecha      }}</td>
                                    <td>{{ $reserva->para_fecha      }}</td>
                                    <td>{{ $reserva->empleado->apellidos  ?? ''   }} {{ $reserva->empleado->nombres   ?? ''   }}</td>
                                    <td>{{ $reserva->estado      }}</td>
                                    <td>{{ $reserva->forma_reserva      }}</td>
                                    <td>{{ $reserva->prioridad      }}</td>
                                    <td>{{ $reserva->observacion      }}</td>
                                    <td>{{ $reserva->usuario      }}</td>
                                    <td>{{ $reserva->para_hora      }}</td>
                                    <td>{{ $reserva->sector      }}</td>
                                    <td>{{ $reserva->ticket      }}</td>

                                    <td class="">
                                        <a
                                            href="{{ route('reserva.edit', $reserva->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $reserva->id }}"
                                            data-data   ="{{ $reserva->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $reserva->id,
                                            'ruta'  => 'reserva.destroy',
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
