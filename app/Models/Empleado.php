<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'empleado', 'empleado');
    }
    public function turno()
    {
        return $this->belongsTo(Turno::class, 'turno_empleado', 'turno_empleado');
    }
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo', 'cargo');
    }
}
