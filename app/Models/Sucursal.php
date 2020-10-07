<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';
    protected $primaryKey = 'sucursal';
    //protected $fillable = [];
    protected $guarded = [];
    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'localidad', 'localidad');
    }
}
