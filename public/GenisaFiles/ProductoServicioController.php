<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\ProductoServicio\StoreProductoServicioRequest;
use App\Http\Requests\ProductoServicio\UpdateProductoServicioRequest;
use App\Models\ProductoServicio;
use App\Models\Clasificacion;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoServicioController extends Controller
{

    public function index()
    {
        $productos_servicios = ProductoServicio::all();

        $productos_servicios->each(function ($producto_servicio) {
        foreach ((new ProductoServicio())->getEstados() as $clave=>$valor)
        trim($producto_servicio->estado) == trim($valor) ? $producto_servicio->estado = $clave : NULL ;

        //OPCION 2
        // $producto_servicio->estado === ProductoServicio::ESTADO_ACTIVO   ? $producto_servicio->estado = 'ESTADO_ACTIVO' : "" ;
        // $producto_servicio->estado === ProductoServicio::ESTADO_INACTIVO   ? $producto_servicio->estado = 'ESTADO_INACTIVO' : "" ;

        });
        return view('producto_servicio.index', compact('productos_servicios', $productos_servicios));
    }

    public function create()
    {
// Get all data fk tables
        $clasificaciones = Clasificacion::orderBy('descripcion', 'ASC')->get();
        $unidades = Unidad::orderBy('descripcion', 'ASC')->get();

        $producto_servicio   = new ProductoServicio(); // 
// Construct all cons data base model dropdown list char 1
        $estados = $producto_servicio->getEstados() ; // estados

        return view('producto_servicio.edit')
// Send all fk variables
            ->with('clasificaciones', $clasificaciones)
            ->with('unidades', $unidades)
            ->with('estados', $estados)
// Send all cons variables
;
    }

    public function store(StoreProductoServicioRequest $request )
    {
        try {
        DB::beginTransaction();
            $producto_servicio = new ProductoServicio($request->all());
            $producto_servicio->save();

           foreach ($request->sector_id as $item) {
//               $existencias_manejos = new ExistenciaManejo::class();
//               $existencias_manejos->sector_id = $item;
//               $existencias_manejos->producto_servicio_id  = $producto_servicio->id;
//               $existencias_manejos->save();
//                Log::info( 'Detalle #sector_id agregado en ExistenciaManejo::class' ) ;
           }
            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error( 'Error en ProductoServicioController@store: '. $e ) ;
            return redirect()
                ->route('producto_servicio.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
        Log::info( 'ProductoServicio registro creado' ) ;
        return redirect()
            ->route('producto_servicio.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');

    }

    public function destroy(Request $request)
    {
        try {
            $producto_servicio = ProductoServicio::findOrFail($request->id);
            $producto_servicio->delete();

            Log::info( 'ProductoServicio registro eliminado' ) ;
            return redirect()
                ->route('producto_servicio.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error( 'Error en ProductoServicioController@destroy: '. $e ) ;
            return redirect()
                ->route('producto_servicio.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
    }

    public function edit(ProductoServicio $producto_servicio)
    {
// Get all data fk tables
        $clasificaciones = Clasificacion::orderBy('descripcion', 'ASC')->get();
        $unidades = Unidad::orderBy('descripcion', 'ASC')->get();

// Set all function cons base model dropdown list char 1 
        $estados = $producto_servicio->getEstados() ; // estados

        return view('producto_servicio.edit')
            ->with('producto_servicio', $producto_servicio)
// Send all fk variables
            ->with('clasificaciones', $clasificaciones)
            ->with('unidades', $unidades)

// Send all cons variables 
            ->with('estados', $estados)  // estados
;
    }

    public function update(UpdateProductoServicioRequest $request, ProductoServicio $producto_servicio)
    {
        try {
            DB::beginTransaction();
            $producto_servicio->fill($request->all());
            $producto_servicio->save();
            DB::commit();
            Log::info( 'ProductoServicio registro actualizado ') ;
            return redirect()
                ->route('producto_servicio.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            Log::error( 'Error en ProductoServicioController@update: '. $e ) ;
            return redirect()
                ->route('producto_servicio.index')
                ->with('type', 'danger')
                ->with('msg', 'Ocurrio un error');
        }

    }
    public function factory()
    {
        factory('App\Models\ProductoServicio')->create();
        Log::warning( 'Factory creado en ProductoServicio ') ;
        return redirect()
            ->route('producto_servicio.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

?>