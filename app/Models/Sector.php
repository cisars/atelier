<?php

namespace App\Models;

use App\Http\Controllers\ProductoServicioGen;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectores';
    //protected $primaryKey = 'sector';
    //protected $fillable = [];
    protected $guarded = [];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id' );
    }

    public function productos_servicios()
    {
        return $this->belongsToMany(ProductoServicio::class, 'existencias_manejos',
            'sector_id', 'producto_id')->withPivot('cantidad', 'sector_id');
    }



}
