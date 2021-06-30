<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] OrdenesTrabajos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] OrdenTrabajo
// $nombres  = $gen->tabla['ZnombresZ'] ordenes_trabajos
// $nombre   = $gen->tabla['ZnombreZ'] orden_trabajo
// GENISA Begin

namespace App\Http\Controllers;

use App\Mail\EnvioPresupuesto;
use App\Models\Bitacora;
use App\Models\Entrega;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Model;
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
use Illuminate\Support\Facades\Mail;

class OrdenTrabajoController extends Controller
{

    public function index()
    {

        $ordenes_trabajos = OrdenTrabajo::all();

        $ordenes_trabajos->each(function ($orden_trabajo) {
            foreach ((new OrdenTrabajo())->getTipos() as $clave => $valor)
                trim($orden_trabajo->tipo) == trim($valor) ? $orden_trabajo->tipo = $clave : NULL;
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

        $orden_trabajo = new OrdenTrabajo(); //
// Construct all cons data base model dropdown list char 1
        $tipos = $orden_trabajo->getTipos(); // tipos
        $estados = $orden_trabajo->getEstados(); // estados
        $prioridades = $orden_trabajo->getPrioridades(); // prioridades

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

    public function store(StoreOrdenTrabajoRequest $request)
    {
        try {
            DB::beginTransaction();
            $orden_trabajo = new OrdenTrabajo($request->all());
            $orden_trabajo->save();

            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Log::error('Error en OrdenTrabajoController@store: ' . $e);
            return redirect()
                ->route('orden_trabajo.index')
                ->with('msg', 'Ocurrio un error')
                ->with('type', 'danger');
        }
        Log::info('OrdenTrabajo registro creado');
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

            Log::info('OrdenTrabajo registro eliminado');
            return redirect()
                ->route('orden_trabajo.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Error en OrdenTrabajoController@destroy: ' . $e);
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
        $grupos = Grupo::orderBy('descripcion', 'ASC')->get();
        $usuarios = Usuario::orderBy('usuario', 'ASC')->get();

        // Set all function cons base model dropdown list char 1
        $tipos = $orden_trabajo->getTipos(); // tipos
        $estados = $orden_trabajo->getEstados(); // estados
        $prioridades = $orden_trabajo->getPrioridades(); // prioridades

        /*foreach ((new OrdenTrabajo())->getEstados() as $clave => $valor)
            trim($orden_trabajo->estado) == trim($valor) ? $orden_trabajo->estado = $clave : NULL;*/


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
            Log::info('OrdenTrabajo registro actualizado ');
            return redirect()
                ->route('orden_trabajo.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error en OrdenTrabajoController@update: ' . $e);
            return redirect()
                ->route('orden_trabajo.index')
                ->with('type', 'danger')
                ->with('msg', 'Ocurrio un error');
        }

    }

    public function factory()
    {
        factory('App\Models\OrdenTrabajo')->create();
        Log::warning('Factory creado en OrdenTrabajo ');
        return redirect()
            ->route('orden_trabajo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    /*
     * Confirmacion de Orden de Trabajo
     */
    public function confirmacionOt()
    {
        $ordenestrabajos = OrdenTrabajo::where('estado', '=', OrdenTrabajo::ESTADO_PENDIENTE)->get();

        return view('confirmacionot.index', compact('ordenestrabajos'));
    }

    public function verConfirmacionOt($id)
    {
        $ordentrabajo = OrdenTrabajo::find($id);

        if ($ordentrabajo->ordenes_servicios) {
            foreach ($ordentrabajo->ordenes_servicios as $servicio) {
                $arrayItems[$servicio->id] = $servicio->toArray();
                $arrayItems[$servicio->id]['subtotal'] = $servicio->precio_venta * 1;
                $arrayItems[$servicio->id]['quantity'] = 1;
                $arrayItems[$servicio->id]['clasificacion'] = $servicio->clasificacion->descripcion;
            }
        }

        if ($ordentrabajo->ordenes_repuestos) {
            foreach ($ordentrabajo->ordenes_repuestos as $repuesto) {
                $arrayItems[$repuesto->id] = $repuesto->toArray();
                $arrayItems[$repuesto->id]['subtotal'] = $repuesto->precio_venta * $repuesto->pivot->cantidad;
                $arrayItems[$repuesto->id]['quantity'] = $repuesto->pivot->cantidad;
                $arrayItems[$repuesto->id]['clasificacion'] = $repuesto->clasificacion->descripcion;
            }
        }

        $sectores = Sector::pluck('descripcion', 'id');
        $grupos = Grupo::pluck('descripcion', 'id');

        return view('confirmacionot.edit', compact('ordentrabajo', 'arrayItems', 'sectores', 'grupos'));
    }

    public function actualizarConfirmacionOt(Request $request, $id)
    {
        $ordentrabajo = OrdenTrabajo::find($id);

        try {
            DB::beginTransaction();

            $ordentrabajo->sector_id = $request->sector_id;
            $ordentrabajo->grupo_id = $request->grupo_id;
            $ordentrabajo->save();

            foreach ($ordentrabajo->ordenes_repuestos as $repuesto) {
                $ordentrabajo->ordenes_repuestos()->updateExistingPivot($repuesto->id, array('sector_id' => $request->sector_id), false);
            }

            DB::commit();


            session()->flash('msg', 'Confirmación actualizada');
            session()->flash('type', 'success');

            return redirect()->route('confirmacionot');

        }catch (\Exception $e){
            DB::rollBack();
            dd($e->getLine().' - '.$e->getMessage());

            session()->flash('msg', 'Confirmación actualizada');
            session()->flash('type', 'success');

            return redirect()->back();
        }
    }

    public function confirmarOt($id)
    {

        $ordentrabajo = OrdenTrabajo::find($id);

        try {

            $ordentrabajo->estado = OrdenTrabajo::ESTADO_ACEPTADO;
            $ordentrabajo->save();

            /*
             * Insercion en Bitacora
             */
            if ($ordentrabajo->bitacora->where('estado', Bitacora::ESTADO_PRESUPUESTO_APROBADO)->count() == 0) {
                if (!(new BitacoraController())
                    ->create($ordentrabajo->id, date('Y-m-d H:i'), Bitacora::ESTADO_PRESUPUESTO_APROBADO,
                        (new Bitacora())->getEstadoDesc(Bitacora::ESTADO_PRESUPUESTO_APROBADO))) {
                    throw new \Exception('No se pudo crear la bitacora');
                }
            }

            /*
             * Insercion en Bitacora
             */
            if ($ordentrabajo->bitacora->where('estado', Bitacora::ESTADO_TRABAJO_INICIADO)->count() == 0) {
                if (!(new BitacoraController())
                    ->create($ordentrabajo->id, date('Y-m-d H:i'), Bitacora::ESTADO_TRABAJO_INICIADO,
                        (new Bitacora())->getEstadoDesc(Bitacora::ESTADO_TRABAJO_INICIADO))) {
                    throw new \Exception('No se pudo crear la bitacora');
                }
            }

            session()->flash('msg', 'Orden confirmada');
            session()->flash('type', 'success');

            return redirect()->back();

        } catch (\Exception $e) {
            session()->flash('msg', 'No se pudo confirmar la orden');
            session()->flash('type', 'error');

            return redirect()->back();
        }
    }

    public function cancelarOt($id)
    {
        $ordentrabajo = OrdenTrabajo::find($id);

        try {

            $ordentrabajo->estado = OrdenTrabajo::ESTADO_CANCELADO;
            $ordentrabajo->save();

            /*
             * Insercion en Bitacora
             */
            if ($ordentrabajo->bitacora->where('estado', Bitacora::ESTADO_PRESUPUESTO_RECHAZADO)->count() == 0) {
                if (!(new BitacoraController())
                    ->create($ordentrabajo->id, date('Y-m-d H:i'), Bitacora::ESTADO_PRESUPUESTO_RECHAZADO,
                        (new Bitacora())->getEstadoDesc(Bitacora::ESTADO_PRESUPUESTO_RECHAZADO))) {
                    throw new \Exception('No se pudo crear la bitacora');
                }
            }

            session()->flash('msg', 'Orden cancelada');
            session()->flash('type', 'success');

            return redirect()->back();

        } catch (\Exception $e) {
            session()->flash('msg', 'No se pudo cancelar la orden');
            session()->flash('type', 'error');

            return redirect()->back();
        }
    }

    public function enviarPresupuesto($orden)
    {
        // Enviar presupuesto PDF
        $orden = OrdenTrabajo::find($orden);

        try {
            Mail::to($orden->cliente->email)->send(new EnvioPresupuesto($orden));

            /*
             * Insercion en Bitacora
             */
            if ($orden->bitacora->where('estado', Bitacora::ESTADO_PRESUPUESTO_CONFECCIONADO)->count() == 0) {
                if (!(new BitacoraController())
                    ->create($orden->id, date('Y-m-d H:i'), Bitacora::ESTADO_PRESUPUESTO_CONFECCIONADO,
                        (new Bitacora())->getEstadoDesc(Bitacora::ESTADO_PRESUPUESTO_CONFECCIONADO))) {
                    throw new \Exception('No se pudo crear la bitacora');
                }
            }

            /*
             * Insercion en Bitacora
             */
            if ($orden->bitacora->where('estado', Bitacora::ESTADO_PRESUPUESTO_ENVIADO)->count() == 0) {
                if (!(new BitacoraController())
                    ->create($orden->id, date('Y-m-d H:i'), Bitacora::ESTADO_PRESUPUESTO_ENVIADO,
                        (new Bitacora())->getEstadoDesc(Bitacora::ESTADO_PRESUPUESTO_ENVIADO))) {
                    throw new \Exception('No se pudo crear la bitacora');
                }
            }

            session()->flash('msg', 'Presupuesto enviado');
            session()->flash('type', 'success');

            return redirect()->back();

        }catch (\Exception $e){
            dd($e->getMessage());
            session()->flash('msg', 'No se pudo enviar el presupuesto');
            session()->flash('type', 'error');

            \Log::error('OrdenTrabajoController@enviarPresupuesto Line: ' . $e->getLine() . ' - Message: ' . $e->getMessage());

            return redirect()->back();
        }
    }

    /*
     * SERVICIOS REALIZADOS
     */
    public function realizadosOt()
    {
        $ordenestrabajos = OrdenTrabajo::where('estado', '=', 'a')->get();

        return view('realizacionot.index', compact('ordenestrabajos'));
    }

    public function editarServiciosRealizados($id)
    {
        $ordentrabajo = OrdenTrabajo::find($id);

        foreach ($ordentrabajo->ordenes_repuestos as $repuesto) {

            if (($ordentrabajo
                    ->sector->productos_servicios()
                    ->where('id', $repuesto->id)->first()->pivot->cantidad + $repuesto->pivot->usado) < $repuesto->pivot->cantidad){

                session()->flash('msg', 'No hay stock suficiente para el producto '.$repuesto->descripcion. ' en el sector '.$ordentrabajo->sector->descripcion);
                session()->flash('type', 'danger');

                return redirect()->back();
            }
        }

        return view('realizacionot.edit', compact('ordentrabajo'));
    }

    /*
     * Verificaciones OT
     */
    public function verificadosOt()
    {
        $ordenestrabajos = OrdenTrabajo::where('estado', '=', 'r')->get();

        return view('verificacionot.index', compact('ordenestrabajos'));
    }

    public function editarVerificados($id)
    {
        $ordentrabajo = OrdenTrabajo::find($id);

        return view('verificacionot.edit', compact('ordentrabajo'));
    }

    /*
     * Finalizacion OT
     */
    public function finalizadosOt()
    {
        $ordenestrabajos = OrdenTrabajo::where('estado', '=', 'v')->get();

        return view('finalizacionot.index', compact('ordenestrabajos'));
    }

    public function editarFinalizados($id)
    {
        $ordentrabajo = OrdenTrabajo::find($id);
        foreach ((new OrdenTrabajo())->getEstados() as $clave => $valor)
            trim($ordentrabajo->estado) == trim($valor) ? $ordentrabajo->estado = $clave : NULL;

        return view('finalizacionot.edit', compact('ordentrabajo'));
    }

    /*
     * Entregas
     */
    public function entregas()
    {
        $entregas = Entrega::all();

        return view('entregavehiculo.index', compact('entregas'));
    }

    public function crearEntrega()
    {
        //$entrega = Entrega::find($id);

        return view('entregavehiculo.create');
    }
}

?>
