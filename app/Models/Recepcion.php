<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    protected $table = 'recepciones';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function sintomas()
    {
        return $this->belongsToMany(Sintoma::class, 'recepciones_sintomas',
            'recepcion_id', 'sintoma_id');
    }
}
