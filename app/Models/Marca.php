<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Marca extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'marcas';
    //protected $primaryKey = 'marca';
    //protected $fillable = [];
    protected $guarded = [];
    public function modelos()
    {
        return $this->hasMany(Modelo::class, 'marca_id');
    }



}
