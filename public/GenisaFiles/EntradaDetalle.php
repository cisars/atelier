<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntradaDetalle extends Model
{
    protected $table = 'entradas_detalles';
    //protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

// Create all cons var with data 

// Create all cons FUNCTIONS 

    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'entrada_id');
    }
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
    public function producto_servicio()
    {
        return $this->belongsTo(ProductoServicio::class, 'producto_servicio_id');
    }


}

?>