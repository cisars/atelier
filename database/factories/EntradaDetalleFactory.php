<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EntradaDetalle;
use Faker\Generator as Faker;

$factory->define(EntradaDetalle::class, function (Faker $faker) {
// Get all data fk tables
    (\App\Models\Entrada::all()->count() > 0 ) ? "" : factory('App\Models\Entrada')->create()  ;
    (\App\Models\Sector::all()->count() > 0 ) ? "" : factory('App\Models\Sector')->create()  ;
    (\App\Models\ProductoServicio::all()->count() > 0 ) ? "" : factory('App\Models\ProductoServicio')->create()  ;

return [
//item
    'entrada_id'  => \App\Models\Entrada::inRandomOrder()->first()->id,
    'sector_id'  => \App\Models\Sector::inRandomOrder()->first()->id,
    'producto_id'  => \App\Models\ProductoServicio::inRandomOrder()->first()->id,
    'cantidad' => $faker->numberBetween(10000000 ,99999999 ),
    ];
});
