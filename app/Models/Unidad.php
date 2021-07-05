<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Unidad extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'unidades';
    //protected $primaryKey = 'unidad';
    //protected $fillable = [];
    protected $guarded = [];
//    public function productos_servicios()
//    {
//        return $this->hasMany(ProductoServicio::class, 'producto_servicio', 'producto_servicio');
//    }
}
