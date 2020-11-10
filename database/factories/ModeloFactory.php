<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Modelo;
use Faker\Generator as Faker;

$factory->define(Modelo::class, function (Faker $faker) {

    (\App\Models\Marca::all() !== false ) ?  factory('App\Models\Marca')->create() : "";

    return [
        'descripcion'   => substr($faker->city, 0,39) ,
        'marca'         => \App\Models\Marca::inRandomOrder()->first()->marca,
    ];
});

