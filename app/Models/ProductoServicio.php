<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ProductosServicios
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] ProductoServicio
// $nombres  = $gen->tabla['ZnombresZ'] productos_servicios
// $nombre   = $gen->tabla['ZnombreZ'] producto_servicio
// GENISA Begin

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoServicio extends Model
{
    protected $table = 'productos_servicios';
    //protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

// Create all cons var with data

// Create all cons FUNCTIONS

    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class, 'producto_servicio_id');
    }
    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'producto_servicio_id');
    }

}

?>
