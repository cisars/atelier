@extends('adminlte::page')

@section('title', 'Listado de Cargo')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Cargos </li>
@stop

@section('content')

@if( !empty(session('msg')))
    @include('adminlte::partials.modals.alerts',['msg'=>session('msg'), 'type'=>session('type') ])
@endif

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Cargos   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('cargo.create')}}" class="btn bg-cyan">Nuevo Cargo</a>
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                            <a  href="{{route('cargo.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Código

                                </th>
                                <th class="w-80">Descripción</th>
                                <th class="w-10">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cargos as $key => $cargo)
                                <tr>
                                    <td>{{ $cargo->id }}</td>
                                    <td>{{ $cargo->descripcion }}</td>
                                    <td class=" ">
                                        <a
                                            href="{{ route('cargo.edit', $cargo->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$cargo->id}}"
                                            data-data   ="{{$cargo->id}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'id',
                                                'value' => $cargo->id,
                                                'ruta'  => 'cargo.destroy',
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
