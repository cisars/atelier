<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Taller;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class Recepcion extends Component
{
    public $talleres;
    public $reservas;
    public $clientes;
    public $vehiculos;
    public $usuarios;

    public $reserva_id;
    //  public $vehiculo_id;


    public $taller_id;
    public $tallerAsignado;
    public $tallerHabilitado;
    public $reservasActivas;
    public $collCliente;
    public $clienteRazonSocial;
    public $elVehiculo;
    public $vehiculo_id;
    public $fechaSel;
    public $elRecepcionista;


    public function render()
    {
        return view('livewire.recepcion');
    }

    public function mount()
    {

        $this->talleres = Taller::orderBy('descripcion', 'ASC')->get();

        $this->clientes = Cliente::orderBy('razon_social', 'ASC')->get();
        $this->vehiculos = Vehiculo::orderBy('chapa', 'ASC')->get();
        $this->usuarios = Usuario::orderBy('usuario', 'ASC')->get();

        // $ab = Usuario::with('talleres')->where('usuario','admin')->first()->talleres()->exists() ;
        $this->tallerAsignado = \Auth::user()->talleres()->exists();

        //Recepcionista
        $datoEmpleado = Usuario::with('empleado')->where('usuario', \Auth::user()->usuario)->first()->empleado;
        $this->elRecepcionista[$datoEmpleado->id] = $datoEmpleado->apellidos . ', ' . $datoEmpleado->nombres;


        //Si NO tiene taller designado el empleado habilita para selecccionar el taller que se quiere ver
        //if ($this->tallerAsignado) {
        if (\Auth::user()->tallerAsignado()) {
            $this->taller_id = \Auth::user()->talleres()->first()->id;
            $this->tallerHabilitado = 'disabled';
            //dd($this->taller_id);
        } else {
            $this->tallerHabilitado = '';
        }

        // Traer todas las reservas para el taller que corresponde
        $this->traeReservas();

    }


    public function traeReservas()
    {

        //    $this->reservas = Reserva::with('cliente')->where('taller_id',$this->taller_id)->orderBy('id', 'ASC')->get()->pluck('cliente.razon_social', 'id');
        $this->reservas = Reserva::with('cliente')->where(
            [
                'taller_id' => $this->taller_id,
                'estado' => Reserva::ESTADO_PENDIENTE
            ]
        )->orderBy('id', 'ASC')->get();
        foreach ($this->reservas as $key => $valor) {
            $this->reservasActivas[$valor->id] = '#Ticket: ' . $valor->ticket . '| Reserva: ' . $valor->id . '|' . $valor->cliente->razon_social;
        }

    }

    public function traeReservaSeleccionada()
    {
        $this->collCliente = Reserva::with('cliente')->where('id', $this->reserva_id)->first()->cliente  ;
        $this->clienteRazonSocial = $this->collCliente->razon_social;
        $this->vehiculo_id = Reserva::with('vehiculo')->where('id', $this->reserva_id)->first()->vehiculo_id;
        $datavehiculo = Vehiculo::with('modelo')->where('id', $this->vehiculo_id)->first();
        $this->elVehiculo = $datavehiculo->modelo->marca->descripcion . ', ' . $datavehiculo->modelo->descripcion;

    }

    public function grabaRecepcion()
    {

        $recepcion = new \App\Models\Recepcion([
            'taller_id' => $this->taller_id,
            'reserva_id' => (int)$this->reserva_id,
            'cliente_id' => $this->collCliente->id,
            'vehiculo_id' => $this->vehiculo_id,
            'fecha_recepcion' => date('Y-m-d'),
            'usuario' => \Auth::user()->usuario,
        ]);
        //dd($recepcion);

        $reservaUpdate =  new \App\Models\Reserva([
            'reserva_id' => (int)$this->reserva_id,
            'estado' => Reserva::ESTADO_VERIFICADO,
        ]);
        $reservaUpdate->save();
        $recepcion->save();

        session()->flash('msg', 'Registro Creado Correctamente');
        session()->flash('type', 'info');
        redirect()->to('recepcion.index');
    }



}
