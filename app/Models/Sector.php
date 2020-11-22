<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectores';
    protected $primaryKey = 'sector';
    //protected $fillable = [];
    protected $guarded = [];
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal', 'sucursal');
    }

//    public function existencias_manejos()
//    {
//        return $this->hasMany(ExistenciaManejo::class, 'sector', 'sector');
//    }
}
