<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Sucursal extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'sucursales';
    //protected $primaryKey = 'sucursal';
    //protected $fillable = [];
    protected $guarded = [];
    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'localidad_id' );
    }

//    public function sectores()
//    {
//        return $this->hasMany(Sector::class, 'localidad', 'localidad');
//    }
//
//    public function entradas()
//    {
//        return $this->hasMany(Entrada::class, 'localidad', 'localidad');
//    }

    public function talleres()
    {
        return $this->hasMany(Taller::class, 'sucursal_id' );
    }

}
