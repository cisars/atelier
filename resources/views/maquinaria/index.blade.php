@extends('adminlte::page')

@section('title', 'Listado de Maquinaria')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Maquinarias </li>
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
                        <h3 class="card-title">Maquinarias   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('maquinaria.create')}}" class="btn bg-cyan">Nueva Maquinaria</a>
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                            <a  href="{{route('maquinaria.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Codigo </th>
                                <th class="">Descripcion</th>
                                <th class="">Estado</th>
                                <th class="">Maquinarias Tipos</th>
                                <th class="w-10">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($maquinarias as $key => $maquinaria)

                                <tr>
                                    <td>{{ $maquinaria->id }}</td>
                                    <td>{{ $maquinaria->descripcion }}</td>
                                    <td>{{ $maquinaria->estado }}</td>
                                    <td>{{ $maquinaria->maquinaria_tipo->descripcion }}</td>
                                    <td class=" ">

                                        <a
                                            href="{{ route('maquinaria.edit', $maquinaria->id) }}"
{{--                                            href="{{route('maquinaria.edit',['maquinaria'=>$maquinaria->maquinaria])}}"--}}
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$maquinaria->id}}"
                                            data-data   ="{{$maquinaria->id}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'id',
                                                'value' => $maquinaria->id,
                                                'ruta'  => 'maquinaria.destroy',
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
    // $($.fn.dataTable.tables(true)).DataTable()
    //     .columns.adjust();
</script>


@endsection
