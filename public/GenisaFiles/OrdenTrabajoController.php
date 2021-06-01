<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] OrdenesTrabajos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] OrdenTrabajo
// $nombres  = $gen->tabla['ZnombresZ'] ordenes_trabajos
// $nombre   = $gen->tabla['ZnombreZ'] orden_trabajo
// GENISA Begin

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\OrdenTrabajo\StoreOrdenTrabajoRequest;
use App\Http\Requests\OrdenTrabajo\UpdateOrdenTrabajoRequest;
use App\Models\OrdenTrabajo;
use App\Models\Taller;
use App\Models\Recepcion;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenTrabajoController extends Controller
{

    public function index()
    {
        $ordenes_trabajos = OrdenTrabajo::all();

        $ordenes_trabajos->each(function ($orden_trabajo) {
            foreach ((new OrdenTrabajo())->getTipos() as $clave=>$valor)
        trim($orden_trabajo->tipo) == trim($valor) ? $orden_trabajo->tipo = $clave : NULL ;
                    foreach ((new OrdenTrabajo())->getEstados() as $clave=>$valor)
        trim($orden_trabajo->estado) == trim($valor) ? $orden_trabajo->estado = $clave : NULL ;
                            foreach ((new OrdenTrabajo())->getPrioridades() as $clave=>$valor)
        trim($orden_trabajo->prioridad) == trim($valor) ? $orden_trabajo->prioridad = $clave : NULL ;
            
        //OPCION 2
        // $orden_trabajo->tipo === OrdenTrabajo::TIPO_UNO   ? $orden_trabajo->tipo = 'TIPO_UNO' : "" ;
        // $orden_trabajo->estado === OrdenTrabajo::ESTADO_PENDIENTE   ? $orden_trabajo->estado = 'ESTADO_PENDIENTE' : "" ;
        // $orden_trabajo->estado === OrdenTrabajo::ESTADO_CANCELADO   ? $orden_trabajo->estado = 'ESTADO_CANCELADO' : "" ;
        // $orden_trabajo->estado === OrdenTrabajo::ESTADO_ACEPTADO   ? $orden_trabajo->estado = 'ESTADO_ACEPTADO' : "" ;
        // $orden_trabajo->prioridad === OrdenTrabajo::PRIORIDAD_NORMAL   ? $orden_trabajo->prioridad = 'PRIORIDAD_NORMAL' : "" ;
        // $orden_trabajo->prioridad === OrdenTrabajo::PRIORIDAD_URGENTE   ? $orden_trabajo->prioridad = 'PRIORIDAD_URGENTE' : "" ;

        });
        return view('orden_trabajo.index', compact('ordenes_trabajos', $ordenes_trabajos));
    }

    public function create()
    {
// Get all data fk tables
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $recepciones = Recepcion::orderBy('id', 'ASC')->get();
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();
        $vehiculos = Vehiculo::orderBy('id', 'ASC')->get();
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $grupos = Grupo::orderBy('apellidos', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

        $orden_trabajo   = new OrdenTrabajo(); // 
// Construct all cons data base model dropdown list char 1
        $tipos = $orden_trabajo->getTipos() ; // tipos
        $estados = $orden_trabajo->getEstados() ; // estados
        $prioridades = $orden_trabajo->getPrioridades() ; // prioridades

        return view('orden_trabajo.edit')
// Send all fk variables
            ->with('talleres', $talleres)
            ->with('recepciones', $recepciones)
            ->with('clientes', $clientes)
            ->with('vehiculos', $vehiculos)
            ->with('empleados', $empleados)
            ->with('grupos', $grupos)
            ->with('tipos', $tipos)
            ->with('prioridades', $prioridades)
            ->with('estados', $estados)
            ->with('usuarios', $usuarios)
// Send all cons variables
            ->with('tipos', $tipos)  // tipos
            ->with('estados', $estados)  // estados
            ->with('prioridades', $prioridades)  // prioridades
;
    }

    public function store(StoreOrdenTrabajoRequest $request )
    {
        try {
        DB::beginTransaction();
            $orden_trabajo = new OrdenTrabajo($request->all());
            $orden_trabajo->save();

                                                                DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error( 'Error en OrdenTrabajoController@store: '. $e ) ;
            return redirect()
                ->route('orden_trabajo.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
        Log::info( 'OrdenTrabajo registro creado' ) ;
        return redirect()
            ->route('orden_trabajo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');

    }

    public function destroy(Request $request)
    {
        try {
            $orden_trabajo = OrdenTrabajo::findOrFail($request->id);
            $orden_trabajo->delete();

            Log::info( 'OrdenTrabajo registro eliminado' ) ;
            return redirect()
                ->route('orden_trabajo.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error( 'Error en OrdenTrabajoController@destroy: '. $e ) ;
            return redirect()
                ->route('orden_trabajo.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
    }

    public function edit(OrdenTrabajo $orden_trabajo)
    {
// Get all data fk tables
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $recepciones = Recepcion::orderBy('id', 'ASC')->get();
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();
        $vehiculos = Vehiculo::orderBy('id', 'ASC')->get();
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $grupos = Grupo::orderBy('apellidos', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

// Set all function cons base model dropdown list char 1 
        $tipos = $orden_trabajo->getTipos() ; // tipos
        $estados = $orden_trabajo->getEstados() ; // estados
        $prioridades = $orden_trabajo->getPrioridades() ; // prioridades

        return view('orden_trabajo.edit')
            ->with('orden_trabajo', $orden_trabajo)
// Send all fk variables
            ->with('talleres', $talleres)
            ->with('recepciones', $recepciones)
            ->with('clientes', $clientes)
            ->with('vehiculos', $vehiculos)
            ->with('empleados', $empleados)
            ->with('grupos', $grupos)
            ->with('usuarios', $usuarios)

// Send all cons variables 
            ->with('tipos', $tipos)  // tipos
            ->with('estados', $estados)  // estados
            ->with('prioridades', $prioridades)  // prioridades
;
    }

    public function update(UpdateOrdenTrabajoRequest $request, OrdenTrabajo $orden_trabajo)
    {
        try {
            DB::beginTransaction();
            $orden_trabajo->fill($request->all());
            $orden_trabajo->save();
            DB::commit();
            Log::info( 'OrdenTrabajo registro actualizado ') ;
            return redirect()
                ->route('orden_trabajo.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            Log::error( 'Error en OrdenTrabajoController@update: '. $e ) ;
            return redirect()
                ->route('orden_trabajo.index')
                ->with('type', 'danger')
                ->with('msg', 'Ocurrio un error');
        }

    }
    public function factory()
    {
        factory('App\Models\OrdenTrabajo')->create();
        Log::warning( 'Factory creado en OrdenTrabajo ') ;
        return redirect()
            ->route('orden_trabajo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

?>