<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Feriados
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Feriado
// $nombres  = $gen->tabla['ZnombresZ'] feriados
// $nombre   = $gen->tabla['ZnombreZ'] feriado
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de Feriados')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Feriados </li>
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
                        <h3 class="card-title">Feriados   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('feriado.create')}}" class="btn bg-cyan">Nuevo Feriado</a>
                            @if( trim(Auth::user()->perfil) == 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('feriado.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Id </th>
                                <th class="">Día </th>
                                <th class="">Mes </th>
                                <th class="">Descripción </th>
                                <th class="">Estado </th>
                                <th class="">Acciones </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feriados as $key => $feriado)
                                <tr class="">
                                    <td>{{ $feriado->id      }}</td>
                                    <td>{{ $feriado->dia      }}</td>
                                    <td>{{ $feriado->mes      }}</td>
                                    <td>{{ $feriado->descripcion      }}</td>
                                    <td>{{ $feriado->estado      }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('feriado.edit', $feriado->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $feriado->id }}"
                                            data-data   ="{{ $feriado->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $feriado->id,
                                            'ruta'  => 'feriado.destroy',
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
