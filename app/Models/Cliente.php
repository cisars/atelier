<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    //protected $primaryKey = 'cliente';
    //protected $fillable = [];
    protected $guarded = [];
    // Create all cons var with data
    // Personeria
    const PERSONERIA_SOCIEDADES = 's'; // personerias
    const PERSONERIA_CIVILES = 'c'; // personerias
    const PERSONERIA_SIMPLES  = 'i'; // personerias
    const PERSONERIA_FUNDACIONES = 'f'; // personerias
    const PERSONERIA_ENTIDADES = 'e'; // personerias
    const PERSONERIA_MUTUALES = 'm'; // personerias
    const PERSONERIA_COOPERATIVAS = 'o'; // personerias
    const PERSONERIA_CONSORCIOS = 'n'; // personerias

// Create all cons FUNCTIONS
    // Funcion Personeria // personerias
    public function getPersonerias()
    {
        return $personerias = [
            'Sociedades' => Cliente::PERSONERIA_SOCIEDADES,
            'Civiles' => Cliente::PERSONERIA_CIVILES,
            'Simples ' => Cliente::PERSONERIA_SIMPLES ,
            'Fundaciones' => Cliente::PERSONERIA_FUNDACIONES,
            'Entidades' => Cliente::PERSONERIA_ENTIDADES,
            'Mutuales' => Cliente::PERSONERIA_MUTUALES,
            'Cooperativas' => Cliente::PERSONERIA_COOPERATIVAS,
            'Consorcios' => Cliente::PERSONERIA_CONSORCIOS,
        ];
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'cliente_id' );
    }
    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'localidad_id' );
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
        return $this->hasMany(Vehiculo::class, 'cliente_id' );
    }
//    public function Ots()
//    {
//        return $this->hasMany(Ot::class, 'cliente', 'cliente');
//    }
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'cliente_id' );
    }
}
