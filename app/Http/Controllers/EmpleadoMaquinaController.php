<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\EmpleadoMaquina\StoreEmpleadoMaquinaRequest;
use App\Http\Requests\EmpleadoMaquina\UpdateEmpleadoMaquinaRequest;
use App\Models\EmpleadoMaquina;
use App\Models\Empleado;
use App\Models\Maquinaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoMaquinaController extends Controller
{

    public function index()
    {
        $empleados_maquinas = EmpleadoMaquina::all();

        return view('empleado_maquina.index', compact('empleados_maquinas', $empleados_maquinas));
    }

    public function create()
    {
        // Get all data fk tables
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $maquinarias = Maquinaria::orderBy('descripcion', 'ASC')->get();

        $empleado_maquina = new EmpleadoMaquina(); //
        // Construct all cons data base model dropdown list char 1

        return view('empleado_maquina.edit')
            // Send all fk variables
            ->with('empleados', $empleados)
            ->with('maquinarias', $maquinarias)// Send all cons variables
            ;
    }

    public function store(StoreEmpleadoMaquinaRequest $request)
    {
        try {
            DB::beginTransaction();
            $empleado_maquina = new EmpleadoMaquina($request->all());
            $empleado_maquina->save();

            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error('Error en EmpleadoMaquinaController@store: ' . $e);
            return redirect()
                ->route('empleado_maquina.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
        Log::info('EmpleadoMaquina registro creado');
        return redirect()
            ->route('empleado_maquina.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');

    }

    public function destroy(Request $request)
    {
        try {
            $empleado_maquina = EmpleadoMaquina::findOrFail($request->id);
            $empleado_maquina->delete();

            Log::info('EmpleadoMaquina registro eliminado');
            return redirect()
                ->route('empleado_maquina.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Error en EmpleadoMaquinaController@destroy: ' . $e);
            return redirect()
                ->route('empleado_maquina.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
    }

    public function edit(EmpleadoMaquina $empleado_maquina)
    {
// Get all data fk tables
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $maquinarias = Maquinaria::orderBy('descripcion', 'ASC')->get();

// Set all function cons base model dropdown list char 1

        return view('empleado_maquina.edit')
            ->with('empleado_maquina', $empleado_maquina)
// Send all fk variables
            ->with('empleados', $empleados)
            ->with('maquinarias', $maquinarias)// Send all cons variables
            ;
    }

    public function update(UpdateEmpleadoMaquinaRequest $request, EmpleadoMaquina $empleado_maquina)
    {
        try {
            DB::beginTransaction();
            $empleado_maquina->fill($request->all());
            $empleado_maquina->save();
            DB::commit();
            Log::info('EmpleadoMaquina registro actualizado ');
            return redirect()
                ->route('empleado_maquina.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error en EmpleadoMaquinaController@update: ' . $e);
            return redirect()
                ->route('empleado_maquina.index')
                ->with('type', 'danger')
                ->with('msg', 'Ocurrio un error');
        }

    }

    public function desasignarMaquinaria($empleado, $maquinaria)
    {
        //dd($empleado);
        try {
            DB::beginTransaction();

            Empleado::find($empleado)->empleados_maquinas()->detach($maquinaria);

            DB::commit();

            session()->flash('msg', 'Asignación eliminada');
            session()->flash('type', 'success');

            return redirect()->back();
        }catch (\Exception $e){
            DB::rollBack();

            dd($e->getMessage());

            session()->flash('msg', 'No se pudo eliminar la asignación');
            session()->flash('type', 'error');

            return redirect()->back();
        }
    }

    public function factory()
    {
        factory('App\Models\EmpleadoMaquina')->create();
        Log::warning('Factory creado en EmpleadoMaquina ');
        return redirect()
            ->route('empleado_maquina.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

?>
