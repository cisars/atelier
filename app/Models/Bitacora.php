<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacoras';
    protected $guarded = [];

    public function ordentrabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class, 'ot_id');
    }
}
