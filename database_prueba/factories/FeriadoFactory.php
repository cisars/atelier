<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Feriados
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Feriado
// $nombres  = $gen->tabla['ZnombresZ'] feriados
// $nombre   = $gen->tabla['ZnombreZ'] feriado
// GENISA Begin

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Feriado;
use Faker\Generator as Faker;

$factory->define(Feriado::class, function (Faker $faker) {
// Get all data fk tables

return [
//id
    'dia' => $faker->numberBetween(0 ,255 ),
    'mes' => $faker->numberBetween(0 ,255 ),
    'descripcion' => $faker->text(40),
    'estado' => $faker->randomElement(['a','i']),
    ];
});