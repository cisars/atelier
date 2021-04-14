<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Descanso;
use App\Models\Parametro;
use App\Models\Reserva;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Auth;
use Livewire\Component;


class Agendamiento extends Component
{
    public $parametro;
    public $client;
    public $misvehiculos;
    public $descanso;
    public $cabecera;
    public $cupo;
    public $fechaSeleccionada;


    public $grillaReservas;
    public $banderaEditarCupo;

//    formulario
    public $vehiculoSel;
    public $vehiculoSelDescripcion;
    public $para_fechaSel;
    public $para_horaSel;
    public $sectorSel;
    public $turnoSel;
    public $ticketSel;
    public $observacionSel;
    public $parametroSel;

    public function mount()
    {
        $this->banderaEditarCupo = false;
        $this->parametro = Parametro::where('activo', '1')->first();
        $this->client = Cliente::find(\Auth::user()->cliente_id);
        $this->misvehiculos = $this->client->vehiculos;
        $this->fechaSeleccionada = date('Y-m-d');
        //$this->descanso = Descanso::where('id',$this->parametro->id )->first();

        //dd($this->parametro->descansos);

        $this->grillaReservas = Reserva::where([
            'para_fecha' => $this->fechaSeleccionada
        ]

        )->get();
//dd($this->grillaReservas);
        //dd($this->grillaReservas);

    }


    public function submitReserva()
    {

        //  $b = Usuario::find(Auth::user()->usuario)->talleres[0]->id ;
        //     dd( $this->client->id );
        //  dd(Auth::user()->usuario );

        if ($this->banderaEditarCupo == true) {
            $matchThese = [
                'para_fecha' => $this->para_fechaSel,
                'ticket' => $this->ticketSel ,
                'usuario' => Auth::user()->usuario,
            ];
            Reserva::where($matchThese)->delete();
            redirect()->to('/agendamiento');
        } else {

            $reserva = new Reserva([
                'taller_id' => Usuario::find(Auth::user()->usuario)->talleres[0]->id,
                'cliente_id' => $this->client->id,
                'vehiculo_id' => $this->vehiculoSel,
                'fecha' => date('Y-m-d'),
                'para_fecha' => $this->para_fechaSel,
//            'empleado_id'   => '',
                'estado' => Reserva::ESTADO_PENDIENTE,
                'forma_reserva' => Reserva::FORMA_ONLINE,
                'prioridad' => Reserva::PRIORIDAD_NORMAL,
                'observacion' => $this->observacionSel,
                'usuario' => Auth::user()->usuario,
                'para_hora' => $this->para_horaSel,
                'turno' => 0,
                'sector' => $this->sectorSel,
                'ticket' => $this->ticketSel,
                'parametro_id' => $this->parametroSel,
            ]);


//        $reserva = new Reserva($request->all());

            $reserva->save();

            session()->flash('msg', 'Registro Creado Correctamente');
            session()->flash('type', 'info');
            redirect()->to('/');
        }
    }


    public function consultarCalendario()
    {
        $this->variable = ['uno' => $this->fechaSeleccionada, 'dos' => 'b'];
        $this->grillaReservas = Reserva::where('para_fecha', $this->fechaSeleccionada)->get();

        //dd($ver);
        $this->emit('test', $this->variable);
    }

    public function consultarDisponibilidad()
    {
        $this->variable = ['uno' => $this->fechaSeleccionada, 'dos' => 'b'];
        $this->emit('test', $this->variable);
    }

    public function seleccionarCupo($sector, $turno, $ticket)
    {
        $this->banderaEditarCupo = false;
        //no se utiliza
        $this->cupo = [
            'sector' => $sector,
            'turno' => $turno,
            'ticket' => $ticket
        ];
        $this->sectorSel = $sector;
        $this->turnoSel = $turno;
        $this->para_horaSel = $turno;
        $this->ticketSel = $ticket;
        $this->para_fechaSel = $this->fechaSeleccionada;
        $this->parametroSel = '1';

        $this->variable = ['ticket' => $ticket, 'editarCupo' => false ,  'fechaSeleccionada' => $this->fechaSeleccionada];
        $this->emit('triggerCupo', $this->variable);
    }

    public function editarCupo($ticket)
    {

        $this->banderaEditarCupo = true;

        $miquery = Reserva::where([
            'para_fecha' => $this->fechaSeleccionada,
            'ticket' => $ticket
        ])->get();

        // traer descripcion del vehiculo seleccionado
        $elVehiculo = Vehiculo::with('modelo')->where('id', $miquery[0]->vehiculo_id)->first();
        $elmodelo = $elVehiculo->modelo->descripcion;
        $lamarca = $elVehiculo->modelo::with('marca')->first()->marca->descripcion;
        $this->vehiculoSelDescripcion = $lamarca . ', ' . $elmodelo;

        //dd($miquery[0]->ticket);
        $this->turnoSel = $miquery[0]->para_hora;
        $this->sectorSel = $miquery[0]->sector;
        $this->ticketSel = $miquery[0]->ticket;
        $this->para_horaSel = $miquery[0]->para_hora;
        $this->vehiculoSel = $miquery[0]->vehiculo_id;
        $this->para_fechaSel = $this->fechaSeleccionada;
        $this->parametroSel = $miquery[0]->parametro_id;
        $this->observacionSel = $miquery[0]->observacion;

        $this->variable = ['ticket' => $ticket, 'editarCupo' => true,  'fechaSeleccionada' => $this->fechaSeleccionada];
        $this->emit('triggerCupo', $this->variable);
    }


    public function render()
    {
        return view('livewire.agendamiento');
    }


}
