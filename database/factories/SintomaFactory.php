<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sintoma;
use Faker\Generator as Faker;

$factory->define(Sintoma::class, function (Faker $faker) {
    return [
        'descripcion' =>  substr( $faker->safeColorName, 0,79),
    ];
});
