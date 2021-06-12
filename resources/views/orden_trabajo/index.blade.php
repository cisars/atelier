<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] OrdenesTrabajos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] OrdenTrabajo
// $nombres  = $gen->tabla['ZnombresZ'] ordenes_trabajos
// $nombre   = $gen->tabla['ZnombreZ'] orden_trabajo
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de OrdenesTrabajos')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM OrdenesTrabajos</li>
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
                        <h3 class="card-title">OrdenesTrabajos </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            {{--                            <a  href="{{route('orden_trabajo.create')}}" class="btn bg-cyan">Nuevo OrdenTrabajo</a>--}}
                            {{--                            @if( trim(Auth::user()->perfil) == 'A' && trim(Auth::user()->perfil) != 'D' )--}}
                            {{--                                <a  href="{{route('orden_trabajo.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>--}}
                            {{--                            @endif--}}
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Id</th>
                                <th class="">Taller</th>
                                <th class="">Fecha de Recepcion</th>
                                {{--                                    <th class="">Fecha de Finalización </th>--}}
                                <th class="">Recepción</th>
                                <th class="">Cliente</th>
                                <th class="">Vehículo</th>
                                <th class="">Empleado</th>
                                <th class="">Grupo de Trabajo</th>
                                <th class="">Tipo</th>
                                <th class="">Prioridad</th>
                                <th class="">Estado</th>
                                {{--                                    <th class="">Descripción </th>--}}
                                <th class="">Importe Total</th>
                                <th class="">Usuario</th>
                                <th class="">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ordenes_trabajos as $key => $orden_trabajo)
                                @php
                                    $color_estado = '';
                                    switch ($orden_trabajo->estado){
                                          case 'Estado Pendiente':
                                            $color_estado = 'bg-info';
                                        break;
                                        case 'Estado Aceptado':
                                            $color_estado = 'bg-green';
                                        break;
                                        case 'Estado Cancelado':
                                            $color_estado = 'bg-red';
                                        break;
                                        case 'Estado Realizado':
                                            $color_estado = 'bg-yellow';
                                        break;
                                        case 'Estado Verificado':
                                            $color_estado = 'bg-orange';
                                        break;
                                        case 'Estado Finalizado':
                                            $color_estado = 'bg-gray';
                                        break;
                                    }
                                @endphp
                                <tr class="{{ $color_estado }}">
                                    <td>{{ $orden_trabajo->id      }}</td>
                                    <td>{{ $orden_trabajo->taller->descripcion      }}</td>
                                    <td>{{ $orden_trabajo->fecha_recepcion      }}</td>
                                    {{--                                    <td>{{ $orden_trabajo->fecha_fin      }}</td>--}}
                                    <td>{{ $orden_trabajo->recepcion->id      }}</td>
                                    <td>{{ $orden_trabajo->cliente->razon_social      }}</td>
                                    <td>{{ $orden_trabajo->vehiculo->id      }}</td>
                                    <td>{{ $orden_trabajo->empleado->apellidos      }}
                                        , {{ $orden_trabajo->empleado->nombres      }}</td>
                                    <td>{{ $orden_trabajo->grupo->descripcion      }}</td>
                                    <td>{{ $orden_trabajo->tipo      }}</td>
                                    <td>{{ $orden_trabajo->prioridad      }}</td>
                                    <td>{{ $orden_trabajo->estado      }}</td>
                                    {{--                                    <td>{{ $orden_trabajo->descripcion      }}</td>--}}
                                    <td>{{ number_format($orden_trabajo->importe_total, 0, ',','.') }} Gs.</td>
                                    <td>{{ $orden_trabajo->empleado->usuario      }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('orden_trabajo.edit', $orden_trabajo->id) }}"
                                            class="btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type="button"
                                            class="btn btn-danger"
                                            data-toggle="modal"
                                            data-target="#modal-danger{{ $orden_trabajo->id }}"
                                            data-data="{{ $orden_trabajo->id }}">
                                            <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php
                                        $confirmation = [
                                            'pk' => 'id',
                                            'value' => $orden_trabajo->id,
                                            'ruta' => 'orden_trabajo.destroy',
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
