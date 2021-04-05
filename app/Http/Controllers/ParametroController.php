<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Parametros
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Parametro
// $nombres  = $gen->tabla['ZnombresZ'] parametros
// $nombre   = $gen->tabla['ZnombreZ'] parametro
// GENISA Begin

namespace App\Http\Controllers;

use App\Http\Requests\Parametro\StoreParametroRequest;
use App\Http\Requests\Parametro\UpdateParametroRequest;
use App\Models\Parametro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParametroController extends Controller
{

    public function index()
    {
        $parametros = Parametro::all();
        $parametros->each(function ($parametro) {


        });
        return view('parametro.index', compact('parametros', $parametros));
    }

    public function create()
    {
// Get all data fk tables

        $parametro   = new Parametro(); //
// Construct all cons data base model dropdown list char 1

        return view('parametro.edit')
// Send all fk variables
// Send all cons variables
            ;
    }

    public function store(StoreParametroRequest $request )
    {
        try {
            DB::beginTransaction();

            $parametro = new Parametro($request->all());
            $parametro->save();


            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
        }
        return redirect()
            ->route('parametro.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        try {
            $parametro = Parametro::findOrFail($request->id);
            $parametro->delete();

            return redirect()
                ->route('parametro.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            //dd($e);
            return redirect()->route('parametro.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Parametro $parametro)
    {
// Get all data fk tables

// Set all function cons base model dropdown list char 1

        return view('parametro.edit')
            ->with('parametro', $parametro)
// Send all fk variables

// Send all cons variables
            ;
    }

    public function update(UpdateParametroRequest $request, Parametro $parametro)
    {
        try {
            DB::beginTransaction();
            $parametro->fill($request->all());
            $parametro->save();
            DB::commit();
            return redirect()
                ->route('parametro.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()
                ->route('parametro.index')
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
        factory('App\Models\Parametro')->create();
        return redirect()
            ->route('parametro.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

?>

