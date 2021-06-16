<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ExistenciaManejo extends Pivot
{
    protected $table = 'existencias_manejos';
    protected $primaryKey = ['sector_id', 'producto_id'];
    public $incrementing = false;

    public function repuesto()
    {
        return $this->belongsTo(ProductoServicio::class, 'producto_id');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
