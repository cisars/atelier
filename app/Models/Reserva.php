<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    //protected $primaryKey = 'reserva';
   protected $guarded = [];

    //Estado
    const ESTADO_ACTIVO = 'A';
    const ESTADO_INACTIVO = 'I';
    const ESTADO_PENDIENTE = 'P';
    const ESTADO_VERIFICADO = 'V';

    //Forma reserva
    const FORMA_ONLINE	    = 'O';
    const FORMA_PRESENCIAL  = 'P';
    const FORMA_TELEFONO    = 'T';

    //Prioridad
    const PRIORIDAD_NORMAL		= 'N';
    const PRIORIDAD_URGENTE     = 'U';


//    protected $fillable = [
//        'observacion',
//    ];

    public function getEstados()
    {
        return $estados = [
            'Activo'        => Reserva::ESTADO_ACTIVO,
            'Inactivo'      => Reserva::ESTADO_INACTIVO,
            'Pendiente'     => Reserva::ESTADO_PENDIENTE,
            'Verificado'    => Reserva::ESTADO_VERIFICADO,
        ];
    }

    public function getFormas()
    {
        return $formas = [
            'Online' 		=> Reserva::FORMA_ONLINE 	,
            'Presencial' 	=> Reserva::FORMA_PRESENCIAL 	,
            'Telefono' 		=> Reserva::FORMA_TELEFONO 	,
        ];
    }

    public function getPrioridades()
    {
        return $prioridades = [
            'Normal' 		=> Reserva::PRIORIDAD_NORMAL 	,
            'Urgente' 		=> Reserva::PRIORIDAD_URGENTE 	,
        ];
    }

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'taller_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario','usuario' );
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id' );
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id'  );
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id' );
    }

//    public function recepciones()
//    {
//        return $this->hasMany(Recepcion::class, 'reserva', 'reserva');
//    }

}
