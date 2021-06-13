<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrdenServicio extends Pivot
{
    protected $table = 'ordenes_servicios';
    protected $primaryKey = ['servicio_id', 'ot_id'];
    public $incrementing = false;


    protected $guarded = [];

    const VERIFICADO_SI = 's'; // verificados
    const VERIFICADO_NO = 'n'; // verificados
    const REALIZADO_SI = 's'; // realizados
    const REALIZADO_NO = 'n'; // realizados

    public function getVerificados()
    {
        return $verificados = [
        'Verificado' => OrdenServicio::VERIFICADO_SI,
        'Verificado' => OrdenServicio::VERIFICADO_NO,
        ];
    }

    public function getRealizados()
    {
        return $realizados = [
        'Realizado' => OrdenServicio::REALIZADO_SI,
        'Realizado' => OrdenServicio::REALIZADO_NO,
        ];
    }

    public function orden_trabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class, 'ot_id');
    }

    public function servicio()
    {
        return $this->belongsTo(ProductoServicio::class, 'servicio_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}

?>
