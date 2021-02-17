@extends('adminlte::page')

@section('title', 'Listado de Taller')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Talleres </li>
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
                        <h3 class="card-title">Talleres   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('taller.create')}}" class="btn bg-cyan">Nuevo Taller</a>
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                            <a  href="{{route('taller.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Código

                                </th>
                                <th class="w-80">Descripción</th>
                                <th class="">direccion</th>
                                <th class="">localidad</th>
                                <th class="">telefono</th>
                                <th class="w-10">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($talleres as $key => $taller)
                                <tr>
                                    <td>{{ $taller->id }}</td>
                                    <td>{{ $taller->descripcion }}</td>
                                    <td>{{ $taller->direccion }}</td>
                                    <td> {{ $taller->localidad->descripcion }}</td>
                                    <td>{{ $taller->telefono }}</td>
                                    <td class=" ">
                                        <a
                                            href="{{ route('taller.edit', $taller->id) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$taller->id}}"
                                            data-data   ="{{$taller->id}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'id',
                                                'value' => $taller->id,
                                                'ruta'  => 'taller.destroy',
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
