<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Clasificacion extends Model  Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'clasificaciones';
    //protected $primaryKey = 'clasificacion';
    //protected $fillable = [];
   //  public $timestamps = true;
    protected $guarded = [];
//    public function clientes()
//    {
//        return $this->hasMany(ProductosServicios::class, 'localidad', 'localidad');
//    }
//
//    public function clasificaciones()
//    {
//        return $this->getKey();
//      //  return Clasificacion::all();
//    }
}
