<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use OwenIt\Auditing\Auditable;

class OrdenRepuesto extends Pivot Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'ordenes_repuestos';
    protected $primaryKey = ['producto_id', 'ot_id'];
    public $incrementing = false;

    public function orden_trabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class, 'ot_id');
    }
    public function repuesto()
    {
        return $this->belongsTo(ProductoServicio::class, 'producto_id');
    }

    public function sectorId()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
