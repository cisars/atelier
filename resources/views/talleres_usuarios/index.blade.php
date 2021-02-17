@extends('adminlte::page')

@section('title', 'Listado de Taller')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Talleres Usuarios </li>
@stop

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Talleres   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('tallerusuario.create')}}" class="btn bg-cyan">Nuevo Taller</a>

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

                                <tr>
                                    <td>Kreiger Inc</td>
                                    <td>Juan Pérez</td>
                                    <td class=" ">
                                        <a
                                            href=""
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"

                                            >
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

{{--                                    <x-alertas :confirmation="$confirmation" ></x-alertas>--}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Marvin, Inc</td>
                                    <td>Kub, Letha</td>
                                    <td class=" ">
                                        <a
                                            href=""
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"

                                        >
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        {{--                                    <x-alertas :confirmation="$confirmation" ></x-alertas>--}}
                                    </td>
                                </tr>
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
