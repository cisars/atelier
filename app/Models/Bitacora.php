<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Bitacora extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'bitacoras';
    protected $guarded = [];

    /*
     * Estados
     */
    const ESTADO_RECEPCIONADO           = 'a';
    const ESTADO_A_REALIZAR             = 'b';
    const ESTADO_PRESUPUESTO_CONFECCIONADO = 'c';
    const ESTADO_PRESUPUESTO_ENVIADO    = 'd';
    const ESTADO_PRESUPUESTO_APROBADO   = 'e';
    const ESTADO_PRESUPUESTO_RECHAZADO  = 'f';
    const ESTADO_TRABAJO_INICIADO       = 'g';
    const ESTADO_TRABAJO_REALIZADO      = 'h';
    const ESTADO_TRABAJO_VERIFICADO     = 'i';
    const ESTADO_TRABAJO_FINALIZADO     = 'j';
    const ESTADO_ENTREGADO              = 'k';

    public function getEstados()
    {
        return $estados = [
            'Estado Recepcionado'               => Bitacora::ESTADO_RECEPCIONADO,
            'Estado A Realizar'                 => Bitacora::ESTADO_A_REALIZAR,
            'Estado Presupuesto Confeccionado'  => Bitacora::ESTADO_PRESUPUESTO_CONFECCIONADO,
            'Estado Presupuesto Enviado'        => Bitacora::ESTADO_PRESUPUESTO_ENVIADO,
            'Estado Presupuesto Aprobado'       => Bitacora::ESTADO_PRESUPUESTO_APROBADO,
            'Estado Presupuesto Rechazado'      => Bitacora::ESTADO_PRESUPUESTO_RECHAZADO,
            'Estado Trabajo Iniciado'           => Bitacora::ESTADO_TRABAJO_INICIADO,
            'Estado Trabajo Realizado'          => Bitacora::ESTADO_TRABAJO_REALIZADO,
            'Estado Trabajo Verificado'         => Bitacora::ESTADO_TRABAJO_VERIFICADO,
            'Estado Trabajo Finalizado'         => Bitacora::ESTADO_TRABAJO_FINALIZADO,
            'Estado Entregado'                  => Bitacora::ESTADO_ENTREGADO,
        ];
    }

    public function getEstadoDesc($est)
    {
        foreach ($this->getEstados() as $clave => $valor)
            if (trim($est) == trim($valor)) {
                return $clave;
            }

        return null;
    }

    public function getEstadoDescAttribute()
    {
        foreach ($this->getEstados() as $clave => $valor)
            if (trim($this->estado) == trim($valor)) {
                return $clave;
            }

        return null;
    }

    public function ordentrabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class, 'ot_id');
    }
}
