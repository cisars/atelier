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
                            @if( trim(Auth::user()->perfil) != 'A' && trim(Auth::user()->perfil) != 'D' )
                            <a  href="{{route('ZZnombreZZ.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Código </th>
                                <th class="">Descripción</th>
                                <th class="">ZZFKZZ</th>
                                <th class="">Dirección</th>
                                <th class="w-10">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ZZnombresZZ as $key => $ZZnombreZZ)
                                <tr>
                                    <td>{{ $ZZnombreZZ->ZZnombreZZ }}</td>
                                    <td>{{ $ZZnombreZZ->descripcion }}</td>
                                    <td>{{ $ZZnombreZZ->ZZfkZZ->descripcion }}</td>
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
