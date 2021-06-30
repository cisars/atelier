<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BitacoraController;
use App\Mail\RealizacionOt;
use App\Models\Bitacora;
use App\Models\EntradaDetalle;
use App\Models\OrdenRepuesto;
use App\Models\OrdenServicio;
use App\Models\ProductoServicio;
use App\Models\SalidaDetalle;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ServiciosRealizados extends Component
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

    public function guardar()
    {
        // dd(11);
        try {
            \DB::beginTransaction();

            $i = 0;
            foreach ($this->arrayItems as $item) {
                $i++;

                if (strtolower($item['clasificacion']) == 'servicio') {

                    $this->ordentrabajo
                        ->ordenes_servicios()
                        ->updateExistingPivot($item['id'], array('realizado' => $item['realizado'] ?? null ? OrdenServicio::REALIZADO_SI : OrdenServicio::REALIZADO_NO), false);

                } else {

                    $this->ordentrabajo
                        ->ordenes_repuestos()
                        ->updateExistingPivot($item['id'], array('usado' => $item['quantity'] ?? null), false);

                    /*
                     * Actualizacion en existencia manejo
                     */
                    //dd($this->ordentrabajo->sector);
                    if ($this->ordentrabajo->sector->productos_servicios()->where('producto_id', $item['id'])->exists()) {
                        $sum = $this->ordentrabajo->sector->productos_servicios()->where('producto_id', $item['id'])->sum('cantidad');

                        $this->ordentrabajo->sector->productos_servicios()->updateExistingPivot($item['id'], array('cantidad' => $sum - $item['usado']), false);
                    }
                }
            }

            $ordenestrabajos = \App\Models\OrdenTrabajo::where('id', $this->ordentrabajo->id)->where(function ($w){
                $w->whereHas('ordenes_repuestos', function ($q) {
                    $q->where('usado', 0)->orWhere('usado', null);
                })->orWhereHas('ordenes_servicios', function ($q) {
                    $q->where('realizado','!=', 's')->orWhere('realizado','=', null);;
                });
            })->get();

            //dd($ordenestrabajos->count());

            if ($ordenestrabajos->count() == 0) {
                $this->ordentrabajo->estado = \App\Models\OrdenTrabajo::ESTADO_REALIZADO;
                $this->ordentrabajo->save();

                Mail::to($this->ordentrabajo->cliente->email)->send(new RealizacionOt($this->ordentrabajo));
            }

            /*
             * Insercion en Bitacora
             */
            if ($this->ordentrabajo->bitacora->where('estado', Bitacora::ESTADO_TRABAJO_REALIZADO)->count() == 0) {
                if (!(new BitacoraController())
                    ->create($this->ordentrabajo->id, date('Y-m-d H:i'), Bitacora::ESTADO_TRABAJO_REALIZADO,
                        (new Bitacora())->getEstadoDesc(Bitacora::ESTADO_TRABAJO_REALIZADO))) {
                    throw new \Exception('No se pudo crear la bitacora');
                }
            }

            \DB::commit();

            session()->flash('msg', 'Se han realizado los servicios');
            session()->flash('type', 'success');

            return redirect()->route('servicios-realizados');

        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getLine() . ' - ' . $e->getMessage());

            session()->flash('msg', 'No se han podido realizar los servicios');
            session()->flash('type', 'error');
        }

    }

    public function mount()
    {
        $this->servicios = ProductoServicio::whereHas('clasificacion', function ($c) {
            $c->whereRaw('lower(descripcion) LIKE "servicio"');
        })->get();

        $this->insumos = ProductoServicio::whereHas('clasificacion', function ($i) {
            $i->whereRaw("lower(descripcion) NOT LIKE 'servicio'");
        })->get();

        if (!$this->ordentrabajo->ordenes_servicios()->where('verificado', 'n')->exists()) {
            if ($this->ordentrabajo->ordenes_repuestos) {
                foreach ($this->ordentrabajo->ordenes_repuestos as $repuesto) {
                    $this->arrayItems[$repuesto->id] = $repuesto->toArray();
                    $this->arrayItems[$repuesto->id]['subtotal'] = $repuesto->precio_venta * $repuesto->pivot->cantidad;
                    $this->arrayItems[$repuesto->id]['quantity'] = $repuesto->pivot->cantidad;
                    $this->arrayItems[$repuesto->id]['clasificacion'] = $repuesto->clasificacion->descripcion;
                    $this->arrayItems[$repuesto->id]['descripcion_verificacion'] = false;
                    $this->arrayItems[$repuesto->id]['usado'] = $repuesto->pivot->cantidad;
                }
            }

            if ($this->ordentrabajo->ordenes_servicios) {
                foreach ($this->ordentrabajo->ordenes_servicios as $servicio) {
                    $this->arrayItems[$servicio->id] = $servicio->toArray();
                    $this->arrayItems[$servicio->id]['subtotal'] = $servicio->precio_venta * 1;
                    $this->arrayItems[$servicio->id]['quantity'] = 1;
                    $this->arrayItems[$servicio->id]['clasificacion'] = $servicio->clasificacion->descripcion;
                    $this->arrayItems[$servicio->id]['descripcion_verificacion'] = false;
                    $this->arrayItems[$servicio->id]['realizado'] = $servicio->pivot->realizado == 's' ? true: false;
                }
            }
        }else {
            if ($this->ordentrabajo->ordenes_servicios) {
                foreach ($this->ordentrabajo->ordenes_servicios()->where('verificado', 'n')->get() as $servicio) {
                    $this->arrayItems[$servicio->id] = $servicio->toArray();
                    $this->arrayItems[$servicio->id]['subtotal'] = $servicio->precio_venta * 1;
                    $this->arrayItems[$servicio->id]['quantity'] = 1;
                    $this->arrayItems[$servicio->id]['clasificacion'] = $servicio->clasificacion->descripcion;
                    $this->arrayItems[$servicio->id]['descripcion_verificacion'] = $servicio->pivot->descripcion_verificacion;
                    $this->arrayItems[$servicio->id]['realizado'] = $servicio->pivot->realizado == 's' ? true: false;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.servicios-realizados');
    }
}
