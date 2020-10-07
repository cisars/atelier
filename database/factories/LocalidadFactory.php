<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Localidad;
use Faker\Generator as Faker;

$factory->define(Localidad::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->country
    ];
});
