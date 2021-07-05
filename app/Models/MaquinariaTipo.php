<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class MaquinariaTipo extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'maquinarias_tipos';
   //  protected $primaryKey = 'id';
    //protected $fillable = [];
    protected $guarded = [];
    public function maquinarias()
    {
        return $this->hasMany(Maquinaria::class, 'maquinaria_tipo_id' );
    }
}
