<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table = 'talleres';
    protected $primaryKey = 'id';
    //protected $fillable = [];
    protected $guarded = [];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'localidad_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'taller_id');
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'talleres_usuarios',
            'taller_id', 'usuario');
    }
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
