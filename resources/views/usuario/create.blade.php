@extends('adminlte::page')

@section('title', 'Usuario')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Usuario </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Crear Usuario</h3>
                                </div>
                                @isset($usuario->usuario)
                                    {!! Form::model($usuario, ['route' => ['empleado.update', $usuario->usuario], 'method' => 'PATCH']) !!}
                                    <div class="form-group col">
                                        {!! Form::label('usuario', 'Codigo de Empleado') !!}
                                        {!! Form::text('usuario', old('usuario'), ['class' => 'form-control', 'readonly' ,'usuario' => 'usuario']) !!}

                                    </div>
                                @else
                                    {!! Form::open(
                                        ['route' =>
                                            ['usuario.store' ],
                                                'method'    => 'post',
                                                'id'        => 'form',
                                            ]
                                    ) !!}
                                @endisset

                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">

                                                <label for="usuario">Usuario</label>
                                                <input class    = "form-control"
                                                       maxlength="12"
                                                       type     = "text"
                                                       name     = "usuario"
                                                       id       = "usuario"
                                                       value    = "{{ old('usuario') }}"
                                                       placeholder="Introduzca usuario nuevo">
                                                @foreach ($errors->get('usuario') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach

                                        </div>

                                        <div class="form-group row">
                                            <div class="form-group col">
                                                <label for="clave">Clave</label>
                                                <input class    = "form-control"
                                                       maxlength="20"
                                                       type     = "password"
                                                       name     = "clave"
                                                       id       = "clave"
                                                       value    = "{{ old('clave') }}"
                                                       placeholder="Clave">
                                                @foreach ($errors->get('clave') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>


                                            <div class="form-group col">
                                                <label for="clave_verificacion">Clave Verificacion</label>
                                                <input class    = "form-control"
                                                       maxlength="20"
                                                       type     = "password"
                                                       required
                                                       placeholder="Confirmar clave">
                                            </div>
                                        </div>

                                        {{--FK Cliente--}}
                                        <div class="form-group row">
                                            {!! Form::label('cliente_id', 'Cliente') !!}
                                            {!! Form::select('cliente_id', $clientes->pluck('razon_social', 'id')  ,null , ['class' => 'form-control', 'placeholder' => 'Seleccione Cliente']) !!}
                                            @error("cliente_id")
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>














                                        {{--FK Empleado--}}
                                        <div class="form-group row">
                                            {!! Form::label('empleado_id', 'Empleado') !!}
                                            {!! Form::select('empleado_id', $empleados  ,null , ['class' => 'form-control', 'placeholder' => 'Seleccione Empleado']) !!}
                                            @error("empleado_id")
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{--CONST Taller--}}
                                        <div class="form-group row">
                                            <div class="form-group col">
                                                {!! Form::label('taller_id[]', 'Taller') !!}
                                                {!! Form::select(
                                                'taller_id[]',
                                                $talleres->pluck('descripcion', 'id'),
                                                old('taller_id[]') , [
                                                    'multiple',
                                                    'class'         => 'selectpicker form-control',
                                                    'placeholder'   => 'Seleccione Taller' ]
                                                )!!}
                                                @error("taller_id[]")
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            {{--CONST Estado--}}
                                            <div class="form-group col">
                                                {!! Form::label('estado', 'Estado') !!}
                                                {!! Form::select('estado',  [
                                                    '0'      => 'Seleccione Estado'  ,
                                                    $estados['Activo']       => 'Activo'  ,
                                                    $estados['Inactivo']      => 'Inactivo'
                                                    ]
                                                    ,old('estado') , ['class' => 'form-control']) !!}
                                                @error("estado")
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror

                                             </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="observacion">Observacion</label>
                                            <input class    = "form-control"
                                                   maxlength="200"
                                                   type     = "text"
                                                   name     = "observacion"
                                                   id       = "observacion"
                                                   value    = "{{ old('observacion') }}"
                                                   placeholder="Introduzca observacion">
                                            @foreach ($errors->get('observacion') as $error)
                                                <span class="text text-danger">{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label('email', 'Email') !!}
                                            {!! Form::text('email', old('email'), [
                                                'class'         => 'form-control',
                                                'id'            => 'email',
                                                'placeholder'   => 'email',
                                            ]) !!}
                                            @error('email')
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{--CONST Perfil--}}
                                        <div class="form-group row">
                                            <div class="form-group col">
                                                {!! Form::label('perfil', 'Perfil') !!}
                                                {!! Form::select('perfil',  [
                                                    '0'      => 'Seleccione perfil'  ,
                                                    $perfiles['Administrador']          => 'Administrador'  ,
                                                    $perfiles['Funcionario']            => 'Funcionario',
                                                    $perfiles['Cliente']                => 'Cliente',
                                                    $perfiles['Bootstrap']              => 'Bootstrap',
                                                    $perfiles['Recepcionista']          => 'Recepcionista'
                                                    ]
                                                    ,old('perfil') , ['class' => 'form-control']) !!}
                                                @error("perfil")
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>


                                            {{--CONST Tipo--}}
                                            <div class="form-group col">
                                                {!! Form::label('tipo', 'Tipo') !!}
                                                {!! Form::select('tipo', [
                                                    '0'      => 'Seleccionar un tipo'  ,
                                                    $tipos['Cliente']       => 'Cliente'  ,
                                                    $tipos['Empleado']      => 'Empleado'
                                                    ],old('tipo') , ['class' => 'form-control']) !!}
                                                @error("tipo")
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
                                        <a href="{{ route('usuario.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
                                    </div>
                            {!! Form::close() !!}
</div>
</div>
</div>
</div>
</section>
</div>
</div>
@endsection
@section('js')
<script>
    /*
    $('[name="cliente"]').select2({
        theme: "bootstrap",
        language: langSelect2,
        ajax: {
            url: '/admin/invoice/findclients',
            data: function (params) {
                var query = {
                    q: params.term,
                    //type: 'public'
                };

                return query;
            },
            processResults: function (data) {
                console.log(data)
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data
                };
            }
        }
    });
    */
</script>
@endsection
