<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Clasificacion;
use Faker\Generator as Faker;

$factory->define(Clasificacion::class, function (Faker $faker) {
    return [
        'descripcion' => substr($faker->country, 0,39)
    ];
});
