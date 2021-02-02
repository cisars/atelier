<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    (\App\Models\Localidad::all() !== false ) ?  factory('App\Models\Localidad')->create() : "";
    return [
        'razon_social' => $faker->lastName . ', ' .$faker->firstName,
        'documento' => $faker->numberBetween(700000 , 8000000),
        'direccion' => $faker->address,
        'localidad_id'  => \App\Models\Localidad::inRandomOrder()->first()->id,
        'telefono' => '(+59521)'. $faker->numberBetween(333333,999999),
        'movil' => '(+595981)'.$faker->numberBetween(333333,999999),
        'fecha_nacimiento' => $faker->dateTimeBetween('-50 years', '-20 years' ),
        'personeria' => Str::random(1),
    ];
});
