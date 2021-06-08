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
    public $talleres, $recepciones, $clientes, $vehiculos, $empleados, $grupos, $usuarios, $tipos, $estados, $prioridades,$repuestos, $servicios;

    /*
     * Variables
     */
    public $prioridad, $descripcion;

    public $arrayItems = [];

    public $quantities;

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
        if ($this->arrayItems->where('id', $id)->count() == 0) {
            $this->arrayItems[trim($id)] = ProductoServicio::find($id);
        }
    }

    public function delItem($id)
    {
        if ($this->arrayItems->where('id', $id)->count() > 0) {
            unset($this->arrayItems[trim($id)]);
        }
    }

    public function changeQuantity($id)
    {
        dd($id);
    }

    public function guardar()
    {

        try {
            \DB::beginTransaction();

            $this->ordentrabajo->prioridad = $this->prioridad;
            $this->ordentrabajo->save();

            foreach ($this->arrayItems as $item) {

                if ($item->clasificacion->descripcion != 'servicio') {
                    $servicios = new OrdenServicio();
                    $servicios->ot_id = $this->ordentrabajo->id;
                    //$servicios->servicio_id =
                    //$servicios->cantidad =
                    $servicios->descripcion = $this->description;
                    $servicios->usuario = \Auth::user()->usuario;
                    $servicios->save();
                }else{

                }


            }


            $repuestos = new OrdenRepuesto();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();

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


        $this->servicios = ProductoServicio::whereClasificacionId(1)->get();
        $this->repuestos = ProductoServicio::whereClasificacionId(2)->get();

        $this->arrayItems = collect();
    }

    public function render()
    {
        return view('livewire.orden-trabajo');
    }
}
