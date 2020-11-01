@extends('adminlte::page')

@section('title', 'Listado de Grupos de Trabajo')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Grupos de Trabajo </li>
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
                        <h3 class="card-title">Grupos de Trabajo   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('grupo.create')}}" class="btn bg-cyan">Nuevo Grupo de Trabajo</a>
                            @if( Auth::user()->tipo == 1 )
                            <a  href="{{route('grupo.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
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
                            @foreach($grupos as $key => $grupo)
                                <tr>
                                    <td>{{ $grupo->grupo_trabajo }}</td>
                                    <td>{{ $grupo->descripcion }}</td>
                                    <td class=" ">
                                        <a
                                            href="{{ route('grupo.edit', $grupo->grupo_trabajo) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$grupo->grupo_trabajo}}"
                                            data-data   ="{{$grupo->grupo_trabajo}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'grupo_trabajo',
                                                'value' => $grupo->grupo_trabajo,
                                                'ruta'  => 'grupo.destroy',
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
