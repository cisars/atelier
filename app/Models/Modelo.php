<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Modelo extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'modelos';
    //protected $primaryKey = 'modelo';
    //protected $fillable = [];
    protected $guarded = [];
    public function marca()
    {
        return $this->BelongsTo(Marca::class, 'marca_id');
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'modelo_id');
    }
}
