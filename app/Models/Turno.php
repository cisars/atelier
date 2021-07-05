<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Turno extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'turnos';
    //protected $primaryKey = 'turno_id';
    //protected $fillable = [];
    protected $guarded = [];
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'turno_id');
    }
}
