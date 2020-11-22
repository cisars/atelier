<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vehiculo;
use Faker\Generator as Faker;

$factory->define(Vehiculo::class, function (Faker $faker) {

    (\App\Models\Cliente::all() !== false ) ?  factory('App\Models\Cliente')->create() : "";
    (\App\Models\Modelo::all() !== false ) ?  factory('App\Models\Modelo')->create() : "";
    (\App\Models\Color::all() !== false ) ?  factory('App\Models\Color')->create() : "";

    return [
        'cliente'  => \App\Models\Cliente::inRandomOrder()->first()->cliente,
        'modelo'  => \App\Models\Modelo::inRandomOrder()->first()->modelo,
        'chapa' => substr($faker->bankAccountNumber, 0,11) ,
        'chasis' => substr($faker->bankAccountNumber, 0,11) ,
        'color'  => \App\Models\Color::inRandomOrder()->first()->color,
        'combustion' => (new Vehiculo)->getCombustiones()[array_rand( (new Vehiculo)->getCombustiones())],
        'tipo' => (new Vehiculo)->getTipos()[array_rand( (new Vehiculo)->getTipos())],
        'año' => $faker->numberBetween(1990,2020),
    ];
});
