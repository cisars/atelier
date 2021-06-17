<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sector;
use Faker\Generator as Faker;

$factory->define(Sector::class, function (Faker $faker) {
    (\App\Models\Sucursal::all()->count() > 0 ) ? "" : factory('App\Models\Sucursal')->create()  ;

    return [
        'sucursal_id'         => \App\Models\Sucursal::inRandomOrder()->first()->id,
        'descripcion'   => substr($faker->streetName, 0,79) ,
    ];
});
