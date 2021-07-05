<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use OwenIt\Auditing\Auditable;

class EmpleadoMaquina extends Pivot Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    public $table = 'empleados_maquinas';

    protected $guarded = [];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
    public function maquinaria()
    {
        return $this->belongsTo(Maquinaria::class, 'maquinaria_id');
    }
}
