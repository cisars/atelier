<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Entradas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Entrada
// $nombres  = $gen->tabla['ZnombresZ'] entradas
// $nombre   = $gen->tabla['ZnombreZ'] entrada
// GENISA Begin

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entrada;
use Faker\Generator as Faker;

$factory->define(Entrada::class, function (Faker $faker) {
// Get all data fk tables
    (\App\Models\Taller::all()->count() > 0 ) ? "" : factory('App\Models\Taller')->create() ;
    (\App\Models\OrdenTrabajo::all()->count() > 0 ) ? "" : factory('App\Models\OrdenTrabajo')->create()  ;
    (\App\Models\Empleado::all()->count() > 0 ) ? "" : factory('App\Models\Empleado')->create()   ;
    (\App\Models\Usuario::all()->count() > 0 ) ? "" : factory('App\Models\Usuario')->create()  ;

return [
//id
    'taller_id'  => \App\Models\Taller::inRandomOrder()->first()->id,
    'ot_id'  => \App\Models\OrdenTrabajo::inRandomOrder()->first()->id,
    'numero_documento' => $faker->text(12),
    'fecha' => $faker->dateTimeBetween('-50 years', '-20 years' ),
    'empleado_id'  => \App\Models\Empleado::inRandomOrder()->first()->id,
    'usuario'  => \App\Models\Usuario::inRandomOrder()->first()->id,
    ];
});
