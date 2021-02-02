<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $table = 'maquinarias';
   // protected $primaryKey = 'maquinaria';
    //protected $fillable = [];
    protected $guarded = [];

    const MAQUINARIA_INACTIVA = 'I';
    const MAQUINARIA_ACTIVA = 'A';

    public function getEstados()
    {
        return $estados = [
            'Inactivo' => Maquinaria::MAQUINARIA_INACTIVA,
            'Activo' => Maquinaria::MAQUINARIA_ACTIVA,
        ];
    }


    public function maquinaria_tipo()
    {
        return $this->belongsTo(MaquinariaTipo::class, 'maquinaria_tipo_id' );
    }

//    public function empleados_maquinas()
//    {
//        return $this->hasMany(EmpleadoMaquina::class, 'maquinaria', 'maquinaria');
//    }
//
//    public function getRouteKeyName()
//    {
//        return 'maquinaria';
//    }
//
//
//    public function resolveRouteBinding($value, $field = null)
//    {
//        return $this->where('maquinaria', $value)->firstOrFail();
//    }

}
