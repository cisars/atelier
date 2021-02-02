@extends('adminlte::page')

@section('title', 'Listado de Empleado')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Empleados </li>
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
                        <h3 class="card-title">Empleados   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('empleado.create')}}" class="btn bg-cyan">Nuevo Empleado</a>
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{route('empleado.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="">Codigo </th>
                                <th class="">Nombres</th>
                                <th class="">Apellidos</th>
                                <th class="">CI</th>
                                <th class="">Estado Civil</th>
                                <th class="">Sexo</th>
                                <th class="">Direccion</th>
                                <th class="">Localidad</th>
                                <th class="">Movil</th>
                                <th class="">Telefono</th>
                                <th class="">Cargo</th>
                                <th class="">Turno</th>
                                <th class="">Grupo</th>
                                <th class="">Fecha Nacimiento</th>
                                <th class="">Fecha Ingreso</th>
                                <th class="">Estado</th>
                                <th class="">Fecha Egreso</th>
                                <th class="">Motivo Egreso</th>
                                <th class="">Salario</th>
                                <th class="">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($empleados as $key => $empleado)
                                <tr class="">
                                    <td>{{ $empleado->empleado }}</td>
                                    <td>{{ $empleado->nombres }}</td>
                                    <td>{{ $empleado->apellidos }}</td>
                                    <td>{{ $empleado->ci }}</td>
                                    <td>{{ $empleado->estado_civil }}</td>
                                    <td>{{ $empleado->sexo }}</td>
                                    <td>{{ $empleado->direccion }}</td>
                                    <td>{{ $empleado->localidad->descripcion }}</td>
                                    <td>{{ $empleado->movil }}</td>
                                    <td>{{ $empleado->telefono }}</td>
                                    <td>{{ $empleado->cargo->descripcion }}</td>
                                    <td>{{ $empleado->turno_empleado->descripcion }}</td>
                                    <td>{{ $empleado->grupo_trabajo->descripcion }}</td>
                                    <td>{{ $empleado->fecha_nacimiento }}</td>
                                    <td>{{ $empleado->fecha_ingreso }}</td>
                                    <td>{{ $empleado->estado }}</td>
                                    <td>{{ $empleado->fecha_egreso }}</td>
                                    <td>{{ $empleado->motivo_egreso }}</td>
                                    <td>{{ $empleado->salario }}</td>
                                    <td class="">
                                        <a
                                            href="{{ route('empleado.edit', $empleado->empleado) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$empleado->empleado}}"
                                            data-data   ="{{$empleado->empleado}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                            'pk'   => 'empleado',
                                            'value' => $empleado->empleado,
                                            'ruta'  => 'empleado.destroy',
                                        ]
                                        ?>
                                        @include('adminlte::partials.modals.confirmation',  $confirmation)
                                        {{--                                    <x-alertas :confirmation="$confirmation" ></x-alertas>--}}
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
