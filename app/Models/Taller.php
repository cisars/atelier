<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table = 'talleres';
    protected $primaryKey = 'taller';
    //protected $fillable = [];
    protected $guarded = [];
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'taller', 'taller');
    }


//    public function reservas()
//    {
//        return $this->hasMany(Sector::class, 'localidad', 'localidad');
//    }

//    public function OT()
//    {
//        return $this->hasMany(Entrada::class, 'localidad', 'localidad');
//    }

//    public function entregas()
//    {
//        return $this->hasMany(Taller::class, 'localidad', 'localidad');
//    }

//    public function usuariostalleres()
//    {
//        return $this->hasMany(Taller::class, 'localidad', 'localidad');
//    }

//    public function recepciones()
//    {
//        return $this->hasMany(Taller::class, 'localidad', 'localidad');
//    }
}
