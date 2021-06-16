@extends('adminlte::page')

@section('title', 'Listado de Taller')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Talleres Usuarios</li>
@stop

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Talleres </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a href="{{route('taller.usuarios.crear')}}" class="btn bg-cyan">Nuevo Taller</a>

                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-80">Taller</th>
                                <th class="">Usuario</th>
                                <th class="w-10">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($usuarios as $usuario)
                                @foreach ($usuario->talleres as $taller)
                                    <tr>
                                        <td>{{ $taller->descripcion }}</td>
                                        <td>{{ $usuario->usuario }}</td>
                                        <td class=" ">
                                            <a
                                                href="{{ route('taller.usuarios.desasignar', [$usuario->usuario, $taller->id]) }}"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
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
