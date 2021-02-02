<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    //protected $primaryKey = 'grupo_id';
    //protected $fillable = [];
    protected $guarded = [];
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'grupo_id');
    }

//    public function ots()
//    {
//        return $this->hasMany(Ot::class, 'turno_id', 'turno_id');
//    }
}
