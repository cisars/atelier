<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\OrdenServicio\StoreOrdenServicioRequest;
use App\Http\Requests\OrdenServicio\UpdateOrdenServicioRequest;
use App\Models\OrdenServicio;
use App\Models\OrdenTrabajo;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenServicioController extends Controller
{

    public function index()
    {
        $ordenes_servicios = OrdenServicio::all();

        $ordenes_servicios->each(function ($orden_servicio) {
            foreach ((new OrdenServicio())->getVerificados() as $clave=>$valor)
        trim($orden_servicio->verificado) == trim($valor) ? $orden_servicio->verificado = $clave : NULL ;
                        foreach ((new OrdenServicio())->getRealizados() as $clave=>$valor)
        trim($orden_servicio->realizado) == trim($valor) ? $orden_servicio->realizado = $clave : NULL ;
            
        //OPCION 2
        // $orden_servicio->verificado === OrdenServicio::VERIFICADO_SI   ? $orden_servicio->verificado = 'VERIFICADO_SI' : "" ;
        // $orden_servicio->verificado === OrdenServicio::VERIFICADO_NO   ? $orden_servicio->verificado = 'VERIFICADO_NO' : "" ;
        // $orden_servicio->realizado === OrdenServicio::REALIZADO_SI   ? $orden_servicio->realizado = 'REALIZADO_SI' : "" ;
        // $orden_servicio->realizado === OrdenServicio::REALIZADO_NO   ? $orden_servicio->realizado = 'REALIZADO_NO' : "" ;

        });
        return view('orden_servicio.index', compact('ordenes_servicios', $ordenes_servicios));
    }

    public function create()
    {
// Get all data fk tables
        $ordenes_trabajos = OrdenTrabajo::orderBy('descripcion', 'ASC')->get();
        $servicios = Servicio::orderBy('descripcion', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

        $orden_servicio   = new OrdenServicio(); // 
// Construct all cons data base model dropdown list char 1
        $verificados = $orden_servicio->getVerificados() ; // verificados
        $realizados = $orden_servicio->getRealizados() ; // realizados

        return view('orden_servicio.edit')
// Send all fk variables
            ->with('ordenes_trabajos', $ordenes_trabajos)
            ->with('servicios', $servicios)
            ->with('realizados', $realizados)
            ->with('verificados', $verificados)
            ->with('usuarios', $usuarios)
// Send all cons variables
            ->with('verificados', $verificados)  // verificados
            ->with('realizados', $realizados)  // realizados
;
    }

    public function store(StoreOrdenServicioRequest $request )
    {
        try {
        DB::beginTransaction();
            $orden_servicio = new OrdenServicio($request->all());
            $orden_servicio->save();

                    DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error( 'Error en OrdenServicioController@store: '. $e ) ;
            return redirect()
                ->route('orden_servicio.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
        Log::info( 'OrdenServicio registro creado' ) ;
        return redirect()
            ->route('orden_servicio.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');

    }

    public function destroy(Request $request)
    {
        try {
            $orden_servicio = OrdenServicio::findOrFail($request->id);
            $orden_servicio->delete();

            Log::info( 'OrdenServicio registro eliminado' ) ;
            return redirect()
                ->route('orden_servicio.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error( 'Error en OrdenServicioController@destroy: '. $e ) ;
            return redirect()
                ->route('orden_servicio.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
    }

    public function edit(OrdenServicio $orden_servicio)
    {
// Get all data fk tables
        $ordenes_trabajos = OrdenTrabajo::orderBy('descripcion', 'ASC')->get();
        $servicios = Servicio::orderBy('descripcion', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

// Set all function cons base model dropdown list char 1 
        $verificados = $orden_servicio->getVerificados() ; // verificados
        $realizados = $orden_servicio->getRealizados() ; // realizados

        return view('orden_servicio.edit')
            ->with('orden_servicio', $orden_servicio)
// Send all fk variables
            ->with('ordenes_trabajos', $ordenes_trabajos)
            ->with('servicios', $servicios)
            ->with('usuarios', $usuarios)

// Send all cons variables 
            ->with('verificados', $verificados)  // verificados
            ->with('realizados', $realizados)  // realizados
;
    }

    public function update(UpdateOrdenServicioRequest $request, OrdenServicio $orden_servicio)
    {
        try {
            DB::beginTransaction();
            $orden_servicio->fill($request->all());
            $orden_servicio->save();
            DB::commit();
            Log::info( 'OrdenServicio registro actualizado ') ;
            return redirect()
                ->route('orden_servicio.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            Log::error( 'Error en OrdenServicioController@update: '. $e ) ;
            return redirect()
                ->route('orden_servicio.index')
                ->with('type', 'danger')
                ->with('msg', 'Ocurrio un error');
        }

    }
    public function factory()
    {
        factory('App\Models\OrdenServicio')->create();
        Log::warning( 'Factory creado en OrdenServicio ') ;
        return redirect()
            ->route('orden_servicio.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

?>