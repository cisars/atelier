<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrdenServicio;
use Faker\Generator as Faker;

$factory->define(OrdenServicio::class, function (Faker $faker) {
// Get all data fk tables
    (\App\Models\OrdenTrabajo::all() !== false ) ?  factory('App\Models\OrdenTrabajo')->create() : "";
    (\App\Models\Servicio::all() !== false ) ?  factory('App\Models\Servicio')->create() : "";
    (\App\Models\Usuario::all() !== false ) ?  factory('App\Models\Usuario')->create() : "";

return [
//id
    'ot_id'  => \App\Models\OrdenTrabajo::inRandomOrder()->first()->id,
    'servicio_id'  => \App\Models\Servicio::inRandomOrder()->first()->id,
    'cantidad' => $faker->numberBetween(10000000 ,99999999 ),
    'descripcion' => $faker->text(200),
    'realizado' => $faker->randomElement(['s','n']),
    'verificado' => $faker->randomElement(['s','n']),
    'fecha_registro' => $faker->dateTimeBetween('-50 years', '-20 years' ),
    'usuario'  => \App\Models\Usuario::inRandomOrder()->first()->id,
    'descripcion_verificacion' => $faker->text(200),
    ];
});