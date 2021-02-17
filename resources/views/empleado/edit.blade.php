@extends('adminlte::page')

@section('title', 'Empleado')

@section('css' )
  @stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-cyan">
                                <div class="card-header">
                                    @isset($empleado->id)
                                        <h3 class="card-title">Editar Empleado</h3>
                                    @else
                                        <h3 class="card-title">Crear Empleado</h3>
                                    @endisset
                                </div>

                                <div class="card-body">
                                    @isset($empleado->id)
                                        {!! Form::model($empleado, ['route' => ['empleado.update', $empleado->id], 'method' => 'PATCH']) !!}
                                        <div class="form-group col">
                                            {!! Form::label('id', 'Código de Empleado') !!}
                                            {!! Form::text('id', old('id'), ['class' => 'form-control', 'readonly' ,'id' => 'id']) !!}

                                        </div>
                                    @else
                                        {!! Form::open(
                                            ['route' =>
                                                ['empleado.store' ],
                                                    'method'    => 'post',
                                                    'id'        => 'form',
                                                ]
                                        ) !!}
                                    @endisset

                                        <div class="form-row">
                                            <div class="form-group col">
                                                {!! Form::label('nombres', 'Nombres') !!}
                                                {!! Form::text('nombres', old('nombres'), [
                                                    'class'         => 'form-control',
                                                    'id'            => 'nombres',
                                                    'placeholder'   => 'Nombres',
                                                ]) !!}

                                                @error('nombres')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col">
                                                {!! Form::label('apellidos', 'Apellidos') !!}
                                                {!! Form::text('apellidos', old('apellidos'), [
                                                    'class'         => 'form-control',
                                                    'id'            => 'apellidos',
                                                    'placeholder'   => 'Apellidos',
                                                ]) !!}
                                                @error('apellidos')
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        {{--  end form-row--}}

                                        {{-- form-row 3--}}
                                        <div class="form-row">
                                            <div class="form-group col">
                                                {!! Form::label('ci', 'CI') !!}
                                                {!! Form::text('ci', old('ci'), [
                                                    'class'         => 'form-control',
                                                    'id'            => 'ci',
                                                    'placeholder'   => 'ci',
                                                ]) !!}
                                                @error('ci')
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            {{--CONST Estado--}}
                                            <div class="form-group col">
                                                {!! Form::label('estado_civil', 'Estado Civil') !!}
                                                {!! Form::select('estado_civil', [
                                                    '0'      => 'Seleccione Estado Civil'  ,
                                                    $estadosciviles['Soltero']      => 'Soltero'  ,
                                                    $estadosciviles['Casado']       => 'Casado'  ,
                                                    $estadosciviles['Divorciado']   => 'Divorciado'  ,
                                                    $estadosciviles['Viudo']        => 'Viudo'
                                                    ]
                                                    ,$empleado->estado_civil , ['class' => 'form-control']) !!}
                                                @error("estado_civil")
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>













                                            {{--CONST Sexo--}}
{{--                                            $pug->ipbans->pluck('ip')->toArray();--}}
{{--                                            $posts->pluck("title","id")--}}
{{--                                            $plucked = $collection->pluck('color', 'brand');--}}
{{--                                            $plucked->all();--}}
                                            <div class="form-group col">
                                                {!! Form::label('sexo', 'Sexo') !!}
                                                {!! Form::select('sexo', [
                                                    '0' => 'Seleccione Sexo'  ,
                                                    $sexos['Masculino'] => 'Masculino'  ,
                                                    $sexos['Femenino'] =>  'Femenino'
                                                    ]
                                                 ,$empleado->sexo , ['class' => 'form-control']) !!}
                                                @error("sexo")
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{--  end form-row--}}

                                        <div class="form-group">
                                            {!! Form::label('direccion', 'Dirección') !!}
                                            {!! Form::text('direccion', old('direccion'), [
                                                'class'         => 'form-control',
                                                'id'            => 'direccion',
                                                'placeholder'   => 'direccion',
                                            ]) !!}
                                            @error('direccion')
                                            <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- form-row 3--}}
                                        <div class="form-row">
                                            <div class="form-group col">
                                                {!! Form::label('localidad_id', 'Localidad') !!}
                                                {!! Form::select('localidad_id', $localidades->pluck('descripcion', 'id')->prepend('Seleccione Localidad') ,$empleado->localidad_id , ['class' => 'form-control']) !!}
                                                @error("localidad_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col">
                                                {!! Form::label('movil', 'Móvil') !!}
                                                {!! Form::text('movil', old('movil'), [
                                                    'class'         => 'form-control',
                                                    'id'            => 'movil',
                                                    'placeholder'   => 'movil',
                                                ]) !!}
                                                @error('movil')
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col">
                                                {!! Form::label('telefono', 'Teléfono') !!}
                                                {!! Form::text('telefono', old('telefono'), [
                                                    'class'         => 'form-control',
                                                    'id'            => 'telefono',
                                                    'placeholder'   => 'telefono',
                                                ]) !!}
                                                @error('telefono')
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{--  end form-row--}}


                                        {{-- form-row 2--}}
                                        <div class="form-row ">
                                            {{--FK Cargo--}}
                                            <div class="form-group col">
                                                {!! Form::label('cargo_id', 'Cargo') !!}
                                                {!! Form::select('cargo_id', $cargos->pluck('descripcion', 'id')->prepend('Seleccione Cargo') ,$empleado->cargo_id , ['class' => 'form-control']) !!}
                                                @error("cargo_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

{{--                                            {{ dd($errors->all() ) }}--}}
                                            {{--FK Turno Empleado--}}
                                            <div class="form-group">
                                                {!! Form::label('turno_id', 'Turno') !!}
                                                {!! Form::select('turno_id', $turnos->pluck('descripcion', 'id')->prepend('Seleccione Turno') ,$empleado->turno_id , ['class' => 'form-control']) !!}
                                                @error("turno_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        {{--FK Grupo Trabajo--}}
                                        <div class="form-group">
                                            {!! Form::label('grupo_id', 'Grupo de Trabajo') !!}
                                            {!! Form::select('grupo_id', $grupos->pluck('descripcion', 'id')->prepend('Seleccione Grupo') ,$empleado->grupo_id , ['class' => 'form-control']) !!}
                                            @error("grupo_id")
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- form-row 2--}}
                                        <div class="form-row ">
                                            <div class="form-group col">
                                                <label for="fecha_nacimiento">Fecha Nacimiento </label>
                                                <input class    = "form-control"
                                                       type     = "date"
                                                       name     = "fecha_nacimiento"
                                                       id       = "fecha_nacimiento"
                                                       value    = "{{ old('fecha_nacimiento', $empleado->fecha_nacimiento)  }}"
                                                       placeholder="Introduzca fecha nacimiento">
                                                @foreach ($errors->get('fecha_nacimiento') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>





















{{--                                            {{  dd( $empleado->fecha_nacimiento  )  }}--}}
{{--                                            {{  dd( $empleado->fecha_ingreso  )  }}--}}
{{--                                            {{  dd( date("Y-m-d", strtotime($empleado->fecha_ingreso)))  }}--}}

                                            {{--DATE Fecha Ingreso --}}
                                            <div class="form-group col">
                                                <label for="fecha_ingreso" >Fecha Ingreso </label>
                                                <input class    = "form-control"
                                                       type     = "date"
                                                       name     = "fecha_ingreso"
                                                       id       = "fecha_ingreso"
                                                       value    = "{{ old('fecha_ingreso', date("Y-m-d", strtotime($empleado->fecha_ingreso)))   }}"
                                                        >
                                                @foreach ($errors->get('fecha_ingreso') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>

                                        </div>
                                        {{--  end form-row--}}

                                        {{-- form-row 2--}}
                                        <div class="form-row">
                                            {{--CONST Estado--}}
                                            <div class="form-group col">
                                                {!! Form::label('estado', 'Estado') !!}
                                                {!! Form::select('estado', [
                                                    '0' => 'Seleccione Estado',
                                                    $estados['Activo']      => 'Activo'  ,
                                                    $estados['Inactivo']    => 'Inactivo'
                                                    ]
                                                    ,$empleado->estado , ['class' => 'form-control']) !!}
                                                @error('estado')
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col">
                                                {!! Form::label('salario', 'Salario') !!}
                                                {!! Form::text('salario', old('salario'), [
                                                    'class'         => 'form-control',
                                                    'id'            => 'salario',
                                                    'placeholder'   => 'salario',
                                                ]) !!}
                                                @error('salario')
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{--  end form-row--}}
                                        <hr/>
                                        {{-- form-row 2--}}
                                        <div class="form-row">

                                            {{--DATE Fecha Egreso --}}
                                            <div class="form-group col">
                                                <label for="fecha_egreso" >Fecha Egreso </label>
                                                <input class    = "form-control"
                                                       type     = "date"
                                                       name     = "fecha_egreso"
                                                       id       = "fecha_egreso"
{{--                                                       value    = "{{ old('fecha_egreso', date("Y-m-d", strtotime($empleado->fecha_egreso )))  }}"--}}
                                                       >
                                                @foreach ($errors->get('fecha_egreso') as $error)
                                                    <span class="text text-danger">{{ $error }}</span>
                                                @endforeach
                                            </div>



                                            <div class="form-group col">
                                                {!! Form::label('motivo_egreso', 'Motivo Egreso') !!}
                                                {!! Form::text('motivo_egreso', old('motivo_egreso'), [
                                                    'class'         => 'form-control',
                                                    'id'            => 'motivo_egreso',
                                                    'placeholder'   => 'motivo_egreso',
                                                ]) !!}
                                                @error('motivo_egreso')
                                                <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{--  end form-row--}}
                                    </div>
                                    <div class="card-footer  ">
                                        <button
                                            type="submit"
                                            class="btn btn-info">Grabar</button>
                                        <a href="{{ route('empleado.index') }}" class="btn btn-secondary btn-close">Cancelar</a>
                                    </div>
{{--                                </form>--}}
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
</script>
@endsection

