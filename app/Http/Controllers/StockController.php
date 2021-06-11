<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Entrada;
use App\Models\OrdenTrabajo;
use App\Models\Taller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /*
     * Seccion entrada de repuestos
     */
    public function entradas()
    {
        $entradas = Entrada::all();



        return view('entrada.index', compact('entradas'));
    }

    public function crearEntrada()
    {
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $ordenes_trabajos = OrdenTrabajo::where('estado', 'a')->orderBy('descripcion', 'ASC')->get();
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

        return view('entrada.create', compact( 'talleres', 'ordenes_trabajos', 'empleados', 'usuarios'));
    }

    public function guardarEntrada(Request $request)
    {
        try {
            \DB::beginTransaction();

            $entrada = new Entrada();
            $entrada->taller_id     = $request->taller_id;
            $entrada->ot_id         = $request->ot_id;
            $entrada->empleado_id   = \Auth::user()->empleado->id;
            $entrada->save();

            \DB::commit();

            session()->flash('msg', 'Entrada creada exitosamente');
            session()->flash('type', 'success');

            return redirect()->route('stock.entradas.editar', $entrada->id);
        }catch (\Exception $e){
            \DB::rollBack();

            session()->flash('msg', 'No se ha podido crear la entrada');
            session()->flash('type', 'error');

            return redirect()->back();
        }
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $ordenes_trabajos = OrdenTrabajo::orderBy('descripcion', 'ASC')->get();
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

        return view('entrada.create', compact( 'talleres', 'ordenes_trabajos', 'empleados', 'usuarios'));
    }

    public function editarEntrada($id)
    {
        $entrada = Entrada::find($id);

        return view('entrada.edit', compact( 'entrada'));
    }

    public function salidas()
    {

    }
}
