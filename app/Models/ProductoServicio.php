<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class ProductoServicio extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'productos_servicios';
    //protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

// Create all cons var with data
    // Estado
    const ESTADO_ACTIVO = 'a'; // estados
    const ESTADO_INACTIVO = 'i'; // estados

// Create all cons FUNCTIONS
    // Funcion Estado // estados
    public function getEstados()
    {
        return $estados = [
            'Estado Activo' => ProductoServicio::ESTADO_ACTIVO,
            'Estado Inactivo' => ProductoServicio::ESTADO_INACTIVO,
        ];
    }

    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class, 'clasificacion_id');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }

    public function vehiculos()
    {
        return $this->hasMany(Cliente::class, 'producto_servicio_id');
    }

    public function reservas()
    {
        return $this->hasMany(Cliente::class, 'producto_servicio_id');
    }

    public function sectores()
    {
        return $this->belongsToMany(Sector::class, 'existencias_manejos',
            'producto_id', 'sector_id')->withPivot('cantidad');
    }

    /*public function sectores()
    {
        return $this->belongsToMany(Sector::class, 'talleres_usuarios',
            'taller_id', 'usuario');
    }*/

}

?>
