{{'<?php'}}
{{--CONFIGURACION--}}
// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] {{ $NOMBRES  = $gen->tabla['ZNOMBRESZ']}}
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] {{ $NOMBRE   = $gen->tabla['ZNOMBREZ']}}
// $nombres  = $gen->tabla['ZnombresZ'] {{ $nombres  = $gen->tabla['ZnombresZ']}}
// $nombre   = $gen->tabla['ZnombreZ'] {{ $nombre   = $gen->tabla['ZnombreZ']}}
// GENISA Begin

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{{ $NOMBRE }};
use Faker\Generator as Faker;

$factory->define({{ $NOMBRE }}::class, function (Faker $faker) {
// Get all data fk tables
@foreach ($gen->tabla['columnas'] as $dataCol)
@if ($dataCol['cardinalidad'] == 'fk')
    (\App\Models\{{$dataCol['FK']}}::all() !== false ) ?  factory('App\Models\{{$dataCol['FK']}}')->create() : "";
@endif
@endforeach

return [
@foreach ($gen->tabla['columnas'] as $dataCol)
@if ($dataCol['cardinalidad'] == 'pk' )
//{{ $dataCol['nombre'] }}
@endif
@if ($dataCol['cardinalidad'] == 'cons' )
// {{ $auxcons = '' }} // {{ $coma = '' }}
@foreach ($gen->tabla['constantes'] as $dataCons)
@if( $dataCons['nombre'] == $dataCol['nombre'] )
// {{ $auxcons = $auxcons.$coma."'".$dataCons['valor']."'"  }} // {{ $coma = ',' }}
@endif
@endforeach
    '{{$dataCol['nombre']}}' => $faker->randomElement([{{ $auxcons  }}]),
@endif
@if($dataCol['cardinalidad'] == 'fk' )
    '{{$dataCol['nombre']}}'  => \App\Models\{{$dataCol['FK']}}::inRandomOrder()->first()->id,
@endif
@if( ($dataCol['tipo'] == 'int' || $dataCol['tipo'] == 'numeric' || $dataCol['tipo'] == 'smallint') && $dataCol['cardinalidad'] == '')
//{{ $iniaux = 1 }} // {{ $finaux = 9 }}
@for ($i = 1; $i < $dataCol['longitud']; $i++)
//{{ $iniaux = $iniaux.'0' }} // {{ $finaux = $finaux.'9' }}
@endfor
@if( ($dataCol['tipo'] == 'tinyint' ))
    '{{$dataCol['nombre']}}' => $faker->numberBetween({{ 0 }} ,{{ 255 }} ),
@endif
@if( ($dataCol['tipo'] == 'smallint' ))
    '{{$dataCol['nombre']}}' => $faker->numberBetween({{ 0 }} ,{{ 32767 }} ),
@endif
@if( ($dataCol['tipo'] == 'int' ))
    '{{$dataCol['nombre']}}' => $faker->numberBetween({{ 0 }} ,{{ 2147483647 }} ),
@endif
@if( ($dataCol['tipo'] == 'bigint' ))
    '{{$dataCol['nombre']}}' => $faker->numberBetween({{ 0 }} ,{{ 9223372036854775807 }} ),
@endif
@if( ($dataCol['tipo'] == 'numeric' ))
    '{{$dataCol['nombre']}}' => $faker->numberBetween({{ $iniaux }} ,{{ $finaux }} ),
@endif
@endif
@if ( ($dataCol['tipo'] == 'varchar' || $dataCol['tipo'] == 'text' || $dataCol['tipo'] == 'char') && $dataCol['cardinalidad'] == '')
    '{{$dataCol['nombre']}}' => $faker->text({{ $dataCol['longitud']}}),
@endif
@if ($dataCol['tipo'] == 'date'  && $dataCol['cardinalidad'] == '')
    '{{$dataCol['nombre']}}' => $faker->dateTimeBetween('-50 years', '-20 years' ),
@endif
@if (  $dataCol['tipo'] == 'timestamp' && $dataCol['cardinalidad'] == '')
    '{{$dataCol['nombre']}}' => $faker->date('Y-m-d','now'),
@endif
@endforeach
    ];
});

