<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Salida extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'salidas';
    protected $guarded = [];

// Create all cons var with data

// Create all cons FUNCTIONS

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'taller_id');
    }

    public function ordentrabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class, 'ot_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function salidas_detalles()
    {
        return $this->hasMany(SalidaDetalle::class, 'salida_id');
    }
}
