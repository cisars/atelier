<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Parametros
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Parametro
// $nombres  = $gen->tabla['ZnombresZ'] parametros
// $nombre   = $gen->tabla['ZnombreZ'] parametro
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de Parametros')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Parametros </li>
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
                        <h3 class="card-title">Parametros   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('parametro.create')}}" class="btn bg-cyan">Nuevo Parametro</a>
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('parametro.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Id </th>
                                <th class="">Descripción </th>
                                <th class="">Total Prioridades Altas </th>
                                <th class="">Jefe Mecanicos Def </th>
                                <th class="">Periodicidad Min. </th>
                                <th class="">Cantidad de Sectores </th>
                                <th class="">Hora de Apertura </th>
                                <th class="">Hora de Cierre </th>
                                <th class="">Hora de Apertura Sabado </th>
                                <th class="">Hora de Cierre Sabado </th>
                                <th class="">Activo </th>
                                <th class="">Acciones </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($parametros as $key => $parametro)
                                <tr class="">
                                    <td>{{ $parametro->id      }}</td>
                                    <td>{{ $parametro->descripcion      }}</td>
                                    <td>{{ $parametro->cantidad_prioridad_alta      }}</td>
                                    <td>{{ $parametro->jefe_mecanicos      }}</td>
                                    <td>{{ $parametro->periodicidad      }}</td>
                                    <td>{{ $parametro->sectores      }}</td>
                                    <td>{{ $parametro->hora_apertura      }}</td>
                                    <td>{{ $parametro->hora_cierre      }}</td>
                                    <td>{{ $parametro->hora_apertura_sab      }}</td>
                                    <td>{{ $parametro->hora_cierre_sab      }}</td>
                                    <td>{{ $parametro->activo      }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('parametro.edit', $parametro->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $parametro->id }}"
                                            data-data   ="{{ $parametro->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $parametro->id,
                                            'ruta'  => 'parametro.destroy',
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
