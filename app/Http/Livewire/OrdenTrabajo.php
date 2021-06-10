<?php

namespace App\Http\Livewire;

use App\Mail\EnvioPresupuesto;
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
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class OrdenTrabajo extends Component
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
        $this->arrayItems[$id]['subtotal'] = ($this->arrayItems[$id]['quantity'] ?: 0) * $this->arrayItems[$id]['precio_venta'];
    }

    public function enviarPresupuesto()
    {
        try {
            Mail::to($this->ordentrabajo->cliente->email)->send(new EnvioPresupuesto($this->ordentrabajo));

            $this->enviarMail = false;

            session()->flash('msg', 'Presupuesto enviado');
            session()->flash('type', 'success');

        }catch (\Exception $e){
            session()->flash('msg', 'No se pudo enviar el presupuesto');
            session()->flash('type', 'error');
        }
    }

    public function guardar()
    {
        try {
            \DB::beginTransaction();

            $importe_total = 0;
            $i = 0;
            $j = 0;
            foreach ($this->arrayItems as $item) {
                //dd($this->ordentrabajo->ordenes_repuestos->where('producto_id', $item['id'])->first());
                if (strtolower($item['clasificacion']['descripcion']) != 'servicio') {
                    if (!$repuesto = $this->ordentrabajo->ordenes_repuestos->where('producto_id', $item['id'])->first()) {
                        $repuesto = new OrdenRepuesto();
                        $repuesto->ot_id = $this->ordentrabajo->id;
                    }
                    $j++;
                    $repuesto->item = $j;
                    $repuesto->cantidad = $item['quantity'];
                    $repuesto->producto_id = $item['id'];
                    $repuesto->usuario = \Auth::user()->usuario;
                    $repuesto->save();

                    $importe_total += $repuesto->repuesto->precio_venta * $repuesto->cantidad;

                }elseif (strtolower($item['clasificacion']['descripcion']) == 'servicio') {

                    if (!$servicio = $this->ordentrabajo->ordenes_servicios->where('servicio_id', $item['id'])->first()) {
                        $servicio = new OrdenServicio();
                        $servicio->ot_id = $this->ordentrabajo->id;
                    }

                    $i++;
                    $servicio->item = $i;
                    $servicio->servicio_id = $item['id'];
                    $servicio->cantidad = $item['quantity'];
                    $servicio->usuario = \Auth::user()->usuario;
                    $servicio->save();

                    $importe_total += $servicio->servicio->precio_venta * 1;
                }


            }

            $this->ordentrabajo->prioridad = $this->prioridad;
            $this->ordentrabajo->importe_total = $importe_total;
            $this->ordentrabajo->save();

            \DB::commit();

            session()->flash('msg', 'Se ha procesado la orden de trabajo');
            session()->flash('type', 'success');

            $this->enviarMail = true;

            return;

        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getLine().' - '.$e->getMessage());

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
        return view('livewire.orden-trabajo');
    }
}
