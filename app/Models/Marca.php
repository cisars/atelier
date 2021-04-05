<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    //protected $primaryKey = 'marca';
    //protected $fillable = [];
    protected $guarded = [];
    public function modelos()
    {
        return $this->hasMany(Modelo::class, 'marca_id');
    }



}
