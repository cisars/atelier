<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    protected $primaryKey = 'grupo_trabajo';
    //protected $fillable = [];
    protected $guarded = [];
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'turno_empleado', 'turno_empleado');
    }

//    public function ots()
//    {
//        return $this->hasMany(Ot::class, 'turno_empleado', 'turno_empleado');
//    }
}
