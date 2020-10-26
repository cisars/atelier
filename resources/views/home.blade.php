@extends('adminlte::page')

@section('title', 'Home')

@section('css' )

@stop

@section('menu-header')
{{--   --   --}}
@stop


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Iniciaste sesion!') }}
<br> Mis datos
                        <br>
                        {{ Auth::user()  }}

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class= "col-md-12">
            <div class="card card-cyan">
                <h5 class="card-header">Titulo</h5>
                <div class="card-body">
                    <div class="form-group  ">Descripcion / Lista de usuarios</div>

                    <table  class="table table-striped table-sm table-hover  " id="lista">
                        <thead>
                        <tr>

                            <th class="text-center">usuario			 	 </th>
                            <th class="text-center">empleado 		     </th>
                            <th>cliente 		     </th>
                            <th>clave 			     </th>
                            <th>fecha_ingreso 	     </th>
                            <th>observacion 	  	 </th>
                            <th>perfil 				 </th>
                            <th>tipo 				 </th>
                            <th>usuario_verified_at  </th>
                            <th>remember_token 		 </th>
                            <th>created_at 			 </th>
                            <th>updated_at           </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($usuarios as $key => $usuario)
                            <tr>
                                <td class="">{{ $usuario->usuario                        }}</td>
                                <td class="text-center">{{ $usuario->empleado 		     }}</td>
                                <td class="text-center">{{ $usuario->cliente 		     }}</td>
                                <td class="">{{ $usuario->clave 			             }}</td>
                                <td class="text-center">{{ $usuario->fecha_ingreso 	     }}</td>
                                <td class="text-center">{{ $usuario->observacion 	  	 }}</td>
                                <td class="text-center">{{ $usuario->perfil 			 }}</td>
                                <td class="text-center">{{ $usuario->tipo 				 }}</td>
                                <td class="text-center">{{ $usuario->usuario_verified_at }}</td>
                                <td class="text-center">{{ $usuario->remember_token 	 }}</td>
                                <td class="text-center">{{ $usuario->created_at 		 }}</td>
                                <td class="text-center">{{ $usuario->updated_at          }}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>


        </div>

        <div class= "col-md-12">
            <div class="card card-cyan">
                <h5 class="card-header">Empleados</h5>
                <div class="card-body">
                    <div class="card-title">Descripcion / Lista de empleados</div>
                    <table class="table table-striped table-sm table-hover  " id="data">
                        <thead>
                        <tr>
                            <th class="text-center">  empleado  		     		 </th>
                            <th class="text-center">  nombres 		 		     	 </th>
                            <th class="text-center">  apellidos 		 		     </th>
                            <th class="text-center">  ci 				 		     </th>
                            <th class="text-center">  estado_civil 	 		     	 </th>
                            <th class="text-center">  sexo 			 		     	 </th>
                            <th class="text-center">  direccion 		 		     </th>
                            <th class="text-center">  localidad 		 		     </th>
                            <th class="text-center">  movil 			 		     </th>
                            <th class="text-center">  telefono 		 		     	 </th>
                            <th class="text-center">  cargo 			 		     </th>
                            <th class="text-center">  turno_empleado 	 		     </th>
                            <th class="text-center">  grupo_trabajo 	 		     </th>
                            <th class="text-center">  fecha_nacimiento 		     	 </th>
                            <th class="text-center">  fecha_ingreso 	 		     </th>
                            <th class="text-center">  estado 	         		     </th>
                            <th class="text-center">  fecha_egreso 	 		     	 </th>
                            <th class="text-center">  motivo_egreso 	 		 	 </th>
                            <th class="text-center">  salario 		 		     	 </th>
                            <th class="text-center">  created_at 		 		     </th>
                            <th class="text-center">  updated_at  		     		 </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($empleados as $key => $empleado)
                            <tr>
                                <td class="text-center">{{ $empleado->empleado  		     }}</td>
                                <td class="text-center">{{ $empleado->nombres 		 		     }}</td>
                                <td class="text-center">{{ $empleado->apellidos 		 		     }}</td>
                                <td class="text-center">{{ $empleado->ci 				 		     }}</td>
                                <td class="text-center">{{ $empleado->estado_civil 	 		     }}</td>
                                <td class="text-center">{{ $empleado->sexo 			 		     }}</td>
                                <td class="text-center">{{ $empleado->direccion 		 		     }}</td>
                                <td class="text-center">{{ $empleado->localidad 		 		     }}</td>
                                <td class="text-center">{{ $empleado->movil 			 		     }}</td>
                                <td class="text-center">{{ $empleado->telefono 		 		     }}</td>
                                <td class="text-center">{{ $empleado->cargo 			 		     }}</td>
                                <td class="text-center">{{ $empleado->turno_empleado 	 		     }}</td>
                                <td class="text-center">{{ $empleado->grupo_trabajo 	 		     }}</td>
                                <td class="text-center">{{ $empleado->fecha_nacimiento 		     }}</td>
                                <td class="text-center">{{ $empleado->fecha_ingreso 	 		     }}</td>
                                <td class="text-center">{{ $empleado->estado 	         		     }}</td>
                                <td class="text-center">{{ $empleado->fecha_egreso 	 		     }}</td>
                                <td class="text-center">{{ $empleado->motivo_egreso 	 		     }}</td>
                                <td class="text-center">{{ $empleado->salario 		 		     }}</td>
                                <td class="text-center">{{ $empleado->created_at 		 		     }}</td>
                                <td class="text-center">{{ $empleado->updated_at  		     }}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>


        </div>
    </div>

@stop
{{--        @endsection--}}
