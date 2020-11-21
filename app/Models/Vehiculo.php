<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $primaryKey = 'vehiculo';
    protected $guarded = [];

    //Combustion
    const COMBUSTION_UNO = 'x';
    const COMBUSTION_DOS = 'y';
    //Tipo
    const TIPO_UNO = 'u';
    const TIPO_DOS = 'd';

    public function getCombustiones()
    {
        return $combustiones = [
            'COMBUSTION_UNO' => Vehiculo::COMBUSTION_UNO,
            'COMBUSTION_DOS' => Vehiculo::COMBUSTION_DOS,
        ];
    }
    public function getTipos()
    {
        return $tipos = [
            'TIPO_UNO' => Vehiculo::TIPO_UNO,
            'TIPO_DOS' => Vehiculo::TIPO_DOS,
        ];
    }

//    public function reservas()
//    {
//        return $this->hasMany(Reserva::class, 'vehiculo', 'vehiculo');
//    }
//    public function entregas()
//    {
//        return $this->hasMany(Entregas::class, 'vehiculo', 'vehiculo');
//    }
//    public function ordenes_trabajos()
//    {
//        return $this->hasMany(OrdeneTrabajo::class, 'vehiculo', 'vehiculo');
//    }
//    public function recepciones()
//    {
//        return $this->hasMany(Recepcion::class, 'vehiculo', 'vehiculo');
//    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente', 'cliente');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color', 'color');
    }
    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo', 'modelo');
    }
}
