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
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_trabajo', 'grupo_trabajo');
    }


//    public function entregas()
//    {
//        return $this->hasMany(Entregas::class, 'empleado', 'empleado');
//    }
//    public function ordenes_mecanicos()
//    {
//        return $this->hasMany(OrdenesMecanicos::class, 'empleado', 'empleado');
//    }
//    public function empleados_maquinas()
//    {
//        return $this->hasMany(EmpleadosMaquinas::class, 'empleado', 'empleado');
//    }
//    public function reservas()
//    {
//        return $this->hasMany(Reserva::class, 'empleado', 'empleado');
//    }
//    public function Ots()
//    {
//        return $this->hasMany(Ot::class, 'empleado', 'empleado');
//    }
}
