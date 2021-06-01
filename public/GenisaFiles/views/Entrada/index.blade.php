<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Entradas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Entrada
// $nombres  = $gen->tabla['ZnombresZ'] entradas
// $nombre   = $gen->tabla['ZnombreZ'] entrada
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Listado de Entradas')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Entradas </li>
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
                        <h3 class="card-title">Entradas   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('entrada.create')}}" class="btn bg-cyan">Nuevo Entrada</a>
                            @if( trim(Auth::user()->perfil) == 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('entrada.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                                <tr>
                                    <th class="">Id </th>
                                    <th class="">Taller </th>
                                    <th class="">OT </th>
                                    <th class="">Nro Documento </th>
                                    <th class="">Fecha </th>
                                    <th class="">Empleado </th>
                                    <th class="">Usuario </th>
                                    <th class="">Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($entradas as $key => $entrada)
                                <tr class="">
                                    <td>{{ $entrada->id      }}</td>
                                    <td>{{ $entrada->taller->descripcion      }}</td>
                                    <td>{{ $entrada->orden_trabajo->descripcion      }}</td>
                                    <td>{{ $entrada->numero_documento      }}</td>
                                    <td>{{ $entrada->fecha      }}</td>
                                    <td>{{ $entrada->empleado->apellidos      }}</td>
                                    <td>{{ $entrada->usuario->usuario      }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('entrada.edit', $entrada->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $entrada->id }}"
                                            data-data   ="{{ $entrada->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $entrada->id,
                                            'ruta'  => 'entrada.destroy',
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