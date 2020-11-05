<?php

namespace App\Http\Controllers;

use App\Http\Requests\Empleado\StoreEmpleadoRequest;
use App\Http\Requests\Empleado\UpdateEmpleadoRequest;
use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\Localidad;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EmpleadoController extends Controller
{

    public function index()
    {
        $empleados = Empleado::all();
        $empleados->each(function ($empleado) {
            $empleado->localidad = Localidad::find($empleado->localidad);
            $empleado->grupo_trabajo = Grupo::find($empleado->grupo_trabajo);
            $empleado->cargo = Cargo::find($empleado->cargo);
            $empleado->turno_empleado = Turno::find($empleado->turno_empleado);

            $empleado->estado === Empleado::EMPLEADO_ACTIVO ? $empleado->estado = 'Activo' : $empleado->estado = 'Inactivo' ;
            $empleado->estado_civil === Empleado::EMPLEADO_CASADO       ? $empleado->estado_civil = 'Casado' : "" ;
            $empleado->estado_civil === Empleado::EMPLEADO_SOLTERO      ? $empleado->estado_civil = 'Soltero' : "" ;
            $empleado->estado_civil === Empleado::EMPLEADO_DIVORCIADO   ? $empleado->estado_civil = 'Divorciado' : "" ;
            $empleado->estado_civil === Empleado::EMPLEADO_VIUDO        ? $empleado->estado_civil = 'Viudo' : "" ;
            $empleado->sexo === Empleado::EMPLEADO_MASCULINO ? $empleado->sexo = 'Masculino' : $empleado->sexo = 'Femenino' ;


        });
        return view('empleado.index', compact('empleados', $empleados));
    }
    public function create()
    {
        $localidades = Localidad::orderBy('descripcion', 'ASC')->get();
        $cargos = Cargo::orderBy('descripcion', 'ASC')->get();
        $turnos = Turno::orderBy('descripcion', 'ASC')->get();
        $grupos = Grupo::orderBy('descripcion', 'ASC')->get();

        $empleado   = new Empleado();
        $estados    = $empleado->getEstados();
        $sexos      = $empleado->getSexos();
        $estadosciviles= $empleado->getEstadosCiviles();

        return view('empleado.create')
            ->with('localidades', $localidades)
            ->with('cargos', $cargos)
            ->with('turnos', $turnos)
            ->with('grupos', $grupos)
            ->with('empleado', $empleado)
            ->with('estados', $estados)
            ->with('estadosciviles', $estadosciviles)
            ->with('sexos', $sexos);
    }
    public function store(StoreEmpleadoRequest $request )
    {
        $empleado = new Empleado($request->all());
       // $empleado->estado = Empleado::FUNCIONARIO_ACTIVO;
        $empleado->save();

        return redirect()
            ->route('empleado.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }
    public function destroy()
    {
        //
    }
    public function edit(Empleado $empleado)
    {
        $localidades = Localidad::orderBy('descripcion', 'ASC')->get();
        $cargos = Cargo::orderBy('descripcion', 'ASC')->get();
        $turnos = Turno::orderBy('descripcion', 'ASC')->get();
        $grupos = Grupo::orderBy('descripcion', 'ASC')->get();
        $estados = $empleado->getEstados();
        $sexos = $empleado->getSexos();
        $estadosciviles= $empleado->getEstadosCiviles();
        return view('empleado.edit')
            ->with('estados', $estados)
            ->with('sexos', $sexos)
            ->with('estadosciviles', $estadosciviles)
            ->with('localidades', $localidades)
            ->with('cargos', $cargos)
            ->with('turnos', $turnos)
            ->with('grupos', $grupos)
            ->with('empleado', $empleado);
    }
    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {

        $requestData = $request->all();
//        $requestData['fecha_ingreso'] = date("Y-m-d H:i:s", strtotime(request('fecha_ingreso')));
//        $requestData['fecha_egreso'] = date("Y-m-d H:i:s", strtotime(request('fecha_egreso')));
        $empleado->fill($requestData);
        $empleado->save();

        return redirect()
            ->route('empleado.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }
    public function factory()
    {
        factory('App\Models\Empleado')->create();
        return redirect()
            ->route('empleado.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}
