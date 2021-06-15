<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BitacoraController;
use App\Models\Cliente;
use App\Models\Entrega;
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

            /*
             * Insercion en Bitacora
             */
            if (!(new BitacoraController())->create($this->ordentrabajo->id, $this->ordentrabajo->created_at, $this->ordentrabajo->estado, 'Entrega de vehículo')) {
                throw new \Exception('No se pudo crear la bitacora');
            }

            \DB::commit();

            session()->flash('msg', 'Orden de trabajo finalizada');
            session()->flash('type', 'success');

            return redirect()->route('finalizados');

        }catch (\Exception $e){
            \DB::rollBack();
            session()->flash('msg', 'No se pudo finalizar la orden');
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
