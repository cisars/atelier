<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colores';
    protected $primaryKey = 'color';
    //protected $fillable = [];
    protected $guarded = [];
//    public function vehiculos()
//    {
//        return $this->hasMany(Vehiculo::class, 'vehiculo', 'vehiculo');
//    }
}
