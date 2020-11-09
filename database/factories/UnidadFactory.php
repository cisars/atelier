<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Unidad;
use Faker\Generator as Faker;

$factory->define(Unidad::class, function (Faker $faker) {
    return [
        'descripcion' =>  substr( $faker->opera, 0,39),
        'sigla' => substr(   $faker->citySuffix, 0,11),
    ];
});
