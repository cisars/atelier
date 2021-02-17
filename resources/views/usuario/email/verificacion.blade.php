@extends('adminlte::page')

@section('title', 'Listado de Usuario')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">Verificación </li>
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
                        <h3 class="card-title">Verificación de correo aceptada!   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="form-group">
                            <h2> Gracias por Registrarte, </h2>
                            enciende las notificaciones de tu correo para estar al tanto del progreso de tu vehiculo.


                        </div>

                        <div class="form-group">
                        <a  href="/home" class="btn bg-cyan">Volver a la aplicacion</a>
                        </div>
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
