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

    protected $listeners = ['updateVehiculoList' => 'listaVehiculo'];

    public $term = "";
    public $termId = "";
    public $talleres;
    public $clientes;
    public $vehiculos;
    public $reserva;
    public $empleados;
    public $usuarios;
    public $formas;
    public $estados;
    public $prioridades;
    public $test;
    public $data;

    public $ticket;
    public $sector;
    public $para_fecha;
    public $para_hora;

    public function listaVehiculo()
    {
        $cliente = Cliente::find($this->termId);
        $this->vehiculos = $cliente->vehiculos->pluck('full_desc', 'id');
    }

    public function mount()
    {
        if( isset($this->reserva->id))
        {
            $this->fecha = $this->reserva->fecha;
            $this->para_fecha = $this->reserva->para_fecha;
            $this->para_hora = $this->reserva->para_hora;
            $this->ticket = $this->reserva->ticket;
            $this->sector = $this->reserva->sector;

        }

    }

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


    public function test()
    {
        $this->validate([
            'termId' => 'required'
        ]);

    }

    public function traeHoraSector()
    {

        if (isset($this->para_fecha)) {
            $res = \App\Models\Reserva::retornaHoraSector($this->para_fecha, $this->ticket);
            $this->para_hora = $res['hora'];
            $this->sector = $res['sector'];

        }
    }

    public function render()
    {


        return view('livewire.reserva');
    }


}
