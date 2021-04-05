<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Descansos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Descanso
// $nombres  = $gen->tabla['ZnombresZ'] descansos
// $nombre   = $gen->tabla['ZnombreZ'] descanso
// GENISA Begin

namespace App\Http\Controllers;

use App\Http\Requests\Descanso\StoreDescansoRequest;
use App\Http\Requests\Descanso\UpdateDescansoRequest;
use App\Models\Descanso;
use App\Models\Parametro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DescansoController extends Controller
{

    public function index()
    {
        $descansos = Descanso::all();
        $descansos->each(function ($descanso) {


        });
        return view('descanso.index', compact('descansos', $descansos));
    }

    public function create()
    {
// Get all data fk tables
        $parametros = Parametro::orderBy('id', 'ASC')->get();

        $descanso   = new Descanso(); //
// Construct all cons data base model dropdown list char 1

        return view('descanso.edit')
// Send all fk variables
            ->with('parametros', $parametros)
// Send all cons variables
            ;
    }

    public function store(StoreDescansoRequest $request )
    {
        try {
            DB::beginTransaction();

            $descanso = new Descanso($request->all());
            $descanso->save();


            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
        }
        return redirect()
            ->route('descanso.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        try {
            $descanso = Descanso::findOrFail($request->id);
            $descanso->delete();

            return redirect()
                ->route('descanso.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            //dd($e);
            return redirect()->route('descanso.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Descanso $descanso)
    {
// Get all data fk tables
        $parametros = Parametro::orderBy('id', 'ASC')->get();

// Set all function cons base model dropdown list char 1

        return view('descanso.edit')
            ->with('descanso', $descanso)
// Send all fk variables
            ->with('parametros', $parametros)

// Send all cons variables
            ;
    }

    public function update(UpdateDescansoRequest $request, Descanso $descanso)
    {
        try {
            DB::beginTransaction();
            $descanso->fill($request->all());
            $descanso->save();
            DB::commit();
            return redirect()
                ->route('descanso.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()
                ->route('descanso.index')
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
        factory('App\Models\Descanso')->create();
        return redirect()
            ->route('descanso.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

?>

