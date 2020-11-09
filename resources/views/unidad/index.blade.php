@extends('adminlte::page')

@section('title', 'Listado de Unidad')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Unidades </li>
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
                        <h3 class="card-title">Unidades   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('unidad.create')}}" class="btn bg-cyan">Nueva Unidad</a>
                            @if( trim(Auth::user()->perfil) == 'A' )
                            <a  href="{{route('unidad.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Codigo

                                </th>
                                <th class="w-80">Descripcion</th>
                                <th class="w-80">Sigla</th>
                                <th class="w-10">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($unidades as $key => $unidad)
                                <tr>
                                    <td>{{ $unidad->unidad }}</td>
                                    <td>{{ $unidad->descripcion }}</td>
                                    <td>{{ $unidad->sigla }}</td>
                                    <td class=" ">
                                        <a
                                            href="{{ route('unidad.edit', $unidad->unidad) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$unidad->unidad}}"
                                            data-data   ="{{$unidad->unidad}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'unidad',
                                                'value' => $unidad->unidad,
                                                'ruta'  => 'unidad.destroy',
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
