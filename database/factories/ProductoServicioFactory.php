<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ProductosServicios
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] ProductoServicio
// $nombres  = $gen->tabla['ZnombresZ'] productos_servicios
// $nombre   = $gen->tabla['ZnombreZ'] producto_servicio
// GENISA Begin

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductoServicio;
use Faker\Generator as Faker;

$factory->define(ProductoServicio::class, function (Faker $faker) {
// Get all data fk tables
    (\App\Models\Clasificacion::all() !== false ) ?  factory('App\Models\Clasificacion')->create() : "";
    (\App\Models\Unidad::all() !== false ) ?  factory('App\Models\Unidad')->create() : "";

    return [
//id
        'codigo' => $faker->text(15),
        'descripcion' => $faker->text(80),
        'clasificacion_id'  => \App\Models\Clasificacion::inRandomOrder()->first()->id,
        'unidad_id'  => \App\Models\Unidad::inRandomOrder()->first()->id,
//1 // 9
//10 // 99
//100 // 999
//1000 // 9999
//10000 // 99999
//100000 // 999999
//1000000 // 9999999
//10000000 // 99999999
//100000000 // 999999999
//1000000000 // 9999999999
//10000000000 // 99999999999
//100000000000 // 999999999999
        'precio_venta' => $faker->numberBetween(100000000000 ,999999999999 ),
    ];
});
