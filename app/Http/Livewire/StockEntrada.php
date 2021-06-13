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

    public function adicionar($id)
    {
        dd('A');
        /*$this->arrayItems[$id]['quantity'] = ($this->arrayItems[$id]['quantity'] ?: 0) * $this->arrayItems[$id]['precio_venta'];*/
    }

    public function guardar()
    {
        try {
            \DB::beginTransaction();

            $i = 0;
            foreach ($this->arrayItems as $item) {
                $i++;

                if (!$repuesto = EntradaDetalle::where(['producto_id' => $item['id'], 'entrada_id' => $this->entrada->id])->first()) {

                    $repuesto = new EntradaDetalle();
                    $repuesto->item = $i;
                    $repuesto->entrada_id = $this->entrada->id;
                    $repuesto->sector_id = $this->entrada->ordentrabajo->sector_id;
                    $repuesto->producto_id = $item['id'];
                }

                $repuesto->cantidad = $item['quantity'];
                $repuesto->save();

                if ($repuesto->sector->productos_servicios()->where('producto_id', $repuesto->producto_id)->exists()) {
                    $sum = $repuesto->sector->productos_servicios()->where('producto_id', $repuesto->producto_id)->sum('cantidad');
                    $repuesto->sector->productos_servicios()->updateExistingPivot($repuesto->producto_id, array('cantidad' => $sum + $repuesto->cantidad), false);
                }else{
                    $repuesto->sector->productos_servicios()->attach($repuesto->producto_id, ['cantidad' => $repuesto->cantidad]);
                }
            }

            \DB::commit();

            session()->flash('msg', 'Se ha cargado la entrada');
            session()->flash('type', 'success');

            return redirect()->route('stock.entradas');

        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getLine() . ' - ' . $e->getMessage());

            session()->flash('msg', 'No se pudo cargar la entrada');
            session()->flash('type', 'error');
        }

    }

    public function mount()
    {
        $this->insumos = ProductoServicio::whereHas('clasificacion', function ($i) {
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

        $this->existencias = ProductoServicio::whereHas('sectores')->get();
    }

    public function render()
    {
        /*$this->existencias = ExistenciaManejo::where('cantidad', '>', 0)->get();*/
        return view('livewire.stock-entrada');
    }
}
