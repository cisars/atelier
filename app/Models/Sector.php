<?php

namespace App\Models;

use App\Http\Controllers\ProductoServicioGen;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Sector extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'sectores';
    //protected $primaryKey = 'sector';
    //protected $fillable = [];
    protected $guarded = [];

    public function productos_servicios()
    {
        return $this->belongsToMany(ProductoServicio::class, 'existencias_manejos',
            'sector_id', 'producto_id')->withPivot('cantidad', 'sector_id');
    }

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'taller_id');

    }


}
