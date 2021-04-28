<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class EmpleadoMaquinaGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'EmpleadosMaquinas' ,
                'ZNOMBREZ'    => 'EmpleadoMaquina' ,
                'ZnombresZ'   => 'empleados_maquinas' ,
                'ZnombreZ'    => 'empleado_maquina' ,
                'columnas'  =>
                    [
                        $genisa->parametros('empleado_id',        'Empleado',              'smallint',  '',   'notnull','fk','',
                            'Empleado','empleados','empleado','apellidos',''),
                        $genisa->parametros('maquinaria_id',      'Maquinaria',            'tinyint',  '',   'notnull','fk','',
                            'Maquinaria','maquinarias','maquinaria','descripcion',''),
                        $genisa->parametros('observacion',       'Observación',          'varchar',  '200',   'notnull','','','','','','',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('empleado_id','id','empleados','CASCADE','CASCADE',
                            'empleado', 'belongsTo', 'Empleado::class', 'empleado_id','', ''),
                        $genisa->foreign('maquinaria_id','id','maquinarias','CASCADE','CASCADE',
                            'maquinaria', 'belongsTo', 'Maquinaria::class', 'maquinaria_id','', ''),


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
