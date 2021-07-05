<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Color extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'colores';
    //protected $primaryKey = 'color';
    //protected $fillable = [];
    protected $guarded = [];
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'color_id');
    }
}
