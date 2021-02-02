@extends('adminlte::page')

@section('title', 'Listado de ZZNOMBREZZ')

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
                            <a  href="{{route('ZZnombreZZ.create')}}" class="btn bg-cyan">Nueva ZZNOMBREZZ</a>
                            @if( trim(Auth::user()->perfil) != 'A' )
                            <a  href="{{route('ZZnombreZZ.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Codigo </th>
                                <th class="">Descripcion</th>
                                <th class="">ZZFK1ZZ</th>
                                <th class="">ZZFK2ZZ</th>
                                <th class="">ZZFK3ZZ</th>
                                <th class="">ZZFK4ZZ</th>
                                <th class="">ZZFK5ZZ</th>
                                <th class="">ZZFK6ZZ</th>
                                <th class="">ZZESTADO1ZZ</th>
                                <th class="">ZZESTADO2ZZ</th>
                                <th class="">ZZESTADO3ZZ</th>
                                <th class="w-10">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ZZnombresZZ as $key => $ZZnombreZZ)
                                <tr>
                                    <td>{{ $ZZnombreZZ->ZZnombreZZ }}</td>
                                    <td>{{ $ZZnombreZZ->descripcion }}</td>
                                    <td>{{ $ZZnombreZZ->ZZfk1ZZ->descripcion }}</td>
                                    <td>{{ $ZZnombreZZ->ZZfk2ZZ->descripcion }}</td>
                                    <td>{{ $ZZnombreZZ->ZZfk3ZZ->descripcion }}</td>
                                    <td>{{ $ZZnombreZZ->ZZfk4ZZ->descripcion }}</td>
                                    <td>{{ $ZZnombreZZ->ZZfk5ZZ->descripcion }}</td>
                                    <td>{{ $ZZnombreZZ->ZZfk6ZZ->descripcion }}</td>
                                    <td>{{ $ZZnombreZZ->ZZestado1ZZ }}</td>
                                    <td>{{ $ZZnombreZZ->ZZestado2ZZ }}</td>
                                    <td>{{ $ZZnombreZZ->ZZestado3ZZ }}</td>
                                    <td>{{ $ZZnombreZZ->direccion }}</td>
                                    <td class=" ">
                                        <a
                                            href="{{ route('ZZnombreZZ.edit', $ZZnombreZZ->ZZnombreZZ) }}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$ZZnombreZZ->ZZnombreZZ}}"
                                            data-data   ="{{$ZZnombreZZ->ZZnombreZZ}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'ZZnombreZZ',
                                                'value' => $ZZnombreZZ->ZZnombreZZ,
                                                'ruta'  => 'ZZnombreZZ.destroy',
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
