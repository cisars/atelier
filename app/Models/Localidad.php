<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Localidad extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'localidades';
   // protected $primaryKey = 'localidad';
    //protected $fillable = [];
    // public $timestamps = false;
    protected $guarded = [];
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'localidad_id');
    }
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'localidad_id');
    }
    public function sucursales()
    {
        return $this->hasMany(Sucursal::class, 'sucursal_id');
    }
}
