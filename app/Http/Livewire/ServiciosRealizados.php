<?php

namespace App\Http\Livewire;

use App\Models\EntradaDetalle;
use App\Models\OrdenRepuesto;
use App\Models\OrdenServicio;
use App\Models\ProductoServicio;
use App\Models\SalidaDetalle;
use Illuminate\Database\Eloquent\Model;
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

                if (strtolower($item['clasificacion']['descripcion']) == 'servicio') {
                    $orden_detalle = OrdenServicio::where('ot_id', $this->ordentrabajo->id)->where('servicio_id',$item['id'])->first();

                    $orden_detalle->realizado = $item['realizado'] ? OrdenServicio::REALIZADO_SI : OrdenServicio::REALIZADO_NO;
                    $orden_detalle->save();

                } else {
                    $orden_detalle = OrdenRepuesto::where('ot_id', $this->ordentrabajo->id)->where('producto_id',$item['id'])->first();
                    //$orden_detalle = OrdenRepuesto::find($item['id']);
                    $orden_detalle->usado = $item['quantity'];
                    $orden_detalle->save();

                    //dd($orden_detalle->orden_trabajo->recepcion->reserva->sector_d);
                    /*
                     * Actualizacion en existencia manejo
                     */
                    if ($orden_detalle->orden_trabajo->ordenes_repuestos->first()->sector->productos_servicios()->where('producto_id', $orden_detalle->producto_id)->exists()) {
                        $sum = $orden_detalle
                            ->orden_trabajo
                            ->ordenes_repuestos
                            ->first()
                            ->sector->productos_servicios()->where('producto_id', $orden_detalle->producto_id)->sum('cantidad');

                        $orden_detalle
                            ->orden_trabajo
                            ->ordenes_repuestos
                            ->first()
                            ->sector->productos_servicios()->updateExistingPivot($orden_detalle->producto_id, array('cantidad' => $sum - $orden_detalle->usado), false);
                    }
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

        if ($this->ordentrabajo->ordenes_servicios) {
            foreach ($this->ordentrabajo->ordenes_servicios as $servicio) {
                $this->arrayItems[$servicio->servicio_id] = $servicio->servicio()->with('clasificacion')->first()->toArray();
                $this->arrayItems[$servicio->servicio_id]['subtotal'] = $servicio->servicio->precio_venta * 1;
                $this->arrayItems[$servicio->servicio_id]['quantity'] = 1;
            }
        }

        if ($this->ordentrabajo->ordenes_repuestos) {
            foreach ($this->ordentrabajo->ordenes_repuestos as $repuesto) {
                $this->arrayItems[$repuesto->producto_id] = $repuesto->repuesto()->with('clasificacion')->first()->toArray();
                $this->arrayItems[$repuesto->producto_id]['subtotal'] = $repuesto->repuesto->precio_venta * $repuesto->cantidad;
                $this->arrayItems[$repuesto->producto_id]['quantity'] = $repuesto->cantidad;
            }
        }
    }

    public function render()
    {
        return view('livewire.servicios-realizados');
    }
}
