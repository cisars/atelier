@extends('adminlte::page')

@section('title', 'Listado de Vehiculo')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM ZZNOMBRESZZ </li>
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
                        <h3 class="card-title">ZZNOMBRESZZ   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('vehiculo.create')}}" class="btn bg-cyan">Nueva Vehiculo</a>
                            @if( trim(Auth::user()->perfil) == 'A' )
                            <a  href="{{route('vehiculo.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Codigo </th>
                                <th class="">Cliente</th>
                                <th class="">Modelo</th>
                                <th class="">Chapa</th>
                                <th class="">Chasis</th>
                                <th class="">Color</th>
                                <th class="">Combustion</th>
                                <th class="">Tipo</th>
                                <th class="">Año</th>
                                <th class="w-10">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehiculos as $key => $vehiculo)
                                <tr>
                                    <td>{{ $vehiculo->vehiculo }}</td>
                                    <td>{{ $vehiculo->cliente->razon_social }}</td>
                                    <td>{{ $vehiculo->modelo->descripcion }}</td>
                                    <td>{{ $vehiculo->chapa }}</td>
                                    <td>{{ $vehiculo->chasis }}</td>
                                    <td>{{ $vehiculo->color->descripcion }}</td>
                                    <td>{{ $vehiculo->combustion }}</td>
                                    <td>{{ $vehiculo->tipo }}</td>
                                    <td>{{ $vehiculo->año }}</td>
                                    <td class=" ">
                                        <a
                                            href="{{ route('vehiculo.edit', $vehiculo->vehiculo) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$vehiculo->vehiculo}}"
                                            data-data   ="{{$vehiculo->vehiculo}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'vehiculo',
                                                'value' => $vehiculo->vehiculo,
                                                'ruta'  => 'vehiculo.destroy',
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
