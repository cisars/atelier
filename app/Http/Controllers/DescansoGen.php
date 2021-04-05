<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class DescansoGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Descansos' ,
                'ZNOMBREZ'    => 'Descanso' ,
                'ZnombresZ'   => 'descansos' ,
                'ZnombreZ'    => 'descanso' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'int',      '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('parametro_id',     'ParametroID',          'tinyint',  '' ,  'notnull','fk',
                            '','Parametro','parametros','parametro','id'),
                        $genisa->parametros('desde',            'Hora Desde',            'time',     '' ,  'notnull','','','','','',''),
                        $genisa->parametros('hasta',            'Hora Hasta',            'time',     '' ,  'notnull','','','','','',''),
                     ],
                'relaciones'  =>
                    [
                        $genisa->foreign(
                            'parametro_id',
                            'id',
                            'parametros',
                            'CASCADE',
                            'CASCADE',
                            'parametro',
                            'belongsTo',
                            'Parametro::class',
                            'parametro_id',
                            '',
                            ''),

                    ],
                'constantes'  =>
                    [


                    ]

            ];
        $gen->dat = '001';
        $gen->tabla = $tabla;
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}
