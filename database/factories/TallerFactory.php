<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Taller;
use Faker\Generator as Faker;

$factory->define(Taller::class, function (Faker $faker) {
    return [
        'descripcion' => substr($faker->company, 0,39) ,
        'direccion' =>  substr($faker->address, 0,79) ,
        'localidad' => App\Models\Localidad::inRandomOrder()->first()->localidad,
        'telefono' => '+59521'. $faker->numberBetween(333333,999999),
    ];
});

//'localidad' => factory(App\Models\Localidad::class)->create()->localidad, // FUNCIONA

//'localidad' => App\Models\Localidad::inRandomOrder()->first()->localidad,
//'localidad' => factory(App\Models\Localidad::class),
