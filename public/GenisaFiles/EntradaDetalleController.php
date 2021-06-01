<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\EntradaDetalle\StoreEntradaDetalleRequest;
use App\Http\Requests\EntradaDetalle\UpdateEntradaDetalleRequest;
use App\Models\EntradaDetalle;
use App\Models\Entrada;
use App\Models\Sector;
use App\Models\ProductoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntradaDetalleController extends Controller
{

    public function index()
    {
        $entradas_detalles = EntradaDetalle::all();

        $entradas_detalles->each(function ($entrada_detalle) {

        //OPCION 2

        });
        return view('entrada_detalle.index', compact('entradas_detalles', $entradas_detalles));
    }

    public function create()
    {
// Get all data fk tables
        $entradas = Entrada::orderBy('id', 'ASC')->get();
        $sectores = Sector::orderBy('sector_id', 'ASC')->get();
        $productos_servicios = ProductoServicio::orderBy('producto_id', 'ASC')->get();

        $entrada_detalle   = new EntradaDetalle(); // 
// Construct all cons data base model dropdown list char 1

        return view('entrada_detalle.edit')
// Send all fk variables
            ->with('entradas', $entradas)
            ->with('sectores', $sectores)
            ->with('productos_servicios', $productos_servicios)
// Send all cons variables
;
    }

    public function store(StoreEntradaDetalleRequest $request )
    {
        try {
        DB::beginTransaction();
            $entrada_detalle = new EntradaDetalle($request->all());
            $entrada_detalle->save();

            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error( 'Error en EntradaDetalleController@store: '. $e ) ;
            return redirect()
                ->route('entrada_detalle.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
        Log::info( 'EntradaDetalle registro creado' ) ;
        return redirect()
            ->route('entrada_detalle.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');

    }

    public function destroy(Request $request)
    {
        try {
            $entrada_detalle = EntradaDetalle::findOrFail($request->id);
            $entrada_detalle->delete();

            Log::info( 'EntradaDetalle registro eliminado' ) ;
            return redirect()
                ->route('entrada_detalle.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error( 'Error en EntradaDetalleController@destroy: '. $e ) ;
            return redirect()
                ->route('entrada_detalle.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
    }

    public function edit(EntradaDetalle $entrada_detalle)
    {
// Get all data fk tables
        $entradas = Entrada::orderBy('id', 'ASC')->get();
        $sectores = Sector::orderBy('sector_id', 'ASC')->get();
        $productos_servicios = ProductoServicio::orderBy('producto_id', 'ASC')->get();

// Set all function cons base model dropdown list char 1 

        return view('entrada_detalle.edit')
            ->with('entrada_detalle', $entrada_detalle)
// Send all fk variables
            ->with('entradas', $entradas)
            ->with('sectores', $sectores)
            ->with('productos_servicios', $productos_servicios)

// Send all cons variables 
;
    }

    public function update(UpdateEntradaDetalleRequest $request, EntradaDetalle $entrada_detalle)
    {
        try {
            DB::beginTransaction();
            $entrada_detalle->fill($request->all());
            $entrada_detalle->save();
            DB::commit();
            Log::info( 'EntradaDetalle registro actualizado ') ;
            return redirect()
                ->route('entrada_detalle.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            Log::error( 'Error en EntradaDetalleController@update: '. $e ) ;
            return redirect()
                ->route('entrada_detalle.index')
                ->with('type', 'danger')
                ->with('msg', 'Ocurrio un error');
        }

    }
    public function factory()
    {
        factory('App\Models\EntradaDetalle')->create();
        Log::warning( 'Factory creado en EntradaDetalle ') ;
        return redirect()
            ->route('entrada_detalle.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

?>