<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class ParametroGen extends Controller
{
    public function index(){
        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Parametros' ,
                'ZNOMBREZ'    => 'Parametro' ,
                'ZnombresZ'   => 'parametros' ,
                'ZnombreZ'    => 'parametro' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'tinyint',      '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('descripcion',      'Descripción',          'text',     '' ,  'null','','','','','',''),
                        $genisa->parametros('cantidad_prioridad_alta', 'Total Prioridades Altas',  'tinyint',  '' ,  'null','','','','','',''),
                        $genisa->parametros('jefe_mecanicos',   'Jefe Mecanicos Def',   'smallint', '' ,  'null','','','','','',''),
                        $genisa->parametros('periodicidad',     'Periodicidad Min.',    'tinyint',  '' ,   'notnull','','','','','',''),
                        $genisa->parametros('sectores',         'Cantidad de Sectores',    'tinyint',  '' ,   'notnull','','','','','',''),
                        $genisa->parametros('hora_apertura',    'Hora de Apertura',         'time', '',    'notnull','','','','','',''),
                        $genisa->parametros('hora_cierre',      'Hora de Cierre',           'time', '',    'notnull','','','','','',''),
                        $genisa->parametros('hora_apertura_sab','Hora de Apertura Sabado',  'time', '',    'null','','','','','',''),
                        $genisa->parametros('hora_cierre_sab',  'Hora de Cierre Sabado',    'time', '',    'null','','','','','',''),
                        $genisa->parametros('activo'   ,        'Activo',              'boolean',   '',   'notnull','','','','','',''),
                        ],
                'relaciones'  =>
                    [

                        $genisa->foreign('parametro_id','id','descansos','CASCADE','CASCADE',
                            'descansos', 'hasMany', 'Descanso::class', 'id','', ''),
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
