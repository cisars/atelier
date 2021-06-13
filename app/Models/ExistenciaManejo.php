<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ExistenciaManejo extends Pivot
{
    protected $table = 'existencias_manejos';
    protected $primaryKey = ['sector_id', 'producto_id'];
    public $incrementing = false;
}
