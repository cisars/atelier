<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    protected $table = 'recepciones';
//    protected $primaryKey = 'id';
    protected $guarded = [];

    public function sintomas()
    {
        return $this->belongsToMany(Sintoma::class, 'recepciones_sintomas',
            'recepcion_id', 'sintoma_id');
    }

    // Create all cons FUNCTIONS

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'taller_id');
    }
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario', 'usuario');
    }

    public function empleado()
    {
        return $this->belongsTo(Usuario::class, 'usuario', 'usuario');
    }

    public function ordentrabajo()
    {
        return $this->hasOne(OrdenTrabajo::class, 'recepcion_id');
    }

}
