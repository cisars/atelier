<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BitacoraController;
use App\Models\OrdenServicio;
use App\Models\ProductoServicio;
use Livewire\Component;

class VerificacionOt extends Component
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

            $revertirOt = false;

            $i = 0;
            foreach ($this->arrayItems as $item) {
                $i++;

                $this->ordentrabajo
                    ->ordenes_servicios()
                    ->updateExistingPivot($item['id'],
                        array(
                            'realizado' => $item['verificado'] == 'v' ? OrdenServicio::REALIZADO_SI : OrdenServicio::REALIZADO_NO,
                            'verificado' => $item['verificado'] == 'v' ? OrdenServicio::VERIFICADO_SI : OrdenServicio::VERIFICADO_NO,
                            'descripcion_verificacion' => $item['descripcion_verificacion']
                        ), false);
                if ($item['verificado'] != 'v') {
                    $revertirOt = true;
                }
            }

            if ($revertirOt) {
                $this->ordentrabajo->estado = \App\Models\OrdenTrabajo::ESTADO_ACEPTADO;
                $this->ordentrabajo->save();
            }else{
                $this->ordentrabajo->estado = \App\Models\OrdenTrabajo::ESTADO_VERIFICADO;
                $this->ordentrabajo->save();
            }

            /*
             * Insercion en Bitacora
             */
            if (!(new BitacoraController())->create($this->ordentrabajo->id, $this->ordentrabajo->created_at, $this->ordentrabajo->estado, 'Verificación de servicios')) {
                throw new \Exception('No se pudo crear la bitacora');
            }


            \DB::commit();

            session()->flash('msg', 'Se han verificado los servicios');
            session()->flash('type', 'success');

            return redirect()->route('verificados');

        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getLine() . ' - ' . $e->getMessage());

            session()->flash('msg', 'No se han podido verificar los servicios');
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
                //dd($servicio);

                $this->arrayItems[$servicio->id] = $servicio->toArray();
                $this->arrayItems[$servicio->id]['subtotal'] = $servicio->precio_venta * 1;
                $this->arrayItems[$servicio->id]['quantity'] = 1;
                $this->arrayItems[$servicio->id]['clasificacion'] = $servicio->clasificacion->descripcion;
            }
        }

        /*if ($this->ordentrabajo->ordenes_repuestos) {
            foreach ($this->ordentrabajo->ordenes_repuestos as $repuesto) {
                $this->arrayItems[$repuesto->id] = $repuesto->toArray();
                $this->arrayItems[$repuesto->id]['subtotal'] = $repuesto->precio_venta * $repuesto->pivot->cantidad;
                $this->arrayItems[$repuesto->id]['quantity'] = $repuesto->pivot->cantidad;
                $this->arrayItems[$repuesto->id]['clasificacion'] = $repuesto->clasificacion->descripcion;
            }
        }*/
    }

    public function render()
    {
        return view('livewire.verificacion-ot');
    }
}
