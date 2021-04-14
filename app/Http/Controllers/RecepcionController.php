<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Recepciones
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Recepcion
// $nombres  = $gen->tabla['ZnombresZ'] recepciones
// $nombre   = $gen->tabla['ZnombreZ'] recepcion
// GENISA Begin

namespace App\Http\Controllers;

use App\Http\Requests\Recepcion\StoreRecepcionRequest;
use App\Http\Requests\Recepcion\UpdateRecepcionRequest;
use App\Models\Recepcion;
use App\Models\Taller;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecepcionController extends Controller
{

    public function index()
    {
        $recepciones = Recepcion::all();
        $recepciones->each(function ($recepcion) {


        });
        return view('recepcion.index', compact('recepciones', $recepciones));
    }

    public function create()
    {
// Get all data fk tables
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $reservas = Reserva::orderBy('id', 'ASC')->get();
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();
        $vehiculos = Vehiculo::orderBy('chapa', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

        $recepcion   = new Recepcion(); //
// Construct all cons data base model dropdown list char 1

        return view('recepcion.edit')
// Send all fk variables
            ->with('talleres', $talleres)
            ->with('reservas', $reservas)
            ->with('clientes', $clientes)
            ->with('vehiculos', $vehiculos)
            ->with('usuarios', $usuarios)
// Send all cons variables
            ;
    }

    public function store(StoreRecepcionRequest $request )
    {
        try {
            DB::beginTransaction();

            $recepcion = new Recepcion($request->all());
            $recepcion->save();


            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
        }
        return redirect()
            ->route('recepcion.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        try {
            $recepcion = Recepcion::findOrFail($request->id);
            $recepcion->delete();

            return redirect()
                ->route('recepcion.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            //dd($e);
            return redirect()->route('recepcion.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Recepcion $recepcion)
    {
// Get all data fk tables
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $reservas = Reserva::orderBy('descripcion', 'ASC')->get();
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();
        $vehiculos = Vehiculo::orderBy('chapa', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

// Set all function cons base model dropdown list char 1

        return view('recepcion.edit')
            ->with('recepcion', $recepcion)
// Send all fk variables
            ->with('talleres', $talleres)
            ->with('reservas', $reservas)
            ->with('clientes', $clientes)
            ->with('vehiculos', $vehiculos)
            ->with('usuarios', $usuarios)

// Send all cons variables
            ;
    }

    public function update(UpdateRecepcionRequest $request, Recepcion $recepcion)
    {
        try {
            DB::beginTransaction();
            $recepcion->fill($request->all());
            $recepcion->save();
            DB::commit();
            return redirect()
                ->route('recepcion.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()
                ->route('recepcion.index')
                ->with('type', 'danger')
                ->with('msg', 'Ocurrio un error');
        }
//
//        $requestData = $request->all();
////        $requestData['fecha_ingreso'] = date("Y-m-d H:i:s", strtotime(request('fecha_ingreso')));
////        $requestData['fecha_egreso'] = date("Y-m-d H:i:s", strtotime(request('fecha_egreso')));
//        $empleado->fill($requestData);
//        $empleado->save();


    }
    public function factory()
    {
        factory('App\Models\Recepcion')->create();
        return redirect()
            ->route('recepcion.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}


