<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ProductosServicios
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] ProductoServicio
// $nombres  = $gen->tabla['ZnombresZ'] productos_servicios
// $nombre   = $gen->tabla['ZnombreZ'] producto_servicio
// GENISA Begin

namespace App\Http\Controllers;

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


            //OPCION 2

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

        return view('producto_servicio.edit')
// Send all fk variables
            ->with('clasificaciones', $clasificaciones)
            ->with('unidades', $unidades)
// Send all cons variables
            ;
    }

    public function store(StoreProductoServicioRequest $request )
    {
        try {
            DB::beginTransaction();

            $producto_servicio = new ProductoServicio($request->all());
            $producto_servicio->save();


            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
        }
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

            return redirect()
                ->route('producto_servicio.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            //dd($e);
            return redirect()->route('producto_servicio.index')->with('error', $e->getMessage());
        }
    }

    public function edit(ProductoServicio $producto_servicio)
    {
// Get all data fk tables
        $clasificaciones = Clasificacion::orderBy('descripcion', 'ASC')->get();
        $unidades = Unidad::orderBy('descripcion', 'ASC')->get();

// Set all function cons base model dropdown list char 1

        return view('producto_servicio.edit')
            ->with('producto_servicio', $producto_servicio)
// Send all fk variables
            ->with('clasificaciones', $clasificaciones)
            ->with('unidades', $unidades)

// Send all cons variables
            ;
    }

    public function update(UpdateProductoServicioRequest $request, ProductoServicio $producto_servicio)
    {
        try {
            DB::beginTransaction();
            $producto_servicio->fill($request->all());
            $producto_servicio->save();
            DB::commit();
            return redirect()
                ->route('producto_servicio.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()
                ->route('producto_servicio.index')
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
        factory('App\Models\ProductoServicio')->create();
        return redirect()
            ->route('producto_servicio.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}
