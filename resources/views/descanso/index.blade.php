<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Descansos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Descanso
// $nombres  = $gen->tabla['ZnombresZ'] descansos
// $nombre   = $gen->tabla['ZnombreZ'] descanso
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de Descansos')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Descansos </li>
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
                        <h3 class="card-title">Descansos   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('descanso.create')}}" class="btn bg-cyan">Nuevo Descanso</a>
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('descanso.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">ParametroID </th>
                                <th class="">Hora Desde </th>
                                <th class="">Hora Hasta </th>
                                <th class="">Acciones </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($descansos as $key => $descanso)
                                <tr class="">
                                    <td>{{ $descanso->parametro->id      }}</td>
                                    <td>{{ $descanso->desde      }}</td>
                                    <td>{{ $descanso->hasta      }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('descanso.edit', $descanso->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $descanso->id }}"
                                            data-data   ="{{ $descanso->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $descanso->id,
                                            'ruta'  => 'descanso.destroy',
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
