<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Vehiculo;
use Livewire\Component;
use Livewire\WithPagination;
use stdClass;


class Reserva extends Component
{
    use WithPagination;

    public $term = "";
    public $termId = "";
    public $talleres;
    public $clientes;
    public $vehiculos;
    public $reserva;
    public $empleados;
    public $usuarios;
    public $test;
    public $data;

    public function selectedClient()
    {

        if (!empty($this->term)) {
            $aux = explode("|", $this->term);

            if (count($aux) > 1) {
                // $this->term = $aux[0];
                $this->termId = $aux[1];
                $cliente = Cliente::find($this->termId);
                $this->vehiculos = $cliente->vehiculos->pluck('full_desc', 'id');

            } else {
                //$this->term = '';
                $this->termId = "";
                $this->vehiculos = "";
            }
        }
        $this->validate([
            'termId' => 'required'
        ]);

    }

    public function test()
    {
        $this->validate([
            'termId' => 'required'
        ]);

    }

    public function render()
    {

        //sleep(1);
//        if (isset($this->term)) {
//            $clients = Cliente::Search($this->term)->paginate(100);
//
//            if (count($clients) == 0) {
//                $this->data['users']  = new stdClass();
//                $this->data['users']->razon_social="Sin Resultados";
//                $this->data['users']->documento="Sin Resultados";
//                $this->data['users']->email="Sin Resultados";
//
//            } else {
//                $this->data = [
//                    'users' => $clients,
//                ];
//            }
//            //  dd($this->data);
//        }

        $clients = Cliente::Search($this->term)->paginate(100);
        $this->data = [ 'users' => $clients ];

        return view('livewire.reserva');
    }


}
