<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turnos';
    protected $primaryKey = 'turno_empleado';
    //protected $fillable = [];
    protected $guarded = [];
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'turno_empleado', 'turno_empleado');
    }
}
