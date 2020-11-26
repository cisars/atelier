@extends('adminlte::page')

@section('title', 'Listado de Reserva')

@section('css' )

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
                            <a  href="{{route('reserva.create')}}" class="btn bg-cyan">Nueva Reserva</a>
                            @if( trim(Auth::user()->perfil) == 'A' )
                            <a  href="{{route('reserva.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Codigo </th>
                                <th class="">Descripcion</th>
                                <th class="">Taller</th>
                                <th class="">Cliente</th>
                                <th class="">Vehiculo</th>
                                <th class="">Empleado</th>
                                <th class="">Usuario</th>
                                <th class="">ZZFK6ZZ</th>
                                <th class="">Estado</th>
                                <th class="">Forma Reserva</th>
                                <th class="">Prioridad</th>
                                <th class="w-10">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservas as $key => $reserva)
                                <tr>
                                    <td>{{ $reserva->reserva }}</td>
                                    <td>{{ $reserva->descripcion }}</td>
                                    <td>{{ $reserva->taller->descripcion }}</td>
                                    <td>{{ $reserva->cliente->descripcion }}</td>
                                    <td>{{ $reserva->vehiculo->descripcion }}</td>
                                    <td>{{ $reserva->empleado->descripcion }}</td>
                                    <td>{{ $reserva->usuario->descripcion }}</td>
                                    <td>{{ $reserva->ZZfk6ZZ->descripcion }}</td>
                                    <td>{{ $reserva->estado }}</td>
                                    <td>{{ $reserva->forma_reserva }}</td>
                                    <td>{{ $reserva->prioridad }}</td>
                                    <td>{{ $reserva->direccion }}</td>
                                    <td class=" ">
                                        <a
                                            href="{{ route('reserva.edit', $reserva->reserva) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$reserva->reserva}}"
                                            data-data   ="{{$reserva->reserva}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'reserva',
                                                'value' => $reserva->reserva,
                                                'ruta'  => 'reserva.destroy',
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
