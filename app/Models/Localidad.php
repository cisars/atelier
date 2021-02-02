<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
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
