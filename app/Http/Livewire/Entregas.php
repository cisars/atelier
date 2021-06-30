<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BitacoraController;
use App\Mail\CierreOt;
use App\Mail\EntregaVehiculo;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Entrega;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Entregas extends Component
{
    public $ordenes, $clientes, $ordentrabajo;

    public $cliente_id, $ot_id, $taller, $vehiculo, $vehiculo_det, $fecha_entrega, $empleado, $observacion;

    public $habilitarFinalizar = false;

    public function finalizar()
    {
        $this->validate([
           'cliente_id' => 'required'
        ]);

        try {
            \DB::beginTransaction();

            $entrega = new Entrega();
            $entrega->taller_id     = $this->ordentrabajo->taller_id;
            $entrega->ot_id         = $this->ordentrabajo->id;
            $entrega->cliente_id    = $this->cliente_id;
            $entrega->vehiculo_id   = $this->ordentrabajo->vehiculo_id;
            $entrega->empleado_id   = $this->ordentrabajo->empleado_id;
            $entrega->fecha         = date('Y-m-d H:i');
            $entrega->observacion   = $this->observacion;
            $entrega->usuario       = \Auth::user()->usuario;
            $entrega->save();

            $this->ordentrabajo->estado = \App\Models\OrdenTrabajo::ESTADO_ENTREGADO;
            $this->ordentrabajo->save();

            Mail::to($this->ordentrabajo->cliente->email)->send(new EntregaVehiculo($this->ordentrabajo));

            /*
         * Insercion en Bitacora
         */
            if ($this->ordentrabajo->bitacora->where('estado', Bitacora::ESTADO_ENTREGADO)->count() == 0) {
                if (!(new BitacoraController())
                    ->create($this->ordentrabajo->id, date('Y-m-d H:i'), Bitacora::ESTADO_ENTREGADO,
                        (new Bitacora())->getEstadoDesc(Bitacora::ESTADO_ENTREGADO))) {
                    throw new \Exception('No se pudo crear la bitacora');
                }
            }

            \DB::commit();

            session()->flash('msg', 'Vehículo entregado');
            session()->flash('type', 'success');

            return redirect()->route('entregas');

        }catch (\Exception $e){
            \DB::rollBack();
            session()->flash('msg', 'No se pudo entregar el vehículo');
            session()->flash('type', 'error');

            dd($e->getMessage());


            return;
        }
    }

    public function seleccionarOt()
    {
        $this->ordentrabajo = \App\Models\OrdenTrabajo::find($this->ot_id);
        $this->taller           = $this->ordentrabajo->taller->descripcion;
        $this->vehiculo         = $this->ordentrabajo->vehiculo->full_desc;
        $this->vehiculo_det     = $this->ordentrabajo->vehiculo->full_meta_vehiculo;
        $this->fecha_entrega    = strftime("%Y-%m-%dT%H:%M");
        $this->empleado         = $this->ordentrabajo->empleado->nombres.' '.$this->ordentrabajo->empleado->apellidos;
        $this->habilitarFinalizar = true;
    }
    public function mount()
    {
        //$this->ordenes = ;
        foreach (\App\Models\OrdenTrabajo::where('estado', 'f')->get() as $key => $orden) {
            $this->ordenes[$orden->id] = '#Orden: ' . $orden->id . ' | ' . $orden->cliente->razon_social;
        }

        $this->clientes = Cliente::pluck('razon_social', 'id');
    }

    public function render()
    {
        return view('livewire.entregas');
    }
}
