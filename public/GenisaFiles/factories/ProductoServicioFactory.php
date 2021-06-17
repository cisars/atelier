<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductoServicio;
use Faker\Generator as Faker;

$factory->define(ProductoServicio::class, function (Faker $faker) {
// Get all data fk tables
    (\App\Models\Clasificacion::all()->count() > 0 ) ?  factory('App\Models\Clasificacion')->create() : "";
    (\App\Models\Unidad::all()->count() > 0 ) ?  factory('App\Models\Unidad')->create() : "";

return [
//id
    'codigo' => $faker->text(15),
    'descripcion' => $faker->text(80),
    'clasificacion_id'  => \App\Models\Clasificacion::inRandomOrder()->first()->id,
    'unidad_id'  => \App\Models\Unidad::inRandomOrder()->first()->id,
    'impuesto' => $faker->numberBetween(0 ,255 ),
    'precio_venta' => $faker->numberBetween(100000000000 ,999999999999 ),
    'estado' => $faker->randomElement(['a','i']),
    ];
});
