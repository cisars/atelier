<?php

namespace App\Http\Livewire;

use App\Models\ProductoServicio;
use Livewire\Component;

class ServiciosRealizados extends Component
{
    public $ordentrabajo;

    /*
     * Listas
     */
    public $talleres, $recepciones, $clientes, $vehiculos, $empleados, $grupos, $usuarios, $tipos, $estados, $prioridades,$insumos, $servicios;

    /*
     * Variables
     */
    public $prioridad, $descripcion, $enviarMail = false;

    public $arrayItems = [];

    public $quantity;

    public function mount()
    {
        $this->servicios = ProductoServicio::whereHas('clasificacion', function ($c){
            $c->whereRaw('lower(descripcion) LIKE "servicio"');
        })->get();

        $this->insumos = ProductoServicio::whereHas('clasificacion', function ($i){
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
