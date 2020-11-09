<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MaquinariaTipo;
use Faker\Generator as Faker;

$factory->define(MaquinariaTipo::class, function (Faker $faker) {
    return [
        'descripcion' =>  $faker->name  ,
    ];
});
