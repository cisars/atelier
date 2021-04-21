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
    public $formas;
    public $test;
    public $data;

    public $ticket;
    public $sector;
    public $para_fecha;
    public $para_hora;

    public $viralSongs = '';

    public $songs = [
        'Say So',
        'The Box',
        'Laxed',
        'Savage',
        'Dance Monkey',
        'Viral',
        'Hotline Billing',
    ];


    public function mount()
    {

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

    public function selectedClient()
    {
        dd('no debe entrar nunca');
        if (strlen(trim($this->term)) > 0) {
            $aux = explode("|", $this->term);

            if (count($aux) > 1) {
                // $this->term = $aux[0];
                $this->termId = $aux[1];
                $cliente = Cliente::find($this->termId);
                $this->vehiculos = $cliente->vehiculos->pluck('full_desc', 'id');


            }
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
