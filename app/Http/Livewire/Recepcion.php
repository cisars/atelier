<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BitacoraController;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\OrdenTrabajo;
use App\Models\RecepcionesSintomas;
use App\Models\Reserva;
use App\Models\Sintoma;
use App\Models\Taller;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model;
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
    public $sintomas;

    public $reserva_id;
    public $recepcion;
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


    public $fecha_recepcion;

    public $btnAdd;

    public function abc($valor)
    {
        $this->emit('cambio', ['id' => $valor]);
    }

    public function render()
    {
        //   $this->emit('test');
        return view('livewire.recepcion');

    }

    public function mount()
    {

        $this->emit('test');
        $this->talleres = Taller::orderBy('descripcion', 'ASC')->get();

        $this->clientes = Cliente::orderBy('razon_social', 'ASC')->get();
        $this->vehiculos = Vehiculo::orderBy('chapa', 'ASC')->get();
        $this->usuarios = Usuario::orderBy('usuario', 'ASC')->get();
        $this->sintomas = Sintoma::all();

        // $ab = Usuario::with('talleres')->where('usuario','admin')->first()->talleres()->exists() ;
        $this->tallerAsignado = \Auth::user()->talleres()->exists();

        //Recepcionista
        $datoEmpleado = Usuario::with('empleado')->where('usuario', \Auth::user()->usuario)->first()->empleado;
        $this->elRecepcionista[$datoEmpleado->id] = $datoEmpleado->apellidos . ', ' . $datoEmpleado->nombres;


        //Si NO tiene taller designado el empleado habilita para selecccionar el taller que se quiere ver
        //if ($this->tallerAsignado) {
        if (\Auth::user()->tallerAsignadoExist()) {
            $this->taller_id = \Auth::user()->talleres()->first()->id;
            $this->tallerHabilitado = 'disabled';
            //dd($this->taller_id);
        } else {
            $this->tallerHabilitado = '';
        }

        // Traer todas las reservas para el taller que corresponde
        if (isset($this->recepcion->id)) {

            $this->reservasActivas[$this->recepcion->reserva_id] = '#Ticket' . Reserva::find($this->recepcion->reserva_id)->ticket . '| Reserva: ' . $this->recepcion->reserva_id;
            $this->reserva_id = $this->recepcion->reserva_id;
            $this->traeReservaSeleccionada();
            //dd($this->recepcion->fecha_recepcion);
            $this->fecha_recepcion = date('Y-m-d', strtotime(($this->recepcion->fecha_recepcion)));
            $this->traeSintomasdeRecepcion();
        } else {
            $this->fecha_recepcion = date('Y-m-d', strtotime((date('d-m-Y'))));
            $this->traeReservas();
        }

        if (!$this->reservasActivas) {
            session()->flash('msg', 'No existen reservas activas');
            session()->flash('type', 'info');

            return redirect()->route('recepcion.index');
        }

    }

    public function traeSintomasdeRecepcion()
    {
        $recepcionSintomasCollect = RecepcionesSintomas::where('recepcion_id', $this->recepcion->id)->get();
        foreach ($recepcionSintomasCollect as $index => $recepcionsintomaItem) {
            $this->vector[$recepcionsintomaItem->sintoma_id] = Sintoma::find($recepcionsintomaItem->sintoma_id)->descripcion;
            // dd(Sintoma::find($recepcionsintomaItem->sintoma_id)->descripcion);
        }
        //      dd(RecepcionesSintomas::where('recepcion_id', $this->recepcion->id)->get());
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
        $this->collCliente = Reserva::with('cliente')->where('id', $this->reserva_id)->first()->cliente;
        $this->clienteRazonSocial = $this->collCliente->razon_social;
        $this->vehiculo_id = Reserva::with('vehiculo')->where('id', $this->reserva_id)->first()->vehiculo_id;
        $datavehiculo = Vehiculo::with('modelo')->where('id', $this->vehiculo_id)->first();
        $this->elVehiculo = $datavehiculo->modelo->marca->descripcion . ', ' . $datavehiculo->modelo->descripcion;

    }

    public function grabaRecepcion()
    {
        $this->validate([
            'vector' => 'required'
        ]);

        try {
            DB::beginTransaction();

            /* Si se edita una recepción */
            if ($this->recepcion->id) {
                $this->recepcion->usuario = \Auth::user()->usuario;
                //borrar todos los sintomas de esa recepcion para volver a asignar

                $recepcionSintomasCollect = RecepcionesSintomas::where('recepcion_id', $this->recepcion->id)->get();

                foreach ($recepcionSintomasCollect as $index => $recepcionsintomaItem) {
                    $borrar = RecepcionesSintomas::where(
                        [
                            'recepcion_id' => $recepcionsintomaItem->recepcion_id,
                            'sintoma_id' => $recepcionsintomaItem->sintoma_id
                        ]
                    )->delete();
                }

            } else {
                /* Si es una recepción */
                $recepcion = new \App\Models\Recepcion();
                $recepcion->taller_id = $this->taller_id;
                $recepcion->reserva_id = (int)$this->reserva_id;
                $recepcion->cliente_id = $this->collCliente->id;
                $recepcion->vehiculo_id = $this->vehiculo_id;
                $recepcion->fecha_recepcion = date('Y-m-d H:i');
                $recepcion->usuario = \Auth::user()->usuario;
                $recepcion->save();

                /* Se genera la orden de trabajo */
                $ordentrabajo = new OrdenTrabajo;
                $ordentrabajo->taller_id = $this->taller_id;
                $ordentrabajo->fecha_recepcion = date('Y-m-d H:i');
                $ordentrabajo->recepcion_id = $recepcion->id;
                $ordentrabajo->cliente_id = $recepcion->cliente_id;
                $ordentrabajo->vehiculo_id = $recepcion->vehiculo_id;
                $ordentrabajo->empleado_id = $recepcion->empleado->empleado_id;
                $ordentrabajo->grupo_id = Auth::user()->empleado->grupo_id;
                $ordentrabajo->tipo = 0;
                $ordentrabajo->prioridad = $recepcion->reserva->prioridad;
                $ordentrabajo->estado = OrdenTrabajo::ESTADO_PENDIENTE;
                //$ordentrabajo->descripcion          = null;
                $ordentrabajo->importe_total = 0;
                $ordentrabajo->usuario = \Auth::user()->usuario;
                $ordentrabajo->save();

            }
            $reservaUpdate = Reserva::find($this->reserva_id);
            $reservaUpdate->estado = Reserva::ESTADO_VERIFICADO;
            $reservaUpdate->save();
            if (isset($recepcion)) {
                //    dd($recepcion);
                $recepcion->save();
            }
            foreach ($this->vector as $index => $item) {
                $recepcionesintomas = new RecepcionesSintomas();
                if (isset($recepcion)) {

                    $recepcionesintomas->recepcion_id = $recepcion->id;
                } else {
                    $recepcionesintomas->recepcion_id = $this->recepcion->id;
                }

                $recepcionesintomas->sintoma_id = $index;
                $recepcionesintomas->save();
            }

            $this->recepcion = $recepcion;

            /*
             * Insercion en Bitacora
             */
            if ($ordentrabajo->bitacora->where('estado', Bitacora::ESTADO_RECEPCIONADO)->count() == 0) {
                if (!(new BitacoraController())
                    ->create($this->recepcion->ordentrabajo->id, date('Y-m-d H:i'), Bitacora::ESTADO_RECEPCIONADO,
                        (new Bitacora())->getEstadoDesc(Bitacora::ESTADO_RECEPCIONADO))) {
                    throw new \Exception('No se pudo crear la bitacora');
                }
            }

            DB::commit();

            session()->flash('msg', 'Reserva recepcionada correctamente');
            session()->flash('type', 'info');


            return redirect()->route('recepcion.index');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getLine() . ' - ' . $e->getMessage());

            \Log::error('Livewire\Recepcion@grabaRecepcion Line: ' . $e->getLine() . ' - Message: ' . $e->getMessage());
            session()->flash('msg', 'No se pudo recepcionar la reserva');
            session()->flash('type', 'error');
        }
    }


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


}
