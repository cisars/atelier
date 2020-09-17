<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'empleado', 'empleado');
    }
}
