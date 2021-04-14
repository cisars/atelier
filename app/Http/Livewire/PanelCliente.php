<?php

namespace App\Http\Livewire;

use App\Models\Cliente;

use App\Models\Color;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Vehiculo;
use Livewire\Component;

class PanelCliente extends Component
{
    public $client, $options;
    public $mimarca, $mimodelo, $micolor, $micombustion, $mitipo;
    public $mivehiculo;
    public $vehiculos, $vehiculo_id;

    public $losModelos;
    public $lasMarcas;
    public $losColores;
    public $lasCombustiones;
    public $losTipos;

    public $modeloSel;
    public $chapaSel;
    public $chasisSel;
    public $colorSel;
    public $combustionSel;
    public $tipoSel;
    public $anoSel;

    public function mount()
    {
        $this->client = Cliente::find(\Auth::user()->cliente_id);

    }

    public function newCar()
    {

        $this->options = 5;

        $this->losModelos = Modelo::all();
        $this->lasMarcas = Marca::all();
        $this->losColores = Color::all();
        $this->lasCombustiones = (new Vehiculo())->getCombustiones();
        $this->losTipos = (new Vehiculo())->getTipos();

    }

    public function selectHistory()
    {

    }


    public function submitVehiculo()
    {

        $registro = new Vehiculo([
            'cliente_id' => $this->client->id,
            'modelo_id' => $this->modeloSel,
            'chapa' => $this->chapaSel,
            'chasis' => $this->chasisSel,
            'color_id' => $this->colorSel,
            'combustion' => $this->combustionSel,
            'tipo' => $this->tipoSel,
            'año' => $this->anoSel,
        ]);

//        $reserva = new Reserva($request->all());

        $registro->save();

        redirect()->to('/');
    }

    public function changeOption($opt = false)
    {


        if (!$this->vehiculo_id) {
            $this->options = 0;

        } else {
            $this->options = 1;
            $this->mivehiculo = Vehiculo::where('id', $this->vehiculo_id)->first();
            $this->mimarca = Modelo::with('marca')->where('id', $this->mivehiculo->modelo_id)->first()->marca->descripcion;
            $this->mimodelo = Modelo::with('marca')->where('id', $this->mivehiculo->modelo_id)->first()->descripcion;
            $this->micolor = Color::where('id', $this->mivehiculo->color_id)->first()->descripcion;
            $this->micombustion = $this->mivehiculo->fuel;
            $this->mitipo = $this->mivehiculo->type;

        }
        if ($opt) {
            $this->options = $opt;
        }

    }

    public function render()
    {
        return view('livewire.panel-cliente');
    }
}
