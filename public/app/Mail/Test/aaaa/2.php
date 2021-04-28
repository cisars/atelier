<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Feriados
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Feriado
// $nombres  = $gen->tabla['ZnombresZ'] feriados
// $nombre   = $gen->tabla['ZnombreZ'] feriado
// GENISA Begin

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\Feriado\StoreFeriadoRequest;
use App\Http\Requests\Feriado\UpdateFeriadoRequest;
use App\Models\Feriado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeriadoController extends Controller
{

    public function index()
    {
        $feriados = Feriado::all();
        $feriados->each(function ($feriado) {

        foreach ((new Feriado())->getEstados() as $clave=>$valor)
        trim($feriado->estado) == trim($valor) ? $feriado->estado = $clave : NULL ;

        foreach ((new Feriado())->getEstados() as $clave=>$valor)
        trim($feriado->estado) == trim($valor) ? $feriado->estado = $clave : NULL ;


        //OPCION 2
        // $feriado->estado === Feriado::ESTADO_ACTIVO   ? $feriado->estado = 'ESTADO_ACTIVO' : "" ;
        // $feriado->estado === Feriado::ESTADO_INACTIVO   ? $feriado->estado = 'ESTADO_INACTIVO' : "" ;

        });
        return view('feriado.index', compact('feriados', $feriados));
    }

    public function create()
    {
// Get all data fk tables

        $feriado   = new Feriado(); // 
// Construct all cons data base model dropdown list char 1
        $estados = $feriado->getEstados() ; // estados

        return view('feriado.edit')
// Send all fk variables
            ->with('estados', $estados)
// Send all cons variables
;
    }

    public function store(StoreFeriadoRequest $request )
    {
        try {
        DB::beginTransaction();
            $feriado = new Feriado($request->all());
            $feriado->save();

            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error( 'Error en FeriadoController@store: '. $e ) ;
            return redirect()
                ->route('feriado.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
        Log::info( 'Feriado registro creado' ) ;
        return redirect()
            ->route('feriado.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');

    }

    public function destroy(Request $request)
    {
        try {
            $feriado = Feriado::findOrFail($request->id);
            $feriado->delete();

            Log::info( 'Feriado registro eliminado' ) ;
            return redirect()
                ->route('feriado.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error( 'Error en FeriadoController@destroy: '. $e ) ;
            return redirect()
                ->route('feriado.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
    }

    public function edit(Feriado $feriado)
    {
// Get all data fk tables

// Set all function cons base model dropdown list char 1 
        $estados = $feriado->getEstados() ; // estados

        return view('feriado.edit')
            ->with('feriado', $feriado)
// Send all fk variables

// Send all cons variables 
            ->with('estados', $estados)  // estados
;
    }

    public function update(UpdateFeriadoRequest $request, Feriado $feriado)
    {
        try {
            DB::beginTransaction();
            $feriado->fill($request->all());
            $feriado->save();
            DB::commit();
            Log::info( 'Feriado registro actualizado ') ;
            return redirect()
                ->route('feriado.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            Log::error( 'Error en FeriadoController@update: '. $e ) ;
            return redirect()
                ->route('feriado.index')
                ->with('type', 'danger')
                ->with('msg', 'Ocurrio un error');
        }

    }
    public function factory()
    {
        factory('App\Models\Feriado')->create();
        Log::warning( 'Factory creado en Feriado ') ;
        return redirect()
            ->route('feriado.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

?>