<?php

?>
@extends('adminlte::page')
@section('title', 'Listado de EmpleadosMaquinas')
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM EmpleadosMaquinas </li>
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
                        <h3 class="card-title">EmpleadosMaquinas   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('empleado_maquina.create')}}" class="btn bg-cyan">Nuevo EmpleadoMaquina</a>
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('empleado_maquina.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Empleado </th>
                                <th class="">Maquinaria </th>
                                <th class="">Observación </th>
                                <th class="">Acciones </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($empleados_maquinas as $key => $empleado_maquina)
                                <tr class="">
                                    <td>{{ $empleado_maquina->empleado->apellidos      }}</td>
                                    <td>{{ $empleado_maquina->maquinaria->descripcion      }}</td>
                                    <td>{{ $empleado_maquina->observacion      }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('empleado_maquina.desasignar', [$empleado_maquina->empleado_id, $empleado_maquina->maquinaria_id ]) }}"
                                            class= "btn btn-danger">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </a>
                                       {{-- <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{ $empleado_maquina->id }}"
                                            data-data   ="{{ $empleado_maquina->id }}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>--}}

                                        <?php
                                        $confirmation = [
                                            'pk'   => 'id',
                                            'value' => $empleado_maquina->id,
                                            'ruta'  => 'empleado_maquina.destroy',
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
