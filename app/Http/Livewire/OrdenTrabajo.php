<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\ProductoServicio;
use App\Models\Recepcion;
use App\Models\Sintoma;
use App\Models\Taller;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Livewire\Component;

class OrdenTrabajo extends Component
{
    public $ordentrabajo;
    public $talleres, $recepciones, $clientes, $vehiculos, $empleados, $grupos, $usuarios, $tipos, $estados, $prioridades;

    public $serviciosArray = [], $repuestosArray = [];

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

    public function addServicio(ProductoServicio $id)
    {
        
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
    }

    public function render()
    {
        return view('livewire.orden-trabajo');
    }
}
