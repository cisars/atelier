<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Entrega extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'entregas';
    //protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

// Create all cons var with data

// Create all cons FUNCTIONS

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'taller_id');
    }
    public function orden_trabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class, 'ot_id');
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario');
    }
}

?>
