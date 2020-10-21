@extends('adminlte::page')

@section('title', 'Atelier')

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('Listado de Localidades') }}</h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-6">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Localidades</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-6 mb-4">
                            <a  href="{{route('localidad.create')}}" class="btn bg-cyan">Nueva localidad</a>
                        </div>

                        <table class="table table-sm table-hover" id="table">
                            <thead>
                            <tr>
                                <th >Codigo</th>
                                <th>Descripcion</th>
                                <th >Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($localidades as $key => $localidad)
                                <tr>
                                    <td>{{ $localidad->localidad }}</td>
                                    <td>{{ $localidad->descripcion }}</td>
                                    <td style="display: block;  margin: auto;">
                                        <a
                                            href="{{ route('localidad.edit', $localidad->localidad) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger"
                                            data-data   ="{{$localidad->localidad}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Eliminar localidad</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('localidad.destroy', 'test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>¿Esta seguro que desea eliminar el registro?</p>
                        <input type="hidden" id="id" name="id" value="">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt" aria-hidden="true"></i> Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@yield('js')
<script>
    $('#table').DataTable({

    });

</script>
