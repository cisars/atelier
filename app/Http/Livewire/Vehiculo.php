<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class Vehiculo extends Component
{

public $vehiculos;
public $vehiculo;
public $clientes;
public $modelos;
public $colores;
public $combustiones;
public $tipos;
public $data;


    public $term = "";
    public $termId = "";

    public function onChangeClient()
    {
        if (strlen(trim($this->term)) > 0) {
            $aux = explode("|", $this->term);
            if (count($aux) > 1) {
                $this->term = $aux[0];
                $this->termId = $aux[1];
                $cliente = Cliente::find($this->termId);
                $this->vehiculos = $cliente->vehiculos->pluck('full_desc', 'id');
            }
            $clients = Cliente::Search(trim($this->term))->paginate(100);
            $this->data = [
                'users' => $clients,
            ];
        }
    }
    public function render()
    {
        return view('livewire.vehiculo');
    }
}
