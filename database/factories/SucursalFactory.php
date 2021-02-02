<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Localidad;
use App\Models\Sucursal;
use Faker\Generator as Faker;

$factory->define(Sucursal::class, function (Faker $faker) {

    (Localidad::all() !== false ) ?  factory('App\Models\Localidad')->create() : "";
    return [
        'descripcion' => substr($faker->company, 0,39) ,
        'direccion' =>  substr($faker->address, 0,39) ,
        'localidad_id'  => Localidad::inRandomOrder()->first()->id,
        'telefono' => '+59521'. $faker->numberBetween(333333,999999),
        'email' => $faker->email
    ];
});
// 'localidad' => factory(App\Models\Localidad::class),
