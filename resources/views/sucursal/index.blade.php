@extends('adminlte::page')

@section('title', 'Listado de Sucursal')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Sucursales </li>
@stop

@section('content')

@if( !empty(session('msg')))
    @include('adminlte::partials.modals.alerts',['msg'=>session('msg'), 'type'=>session('type') ])
@endif

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Sucursales   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('sucursal.create')}}" class="btn bg-cyan">Nueva Sucursal</a>
                            @if( trim(Auth::user()->perfil) == 'A' )
                            <a  href="{{route('sucursal.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Codigo </th>
                                <th class="">Descripcion</th>
                                <th class="">Localidad</th>
                                <th class="">Direccion</th>
                                <th class="">Telefono</th>
                                <th class="">Email</th>
                                <th class="w-10">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sucursales as $key => $sucursal)
                                <tr>
                                    <td>{{ $sucursal->sucursal }}</td>
                                    <td>{{ $sucursal->descripcion }}</td>
                                    <td>{{ $sucursal->localidad->descripcion }}</td>
                                    <td>{{ $sucursal->direccion }}</td>
                                    <td>{{ $sucursal->telefono }}</td>
                                    <td>{{ $sucursal->email }}</td>
                                    <td class=" ">
                                        <a
                                            href="{{ route('sucursal.edit', $sucursal->sucursal) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$sucursal->sucursal}}"
                                            data-data   ="{{$sucursal->sucursal}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'sucursal',
                                                'value' => $sucursal->sucursal,
                                                'ruta'  => 'sucursal.destroy',
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
