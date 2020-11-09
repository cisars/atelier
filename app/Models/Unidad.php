<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';
    protected $primaryKey = 'unidad';
    //protected $fillable = [];
    protected $guarded = [];
//    public function productos_servicios()
//    {
//        return $this->hasMany(Empleado::class, 'empleado', 'empleado');
//    }
}
