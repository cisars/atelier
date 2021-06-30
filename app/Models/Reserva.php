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
    const FORMA_ONLINE = 'O';
    const FORMA_PRESENCIAL = 'P';
    const FORMA_TELEFONO = 'T';

    //Prioridad
    const PRIORIDAD_NORMAL = 'n';
    const PRIORIDAD_URGENTE = 'u';


//    protected $fillable = [
//        'observacion',
//    ];

    public function getEstados()
    {
        return $estados = [
            'Activo' => Reserva::ESTADO_ACTIVO,
            'Inactivo' => Reserva::ESTADO_INACTIVO,
            'Pendiente' => Reserva::ESTADO_PENDIENTE,
            'Verificado' => Reserva::ESTADO_VERIFICADO,
        ];
    }

    public function getFormas()
    {
        return $formas = [
            'Online' => Reserva::FORMA_ONLINE,
            'Presencial' => Reserva::FORMA_PRESENCIAL,
            'Telefono' => Reserva::FORMA_TELEFONO,
        ];
    }

    public function getPrioridades()
    {
        return $prioridades = [
            'Normal' => Reserva::PRIORIDAD_NORMAL,
            'Urgente' => Reserva::PRIORIDAD_URGENTE,
        ];
    }

    public function getEstadoDescAttribute()
    {
        foreach ($this->getEstados() as $clave => $valor)
            if (trim($this->estado) == trim($valor)) {
                return $clave;
            }

        return null;
    }

    public function getFormaDescAttribute()
    {
        foreach ($this->getFormas() as $clave => $valor)
            if (trim($this->forma_reserva) == trim($valor)) {
                return $clave;
            }

        return null;
    }

    public function getPrioridadDescAttribute()
    {
        foreach ($this->getPrioridades() as $clave => $valor)
            if (trim($this->prioridad) == trim($valor)) {
                return $clave;
            }

        return null;
    }

    public static function retornaHoraSector($parafecha, $ticket)
    {
        $iticket = 0;
        $parametro = Parametro::where('activo', '1')->first();
       // dd($parametro);
        $grillaReservas = Reserva::with('cliente')->where([
            'para_fecha' => $parafecha
        ])->get();
        //Desde el sector 1 hasta el final
        for ($isector = 1; $isector < $parametro->sectores + 1; $isector++) {

            //Toma la hora de apertura
            $turnoCalculado = $parametro->hora_apertura;

            // Mientras apertura sea menor igual a la hora de cierre
            while ($turnoCalculado <= $parametro->hora_cierre) {

                // Si no corresponde al horario de descanso se prosigue el conteo de tickets
                if ($parametro->horaTurno($turnoCalculado)) {

                    $iticket = $iticket + 1;

                    if ( $iticket == $ticket)
                    {
                        return [
                            'ticket' => $ticket,
                            'hora' => $turnoCalculado,
                            'sector' => $isector
                        ];
                    }

                    //  Verifica si esta disponible
//                    if (isset($grillaReservas) && $grillaReservas->contains('ticket', $iticket)) {
//                        $isector . $turnoCalculado;
//                        //  {{-- OCUPADO--}}
//                    } else {
//                        $isector . $turnoCalculado . $iticket;
//                        // {{-- LIBRE--}}
//                    }//endif



                }//endif

                // Siguiente horario segun periodicidad
                $turnoCalculado = date('H:i', strtotime($turnoCalculado . ' + ' . $parametro->periodicidad . ' minutes '));
            } //endwhile
        }//endfor

        return [

        ];
    }

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'taller_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario', 'usuario');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    public function sector_d()
    {
        return $this->belongsTo(Sector::class, 'sector');
    }

//    public function recepciones()
//    {
//        return $this->hasMany(Recepcion::class, 'reserva', 'reserva');
//    }

}
