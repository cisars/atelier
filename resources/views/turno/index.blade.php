@extends('adminlte::page')

@section('title', 'Listado de Turno')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Turnos </li>
@stop

@section('content')

@if( !empty(session('msg')))
    @include('adminlte::partials.modals.alerts',['msg'=>session('msg'), 'type'=>session('type') ])
@endif

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-6">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Turnos   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('turno.create')}}" class="btn bg-cyan">Nuevo Turno</a>
                            @if( Auth::user()->tipo == 1 )
                            <a  href="{{route('turno.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Codigo

                                </th>
                                <th class="w-80">Descripcion</th>
                                <th class="w-10">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($turnos as $key => $turno)
                                <tr>
                                    <td>{{ $turno->turno_empleado }}</td>
                                    <td>{{ $turno->descripcion }}</td>
                                    <td class=" ">
                                        <a
                                            href="{{ route('turno.edit', $turno->turno_empleado) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$turno->turno_empleado}}"
                                            data-data   ="{{$turno->turno_empleado}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'turno_empleado',
                                                'value' => $turno->turno_empleado,
                                                'ruta'  => 'turno.destroy',
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
