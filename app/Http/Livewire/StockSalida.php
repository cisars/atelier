<?php

namespace App\Http\Livewire;

use App\Models\ProductoServicio;
use App\Models\SalidaDetalle;
use App\Models\Sector;
use Livewire\Component;

class StockSalida extends Component
{
    public $salida;

    /*
     * Listas
     */
    public $insumos, $servicios, $sectores, $existencias;

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

    public function guardar()
    {
        try {
            \DB::beginTransaction();

            $i = 0;
            foreach ($this->arrayItems as $item) {
                $i++;

                if (!$repuesto = SalidaDetalle::where(['producto_id' => $item['id'], 'salida_id' => $this->salida->id])->first()) {

                    $repuesto = new SalidaDetalle();
                    $repuesto->item = $i;
                    $repuesto->salida_id = $this->salida->id;
                    $repuesto->sector_id = $this->salida->ordentrabajo->recepcion->reserva->sector;
                    $repuesto->producto_id = $item['id'];
                }

                $repuesto->cantidad = $item['quantity'];
                $repuesto->save();

                /*
                 * Actualizacion en existencia manejo
                 */
                if ($repuesto->sector->productos_servicios()->where('producto_id', $repuesto->producto_id)->exists()) {
                    $sum = $repuesto->sector->productos_servicios()->where('producto_id', $repuesto->producto_id)->sum('cantidad');
                    $repuesto->sector->productos_servicios()->updateExistingPivot($repuesto->producto_id, array('cantidad' => $sum - $repuesto->cantidad), false);
                }/*else{
                    $repuesto->sector->productos_servicios()->attach($repuesto->producto_id, ['cantidad' => $repuesto->cantidad]);
                }*/
            }

            \DB::commit();

            session()->flash('msg', 'Se ha cargado la salida');
            session()->flash('type', 'success');

            return redirect()->route('stock.salidas');

        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getLine() . ' - ' . $e->getMessage());

            session()->flash('msg', 'No se pudo cargar la salida');
            session()->flash('type', 'error');
        }
    }

    public function mount()
    {
        $this->insumos = ProductoServicio::whereHas('clasificacion', function ($i) {
            $i->whereRaw("lower(descripcion) NOT LIKE 'servicio'");
        })->get();

        if ($this->salida->ordentrabajo->entradas) {

            foreach ($this->salida->ordentrabajo->entradas as $entrada) {
                foreach ($entrada->entradas_detalles as $detalle) {
                    $this->arrayItems[$detalle->producto_id] = $detalle->producto_servicio()->first()->toArray();
                    $this->arrayItems[$detalle->producto_id]['subtotal'] = $detalle->producto_servicio->precio_venta * $detalle->cantidad;
                    $this->arrayItems[$detalle->producto_id]['quantity'] = $detalle->cantidad - $detalle->usado ?: 0;
                }
            }
        }

        $this->sectores = Sector::pluck('descripcion', 'id');

        $this->existencias = ProductoServicio::whereHas('sectores')->get();
    }

    public function render()
    {
        return view('livewire.stock-salida');
    }
}
