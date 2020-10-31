<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sucursal;
use Faker\Generator as Faker;

$factory->define(Sucursal::class, function (Faker $faker) {
    return [
        'descripcion' => substr($faker->company, 0,39) ,
        'direccion' =>  substr($faker->address, 0,39) ,
        'localidad' => factory(App\Models\Localidad::class),
        'telefono' => '+59521'. $faker->numberBetween(333333,999999),
        'email' => $faker->email
    ];
});
