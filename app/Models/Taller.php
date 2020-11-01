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
//        return $this->hasMany(Reserva::class, 'localidad', 'localidad');
//    }

//    public function Ots()
//    {
//        return $this->hasMany(Ot::class, 'localidad', 'localidad');
//    }

//    public function entregas()
//    {
//        return $this->hasMany(Entrega::class, 'localidad', 'localidad');
//    }

//    public function usuariostalleres()
//    {
//        return $this->hasMany(UsuarioTaller::class, 'localidad', 'localidad');
//    }

//    public function recepciones()
//    {
//        return $this->hasMany(Recepcion::class, 'localidad', 'localidad');
//    }
}
