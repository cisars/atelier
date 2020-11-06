<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {

     (\App\Models\Localidad::all() !== false ) ?  factory('App\Models\Localidad')->create() : "";
     (\App\Models\Cargo::all() !== false ) ?  factory('App\Models\Cargo')->create() : "";
     (\App\Models\Turno::all() !== false ) ?  factory('App\Models\Turno')->create() : "";
     (\App\Models\Grupo::all() !== false ) ?  factory('App\Models\Grupo')->create() : "";

    return [
        'nombres' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'ci' => $faker->numberBetween(700000 , 8000000),
        'estado_civil' => $faker->randomElement(['c', 'd', 'v', 's']),
        'sexo' =>  $faker->randomElement(['f', 'm']),
        'direccion' => $faker->address,
        'localidad'  => \App\Models\Localidad::inRandomOrder()->first()->localidad,
        'movil' => '(+595981)'.$faker->numberBetween(333333,999999),
        'telefono' => '(+59521)'. $faker->numberBetween(333333,999999),
        'cargo'  => \App\Models\Cargo::inRandomOrder()->first()->cargo,
        'turno_empleado'  => \App\Models\Turno::inRandomOrder()->first()->turno_empleado,
        'grupo_trabajo'  => \App\Models\Grupo::inRandomOrder()->first()->grupo_trabajo,
        'fecha_nacimiento' => $faker->dateTimeBetween('-50 years', '-20 years' ),
        'fecha_ingreso' => $faker->date('Y-m-d','now'),
        'estado' => 'A',
        'salario' => $faker->numberBetween(500,10000)
    ];
});
