<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Cargo extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'cargos';
    //protected $primaryKey = 'cargo';
    //protected $fillable = [];
    protected $guarded = [];
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'cargo_id');
    }
}
