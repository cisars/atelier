<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BitacoraController;
use App\Mail\CierreOt;
use App\Mail\EnvioPresupuesto;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\OrdenRepuesto;
use App\Models\OrdenServicio;
use App\Models\ProductoServicio;
use App\Models\Recepcion;
use App\Models\Sintoma;
use App\Models\Taller;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FinalizacionOt extends Component
{
    public $ordentrabajo;

    /*
     * Listas
     */
    public $talleres, $recepciones, $clientes, $vehiculos, $empleados, $grupos, $usuarios, $tipos, $estados, $prioridades, $insumos, $servicios;

    /*
     * Variables
     */
    public $prioridad, $descripcion, $enviarMail = false;

    public $arrayItems = [];

    public $quantity;

    public $sintomas;
    public $count = 0;
    public $vector;

    public function addSintoma($idSintoma)
    {
        $this->emit('addCambio', ['id' => $idSintoma]);
        $this->count++;
        $this->vector[$idSintoma] = Sintoma::find($idSintoma)->descripcion;

    }

    public function delSintoma($idSintoma)
    {
        $this->emit('delCambio', ['id' => $idSintoma]);
        //   dd($idSintoma);
        //unset(array_values($this->vector)[$idSintoma]);
        unset($this->vector[$idSintoma]);
    }

    public function addItem($id)
    {

        if (!array_key_exists($id, $this->arrayItems)) {
            $this->arrayItems[$id] = ProductoServicio::with('clasificacion')->where('id', $id)->first()->toArray();
            $this->arrayItems[$id]['quantity'] = 1;
            $this->arrayItems[$id]['subtotal'] = $this->arrayItems[$id]['precio_venta'];
            $this->arrayItems[$id]['clasificacion'] = ProductoServicio::with('clasificacion')->where('id', $id)->first()->clasificacion->descripcion;
        }
    }

    public function delItem($id)
    {
        if (array_key_exists($id, $this->arrayItems)) {
            unset($this->arrayItems[$id]);
        }
    }

    public function subtotal($id)
    {
        //dd(111);
        $this->arrayItems[$id]['subtotal'] = ($this->arrayItems[$id]['quantity'] ?: 0) * $this->arrayItems[$id]['precio_venta'];
    }

    public function enviarPresupuesto()
    {
        try {
            Mail::to($this->ordentrabajo->cliente->email)->send(new EnvioPresupuesto($this->ordentrabajo));

            $this->enviarMail = false;

            session()->flash('msg', 'Presupuesto enviado');
            session()->flash('type', 'success');

        } catch (\Exception $e) {
            session()->flash('msg', 'No se pudo enviar el presupuesto');
            session()->flash('type', 'error');
        }
    }

    public function guardar()
    {
        try {
            \DB::beginTransaction();

            $this->ordentrabajo->ordenes_servicios()->detach();
            $this->ordentrabajo->ordenes_repuestos()->detach();

            $importe_total = 0;
            $r = 0;
            $s = 0;
            foreach ($this->arrayItems as $item) {
                if (strtolower($item['clasificacion']) != 'servicio') {
                    $r++;

                    $this->ordentrabajo
                        ->ordenes_repuestos()
                        ->syncWithoutDetaching(
                            [
                                $item['id'] => [
                                    'item' => $r,
                                    'cantidad' => $item['quantity'],
                                    'usuario' => \Auth::user()->usuario,
                                ]
                            ]);

                    $importe_total += $item['precio_venta'] * $item['quantity'];


                } elseif (strtolower($item['clasificacion']) == 'servicio') {
                    $s++;

                    $this->ordentrabajo
                        ->ordenes_servicios()
                        ->syncWithoutDetaching(
                            [
                                $item['id'] => [
                                    'item' => $s,
                                    'cantidad' => 1,
                                    'usuario' => \Auth::user()->usuario,
                                ]
                            ]);

                    $importe_total += $item['precio_venta'] * 1;

                }
            }

            $this->ordentrabajo->prioridad = $this->prioridad;
            $this->ordentrabajo->importe_total = $importe_total;
            $this->ordentrabajo->save();

            \DB::commit();

            session()->flash('msg', 'Se ha procesado la orden de trabajo');
            session()->flash('type', 'success');

            return redirect()->route('orden_trabajo.index');

        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getLine() . ' - ' . $e->getMessage());

            session()->flash('msg', 'No se pudo procesar la orden de trabajo');
            session()->flash('type', 'error');
        }

    }

    public function mount()
    {
        $this->talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $this->recepciones = Recepcion::orderBy('id', 'ASC')->get();
        $this->clientes = Cliente::orderBy('razon_social', 'ASC')->get();
        $this->vehiculos = Vehiculo::orderBy('id', 'ASC')->get();
        $this->empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $this->grupos = Grupo::orderBy('descripcion', 'ASC')->get();
        $this->usuarios = Usuario::orderBy('usuario', 'ASC')->get();

        $this->tipos = $this->ordentrabajo->getTipos(); // tipos
        $this->estados = $this->ordentrabajo->getEstados(); // estados
        $this->prioridades = $this->ordentrabajo->getPrioridades(); // prioridades

        $this->sintomas = Sintoma::all();

        $this->servicios = ProductoServicio::whereHas('clasificacion', function ($c) {
            $c->whereRaw('lower(descripcion) LIKE "servicio"');
        })->get();

        $this->insumos = ProductoServicio::whereHas('clasificacion', function ($i) {
            $i->whereRaw("lower(descripcion) NOT LIKE 'servicio'");
        })->get();

        if ($this->ordentrabajo->ordenes_servicios) {
            foreach ($this->ordentrabajo->ordenes_servicios as $servicio) {
                //dd($servicio);

                $this->arrayItems[$servicio->id] = $servicio->toArray();
                $this->arrayItems[$servicio->id]['subtotal'] = $servicio->precio_venta * 1;
                $this->arrayItems[$servicio->id]['quantity'] = 1;
                $this->arrayItems[$servicio->id]['clasificacion'] = $servicio->clasificacion->descripcion;
            }
        }

        if ($this->ordentrabajo->ordenes_repuestos) {
            foreach ($this->ordentrabajo->ordenes_repuestos as $repuesto) {
                $this->arrayItems[$repuesto->id] = $repuesto->toArray();
                $this->arrayItems[$repuesto->id]['subtotal'] = $repuesto->precio_venta * $repuesto->pivot->cantidad;
                $this->arrayItems[$repuesto->id]['quantity'] = $repuesto->pivot->cantidad;
                $this->arrayItems[$repuesto->id]['clasificacion'] = $repuesto->clasificacion->descripcion;
            }
        }
    }

    public function finalizar()
    {
        $this->ordentrabajo->estado = \App\Models\OrdenTrabajo::ESTADO_FINALIZADO;
        $this->ordentrabajo->save();

        Mail::to($this->ordentrabajo->cliente->email)->send(new CierreOt($this->ordentrabajo));

        /*
         * Insercion en Bitacora
         */
        if ($this->ordentrabajo->bitacora->where('estado', Bitacora::ESTADO_TRABAJO_FINALIZADO)->count() == 0) {
            if (!(new BitacoraController())
                ->create($this->ordentrabajo->id, date('Y-m-d H:i'), Bitacora::ESTADO_TRABAJO_FINALIZADO,
                    (new Bitacora())->getEstadoDesc(Bitacora::ESTADO_TRABAJO_FINALIZADO))) {
                throw new \Exception('No se pudo crear la bitacora');
            }
        }

        session()->flash('msg', 'Orden finalizada correctamente');
        session()->flash('type', 'success');

        return redirect()->route('finalizados');
    }

    public function rechazar()
    {
        $this->ordentrabajo->estado = \App\Models\OrdenTrabajo::ESTADO_REALIZADO;
        $this->ordentrabajo->save();


        session()->flash('msg', 'Orden rechazada correctamente');
        session()->flash('type', 'success');

        return redirect()->route('finalizados');
    }

    public function render()
    {
        return view('livewire.finalizacion-ot');
    }
}
