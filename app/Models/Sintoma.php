<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $table = 'sintomas';
    protected $primaryKey = 'sintoma';
    //protected $fillable = [];
    protected $guarded = [];
//    public function recepciones_detalles()
//    {
//        return $this->hasMany(RecepcionDetalle::class, 'recepcion_detalle', 'recepcion_detalle');
//    }
}
