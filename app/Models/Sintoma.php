<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Sintoma extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'sintomas';
    protected $primaryKey = 'id';
    //protected $fillable = [];
    protected $guarded = [];

    public function recepciones()
    {
        return $this->belongsToMany(Recepcion::class, 'recepciones_sintomas',
            'sintoma_id', 'recepcion_id');
    }

//    public function recepciones_detalles()
//    {
//        return $this->hasMany(RecepcionDetalle::class, 'recepcion_detalle', 'recepcion_detalle');
//    }
}
