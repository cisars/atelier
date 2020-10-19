@extends('vendor.adminlte.page')

@section('title', 'Atelier')

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('Tablero de controles') }}</h1>
@stop

@section('content')
    <div class="col-sm-12">
    </div>
    <div class="panel panel-default">
        <div style="margin: 10px;" class="panel-heading">
            <a  href="{{route('localidad.create')}}" class="btn btn-primary">Nuevo localidad</a>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" id="tabla">
                    <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>localidad</th>
                        <th>Region</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($localidades as $key => $localidad)
                        <tr>
                            <td>{{ $localidad->localidad }}</td>
                            <td> </td>
                            <td></td>
                            <td style="display: block;  margin: auto;">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-data="{{$localidad->localidad}}">
                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                </button>
                                <a href="{{ route('localidad.edit', $localidad->localidad) }}" class= "btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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

@section('scripts')

@endsection
