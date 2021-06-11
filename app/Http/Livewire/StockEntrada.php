<?php

namespace App\Http\Livewire;

use App\Models\Entrada;
use App\Models\EntradaDetalle;
use App\Models\ExistenciaManejo;
use App\Models\ProductoServicio;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class StockEntrada extends Component
{
    public $entrada;

    /*
     * Listas
     */
    public $insumos, $servicios, $sectores;

    public $arrayItems = [];

    public $quantity;

    public function addItem($id)
    {
        if (!array_key_exists($id, $this->arrayItems)) {
            $this->arrayItems[$id] = ProductoServicio::with('clasificacion')->where('id', $id)->first()->toArray();
            $this->arrayItems[$id]['quantity'] = 1;
            $this->arrayItems[$id]['subtotal'] = $this->arrayItems[$id]['precio_venta'];
        }
    }

    public function delItem($id)
    {
        if (array_key_exists($id, $this->arrayItems)) {
            unset($this->arrayItems[$id]);
        }
    }

    public function subtotal($id)
    {
        $this->arrayItems[$id]['subtotal'] = ($this->arrayItems[$id]['quantity'] ?: 0) * $this->arrayItems[$id]['precio_venta'];
    }

    public function guardar()
    {
        /*$repuesto = EntradaDetalle::where(['producto_id' => $this->arrayItems[1]['id'], 'entrada_id' => $this->entrada->id])->first();
        dd($repuesto);*/
        try {
            \DB::beginTransaction();

            $i = 0;
            foreach ($this->arrayItems as $item) {
                $i++;

                if (!$repuesto = EntradaDetalle::where(['producto_id' => $item['id'], 'entrada_id' => $this->entrada->id])->first()) {

                    $repuesto = new EntradaDetalle();
                    $repuesto->item = $i;
                    $repuesto->entrada_id = $this->entrada->id;
                    $repuesto->sector_id = $this->entrada->ordentrabajo->recepcion->reserva->sector;
                    $repuesto->producto_id = $item['id'];
                }

                $repuesto->cantidad = $item['quantity'];
                $repuesto->save();
            }

            $this->entrada = Entrada::find($this->entrada->id);

            foreach ($this->entrada->entradas_detalles as $detalle) {

                if (!$existencia = ExistenciaManejo::where(['producto_id' => $detalle->producto_id, 'sector_id' => $detalle->sector_id])->first()) {

                    $existencia = new ExistenciaManejo();
                    $existencia->sector_id = $detalle->sector_id;
                    $existencia->producto_id = $detalle->producto_id;
                }

                $existencia->cantidad += $detalle->cantidad;
                $existencia->save();
            }


            \DB::commit();

            session()->flash('msg', 'Se ha cargado la entrada');
            session()->flash('type', 'success');

            return redirect()->route('stock.entradas');

        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getLine().' - '.$e->getMessage());

            session()->flash('msg', 'No se pudo cargar la entrada de trabajo');
            session()->flash('type', 'error');
        }

    }

    public function mount()
    {
        $this->insumos = ProductoServicio::whereHas('clasificacion', function ($i){
            $i->whereRaw("lower(descripcion) NOT LIKE 'servicio'");
        })->get();

        if ($this->entrada->entradas_detalles) {
            foreach ($this->entrada->entradas_detalles as $detalle) {
                $this->arrayItems[$detalle->producto_id] = $detalle->producto_servicio()->first()->toArray();
                $this->arrayItems[$detalle->producto_id]['subtotal'] = $detalle->producto_servicio->precio_venta * $detalle->cantidad;
                $this->arrayItems[$detalle->producto_id]['quantity'] = $detalle->cantidad;
            }
        }

        $this->sectores = Sector::pluck('descripcion', 'id');
    }

    public function render()
    {
        return view('livewire.stock-entrada');
    }
}
