<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {

     (\App\Models\Localidad::all()->count() > 0 ) ? "" : factory('App\Models\Localidad')->create() ;
     (\App\Models\Cargo::all()->count() > 0 ) ?  "" : factory('App\Models\Cargo')->create()  ;
     (\App\Models\Turno::all()->count() > 0 ) ?  "" : factory('App\Models\Turno')->create()  ;
     (\App\Models\Grupo::all()->count() > 0 ) ?  "" : factory('App\Models\Grupo')->create()  ;

    return [
        'nombres' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'ci' => $faker->numberBetween(700000 , 8000000),
        'estado_civil' => $faker->randomElement(['c', 'd', 'v', 's']),
        'sexo' =>  $faker->randomElement(['f', 'm']),
        'direccion' => $faker->address,
        'localidad_id'  => \App\Models\Localidad::inRandomOrder()->first()->id,
        'movil' => '(+595981)'.$faker->numberBetween(333333,999999),
        'telefono' => '(+59521)'. $faker->numberBetween(333333,999999),
        'cargo_id'  => \App\Models\Cargo::inRandomOrder()->first()->id,
        'turno_id'  => \App\Models\Turno::inRandomOrder()->first()->id,
        'grupo_id'  => \App\Models\Grupo::inRandomOrder()->first()->id,
        'fecha_nacimiento' => $faker->dateTimeBetween('-50 years', '-20 years' ),
        'fecha_ingreso' => $faker->dateTimeBetween('-10 years', '-1 years' ),
        'estado' => 'A',
        'salario' => $faker->numberBetween(500,10000)
    ];
});
