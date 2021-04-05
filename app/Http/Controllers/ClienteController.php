<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Clientes
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Cliente
// $nombres  = $gen->tabla['ZnombresZ'] clientes
// $nombre   = $gen->tabla['ZnombreZ'] cliente
// GENISA Begin

namespace App\Http\Controllers;

use App\Http\Requests\Cliente\StoreClienteRequest;
use App\Http\Requests\Cliente\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\Localidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        $clientes->each(function ($cliente) {

            $cliente->personerias === Cliente::PERSONERIA_SOCIEDADES   ? $cliente->personerias = 'PERSONERIA_SOCIEDADES' : "" ;
            $cliente->personerias === Cliente::PERSONERIA_CIVILES   ? $cliente->personerias = 'PERSONERIA_CIVILES' : "" ;
            $cliente->personerias === Cliente::PERSONERIA_SIMPLES    ? $cliente->personerias = 'PERSONERIA_SIMPLES ' : "" ;
            $cliente->personerias === Cliente::PERSONERIA_FUNDACIONES   ? $cliente->personerias = 'PERSONERIA_FUNDACIONES' : "" ;
            $cliente->personerias === Cliente::PERSONERIA_ENTIDADES   ? $cliente->personerias = 'PERSONERIA_ENTIDADES' : "" ;
            $cliente->personerias === Cliente::PERSONERIA_MUTUALES   ? $cliente->personerias = 'PERSONERIA_MUTUALES' : "" ;
            $cliente->personerias === Cliente::PERSONERIA_COOPERATIVAS   ? $cliente->personerias = 'PERSONERIA_COOPERATIVAS' : "" ;
            $cliente->personerias === Cliente::PERSONERIA_CONSORCIOS   ? $cliente->personerias = 'PERSONERIA_CONSORCIOS' : "" ;

        });
        return view('cliente.index', compact('clientes', $clientes));
    }

    public function create()
    {
// Get all data fk tables
        $localidades = Localidad::orderBy('descripcion', 'ASC')->get();

        $cliente   = new Cliente(); //
// Construct all cons data base model dropdown list char 1
        $personerias = $cliente->getPersonerias() ; // personerias

        return view('cliente.edit')
// Send all fk variables
            ->with('localidades', $localidades)
            ->with('personerias', $personerias)
// Send all cons variables
            ;
    }

    public function store(StoreClienteRequest $request )
    {
        try {
            DB::beginTransaction();

            $cliente = new Cliente($request->all());
            $cliente->save();


            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
        }
        return redirect()
            ->route('cliente.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        try {
            $cliente = Cliente::findOrFail($request->id);
            $cliente->delete();

            return redirect()
                ->route('cliente.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            //dd($e);
            return redirect()->route('cliente.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Cliente $cliente)
    {
// Get all data fk tables
        $localidades = Localidad::orderBy('descripcion', 'ASC')->get();

// Set all function cons base model dropdown list char 1
        $personerias = $cliente->getPersonerias() ; // personerias

        return view('cliente.edit')
            ->with('cliente', $cliente)
// Send all fk variables
            ->with('localidades', $localidades)

// Send all cons variables
            ->with('personerias', $personerias)  // personerias
            ;
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        try {
            DB::beginTransaction();
            $cliente->fill($request->all());
            $cliente->save();
            DB::commit();
            return redirect()
                ->route('cliente.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()
                ->route('cliente.index')
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
        factory('App\Models\Cliente')->create();
        return redirect()
            ->route('cliente.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

?>

