<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

    //Estado
    const EMPLEADO_ACTIVO = '1';
    const EMPLEADO_INACTIVO = '2';
    //Sexo
    const EMPLEADO_MASCULINO = 'm';
    const EMPLEADO_FEMENINO = 'f';
    //Estado Civil
    const EMPLEADO_CASADO = 'c';
    const EMPLEADO_DIVORCIADO = 'd';
    const EMPLEADO_VIUDO = 'v';
    const EMPLEADO_SOLTERO = 's';

    public function getSexos()
    {
        return $sexos = [
            'Masculino' => Empleado::EMPLEADO_MASCULINO,
            'Femenino' => Empleado::EMPLEADO_FEMENINO,
        ];
    }
    public function getEstados()
    {
        return $estados = [
            'Activo' => Empleado::EMPLEADO_ACTIVO,
            'Inactivo' => Empleado::EMPLEADO_INACTIVO,
        ];
    }
    public function getEstadosCiviles()
    {
        return $estadosciviles = [
            'Soltero' => Empleado::EMPLEADO_SOLTERO,
            'Casado' => Empleado::EMPLEADO_CASADO,
            'Divorciado' => Empleado::EMPLEADO_DIVORCIADO,
            'Viudo' => Empleado::EMPLEADO_VIUDO,
        ];
    }

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
