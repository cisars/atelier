<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaquinariaTipo extends Model
{
    protected $table = 'maquinarias_tipos';
   //  protected $primaryKey = 'id';
    //protected $fillable = [];
    protected $guarded = [];
    public function maquinarias()
    {
        return $this->hasMany(Maquinaria::class, 'maquinaria_tipo_id' );
    }
}
