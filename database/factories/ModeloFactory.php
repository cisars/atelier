<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Modelo;
use Faker\Generator as Faker;

$factory->define(Modelo::class, function (Faker $faker) {

    (\App\Models\Marca::all()->count() > 0 ) ? "" : factory('App\Models\Marca')->create()  ;

    return [
        'marca_id'         => \App\Models\Marca::inRandomOrder()->first()->id,
        'descripcion'   => substr($faker->city, 0,39) ,
    ];
});

