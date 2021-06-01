<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Entradas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Entrada
// $nombres  = $gen->tabla['ZnombresZ'] entradas
// $nombre   = $gen->tabla['ZnombreZ'] entrada
// GENISA Begin

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entradas';
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
        return $this->belongsTo(OrdenTrabajo::class, 'orden_trabajo_id');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function entradas_detalles()
    {
        return $this->hasMany(EntradaDetalle::class, 'entrada_id');
    }

}

?>
