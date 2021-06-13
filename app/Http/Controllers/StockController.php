<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Entrada;
use App\Models\OrdenTrabajo;
use App\Models\Salida;
use App\Models\Sector;
use App\Models\Taller;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
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

        $sectores = Sector::pluck('descripcion', 'id');

        $ordenes_trabajos->each(function ($orden){
            return $orden->descripcion = '#'.$orden->id.' - '.$orden->cliente->razon_social;
        });

        return view('entrada.create', compact( 'talleres', 'ordenes_trabajos', 'empleados', 'usuarios', 'sectores'));
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

            $entrada->ordentrabajo->ordenes_repuestos()->update(['sector_id' => $request->sector_id]);
            $entrada->ordentrabajo()->update(['sector_id' => $request->sector_id]);

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
    }

    public function editarEntrada($id)
    {
        $entrada = Entrada::find($id);

        return view('entrada.edit', compact( 'entrada'));
    }

    /*
     * Seccion salida de repuestos
     */
    public function salidas()
    {
        $salidas = Salida::all();



        return view('salida.index', compact('salidas'));
    }

    public function crearSalida()
    {
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $ordenes_trabajos = OrdenTrabajo::where('estado', 'a')->orderBy('descripcion', 'ASC')->get();
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

        $ordenes_trabajos->each(function ($orden){
            return $orden->descripcion = '#'.$orden->id.' - '.$orden->cliente->razon_social;
        });

        return view('salida.create', compact( 'talleres', 'ordenes_trabajos', 'empleados', 'usuarios'));
    }

    public function guardarSalida(Request $request)
    {
        try {
            \DB::beginTransaction();

            $salida = new Salida();
            $salida->taller_id     = $request->taller_id;
            $salida->ot_id         = $request->ot_id;
            $salida->empleado_id   = \Auth::user()->empleado->id;
            $salida->save();

            \DB::commit();

            session()->flash('msg', 'Salida creada exitosamente');
            session()->flash('type', 'success');

            return redirect()->route('stock.salidas.editar', $salida->id);
        }catch (\Exception $e){
            \DB::rollBack();

            session()->flash('msg', 'No se ha podido crear la salida');
            session()->flash('type', 'error');

            return redirect()->back();
        }
    }

    public function editarSalida($id)
    {
        $salida = Salida::find($id);

        return view('salida.edit', compact( 'salida'));
    }
}
