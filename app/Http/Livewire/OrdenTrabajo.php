<?php

namespace App\Http\Livewire;

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
    public $prioridad, $descripcion;

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
        $this->arrayItems[$id]['subtotal'] = $this->arrayItems[$id]['quantity'] * $this->arrayItems[$id]['precio_venta'];
        //$this->arrayItems[$id]['quantity'] = $this->quantityInput[id];
    }

    public function guardar()
    {
        try {
            \DB::beginTransaction();

            $this->ordentrabajo->prioridad = $this->prioridad;
            $this->ordentrabajo->save();

            $i = 0;
            $j = 0;
            foreach ($this->arrayItems as $item) {
                if (strtolower($item['clasificacion']['descripcion']) != 'servicio') {
                    $j++;
                    $servicios = new OrdenRepuesto();
                    $servicios->ot_id = $this->ordentrabajo->id;
                    $servicios->item = $j;
                    $servicios->cantidad = $item['quantity'];
                    $servicios->producto_id = $item['id'];
                    $servicios->usuario = \Auth::user()->usuario;
                    $servicios->save();
                }elseif (strtolower($item['clasificacion']['descripcion']) == 'servicio') {
                    $i++;
                    $servicios = new OrdenServicio();
                    $servicios->ot_id = $this->ordentrabajo->id;
                    $servicios->item = $i;
                    $servicios->servicio_id = $item['id'];
                    $servicios->cantidad = $item['quantity'];
                    //$servicios->descripcion = $this->description;
                    $servicios->usuario = \Auth::user()->usuario;
                    $servicios->save();
                }
            }

            \DB::commit();

            session()->flash('msg', 'Se ha procesado la orden de trabajo');
            session()->flash('type', 'success');

            return redirect()->route('orden_trabajo.index');

        } catch (\Exception $e) {
            \DB::rollBack();

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
    }

    public function render()
    {
        return view('livewire.orden-trabajo');
    }
}
