<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'cliente';
    //protected $fillable = [];
    protected $guarded = [];
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'cliente', 'cliente');
    }
    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'localidad', 'localidad');
    }
//    public function recepciones()
//    {
//        return $this->hasMany(Recepcion::class, 'cliente', 'cliente');
//    }
//    public function entregas()
//    {
//        return $this->hasMany(Entrega::class, 'cliente', 'cliente');
//    }
//    public function facturas()
//    {
//        return $this->hasMany(Factura::class, 'cliente', 'cliente');
//    }
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'cliente', 'cliente');
    }
//    public function Ots()
//    {
//        return $this->hasMany(Ot::class, 'cliente', 'cliente');
//    }
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'cliente', 'cliente');
    }
}
