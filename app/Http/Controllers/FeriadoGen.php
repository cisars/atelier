<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Facades\Storage;

class FeriadoGen extends Controller
{

    public function index()
    {
       // Storage::disk('local')->put('micodigonuevo.txt', 'test');
        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Feriados' ,
                'ZNOMBREZ'    => 'Feriado' ,
                'ZnombresZ'   => 'feriados' ,
                'ZnombreZ'    => 'feriado' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'smallint', '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('dia',              'Día',                  'tinyint',     '',   'null','','','','','','',''),
                        $genisa->parametros('mes',              'Mes',                  'tinyint',     '',   'null','','','','','','',''),
                        $genisa->parametros('descripcion',       'Descripción',          'varchar',  '40',   'notnull','','','','','','',''),
                        $genisa->parametros('estado',            'Estado',               'char',     '1',   'notnull','cons','','','estados','','',''),

                    ],
                'relaciones'  =>
                    [

                    ],
                'constantes'  =>
                    [
                        $genisa->constantes('estado',         'ESTADO_ACTIVO',          'a' ,  'estados',       'Estado Activo', 	'Estado Activo'),
                        $genisa->constantes('estado',         'ESTADO_INACTIVO',         'i' , 'estados',       'Estado Inactivo', 	'Estado Inactivo'),

                    ]

            ];
        $gen->dat = '001';
        $gen->tabla = $tabla;
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}
