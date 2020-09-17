<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'nombres' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'ci' => $faker->numberBetween(700000 , 8000000),
        'estado_civil' => $faker->boolean,
        'sexo' => $faker->boolean,
        'direccion' => $faker->address,
        'movil' => '(+595981)'.$faker->numberBetween(333333,999999),
        'telefono' => '(+59521)'. $faker->numberBetween(333333,999999),
        'fecha_nacimiento' => $faker->dateTimeBetween('-50 years', '-20 years' ),
        'fecha_ingreso' => $faker->date('Y-m-d','now'),
        'fecha_egreso' => $faker->date('Y-m-d','now'),
        'motivo_egreso' => $faker->sentence,
        'salario' => $faker->numberBetween(500,10000)
    ];
});
