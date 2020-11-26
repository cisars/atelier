<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'reserva';
    protected $guarded = [];

    //Estado
    const ESTADO_UNO = 'U';
    const ESTADO_DOS = 'D';

    //Forma reserva
    const FORMA_UNO		= 'U';
    const FORMA_DOS     = 'D';

    //Prioridad
    const PRIORIDAD_UNO		= 'U';
    const PRIORIDAD_DOS     = 'D';

    public function getEstados()
    {
        return $estados = [
            'euno'      => Reserva::ESTADO_UNO,
            'edos'      => Reserva::ESTADO_DOS,
        ];
    }

    public function getFormas()
    {
        return $formas = [
            'funo' 		=> Reserva::FORMA_UNO 	,
            'fdos' 		=> Reserva::FORMA_DOS 	,
        ];
    }

    public function getPrioridades()
    {
        return $prioridades = [
            'puno' 		=> Reserva::PRIORIDAD_UNO 	,
            'pdos' 		=> Reserva::PRIORIDAD_DOS 	,
        ];
    }

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'taller', 'taller');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario', 'usuario');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente', 'cliente');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado', 'empleado');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo', 'vehiculo');
//        return $this->belongsToMany(Vehiculo::class, 'vehiculo', 'vehiculo')
//            ->using(Modelo::class )
//            ->withPivot([
//                'vehiculo',
//            ]);
    }



//    public function recepciones()
//    {
//        return $this->hasMany(Recepcion::class, 'reserva', 'reserva');
//    }

}