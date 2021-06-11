<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Entradas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Entrada
// $nombres  = $gen->tabla['ZnombresZ'] entradas
// $nombre   = $gen->tabla['ZnombreZ'] entrada
// GENISA Begin

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\Entrada\StoreEntradaRequest;
use App\Http\Requests\Entrada\UpdateEntradaRequest;
use App\Models\Entrada;
use App\Models\Taller;
use App\Models\OrdenTrabajo;
use App\Models\Empleado;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntradaController extends Controller
{

    public function index()
    {
        $entradas = Entrada::all();

        $entradas->each(function ($entrada) {

        //OPCION 2

        });
        return view('entrada.index', compact('entradas', $entradas));
    }

    public function create()
    {
// Get all data fk tables
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $ordenes_trabajos = OrdenTrabajo::orderBy('descripcion', 'ASC')->get();
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

        $entrada   = new Entrada(); //
// Construct all cons data base model dropdown list char 1

        return view('entrada.create')
// Send all fk variables
            ->with('talleres', $talleres)
            ->with('ordenes_trabajos', $ordenes_trabajos)
            ->with('empleados', $empleados)
            ->with('usuarios', $usuarios)
// Send all cons variables
;
    }

    public function store(StoreEntradaRequest $request )
    {
        try {
        DB::beginTransaction();
            $entrada = new Entrada($request->all());
            $entrada->save();

                        DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error( 'Error en EntradaController@store: '. $e ) ;
            return redirect()
                ->route('entrada.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
        Log::info( 'Entrada registro creado' ) ;
        return redirect()
            ->route('entrada.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');

    }

    public function destroy(Request $request)
    {
        try {
            $entrada = Entrada::findOrFail($request->id);
            $entrada->delete();

            Log::info( 'Entrada registro eliminado' ) ;
            return redirect()
                ->route('entrada.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error( 'Error en EntradaController@destroy: '. $e ) ;
            return redirect()
                ->route('entrada.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
    }

    public function edit(Entrada $entrada)
    {
// Get all data fk tables
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $ordenes_trabajos = OrdenTrabajo::orderBy('descripcion', 'ASC')->get();
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

// Set all function cons base model dropdown list char 1

        return view('entrada.create')
            ->with('entrada', $entrada)
// Send all fk variables
            ->with('talleres', $talleres)
            ->with('ordenes_trabajos', $ordenes_trabajos)
            ->with('empleados', $empleados)
            ->with('usuarios', $usuarios)

// Send all cons variables
;
    }

    public function update(UpdateEntradaRequest $request, Entrada $entrada)
    {
        try {
            DB::beginTransaction();
            $entrada->fill($request->all());
            $entrada->save();
            DB::commit();
            Log::info( 'Entrada registro actualizado ') ;
            return redirect()
                ->route('entrada.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            Log::error( 'Error en EntradaController@update: '. $e ) ;
            return redirect()
                ->route('entrada.index')
                ->with('type', 'danger')
                ->with('msg', 'Ocurrio un error');
        }

    }
    public function factory()
    {
        factory('App\Models\Entrada')->create();
        Log::warning( 'Factory creado en Entrada ') ;
        return redirect()
            ->route('entrada.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

?>
