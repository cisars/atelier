@extends('adminlte::page')

@section('title', 'Listado de Usuario')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Usuarios </li>
@stop

@section('content')

@if( !empty(session('msg')))
    @include('adminlte::partials.modals.alerts',['msg'=>session('msg'), 'type'=>session('type') ])
@endif

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-10">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{route('usuario.create')}}" class="btn bg-cyan">Nueva Usuario</a>
                            @if( Auth::user()->tipo == 1 )

                                    <a  href="{{route('usuario_cliente.factory')}}" class="btn bg-teal float-right ">Generar Usuario - Cliente</a>
                                    <a  href="{{route('usuario_empleado.factory')}}" class="btn bg-info float-right ">Generar Usuario - Empleado</a>

                            @endif
                        </div>

                        <table class="table table-sm table-hover nowrap" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Usuario  </th>
                                <th class="w-80">Empleado</th>
                                <th class="w-80">Cliente</th>
                                <th class="w-80">Fecha Ingreso</th>
                                <th class="w-80">Estado</th>
                                <th class="w-80">Observacion</th>
                                <th class="w-80">Perfil</th>
                                <th class="w-80">Tipo</th>
                                <th class="w-10">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $key => $usuario)
                                <tr>

                                    <td>{{ $usuario->usuario }}</td>
                                    <td>
                                        {{ !empty($usuario->empleado->apellidos) ? $usuario->empleado->apellidos .', ' : ''  }}
                                        {{ !empty($usuario->empleado->nombres) ? $usuario->empleado->nombres : ''  }}
{{--                                        {{ $usuario->empleado->apellidos .', ' . $usuario->empleado->nombres }}--}}
                                    </td>
                                    <td>{{ !empty($usuario->cliente->razon_social) ? $usuario->cliente->razon_social:''  }}</td>
                                    <td>{{ $usuario->fecha_ingreso }}   </td>
                                    <td>{{ $usuario->estado }}          </td>
                                    <td>{{ $usuario->observacion }}     </td>
                                    <td>{{ $usuario->perfil }}          </td>
                                    <td>{{ $usuario->tipo }}            </td>
                                    <td class=" ">
                                        <a
                                            href="{{ route('usuario.edit', $usuario->usuario) }}"
                                            class= "btn btn-info disabled">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$usuario->usuario}}"
                                            data-data   ="{{$usuario->usuario}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                        <?php
                                        $confirmation = [
                                                'pk'   => 'usuario',
                                                'value' => $usuario->usuario,
                                                'ruta'  => 'usuario.destroy',
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
