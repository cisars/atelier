<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class OrdenMecanicoGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'OrdenesMecanicos' ,
                'ZNOMBREZ'    => 'OrdenMecanico' ,
                'ZnombresZ'   => 'ordenes_mecanicos' ,
                'ZnombreZ'    => 'orden_mecanico' ,
                'columnas'  =>
                    [
                        $genisa->parametros('ot_id',            'OT',                'int',  '',   'notnull','fk','',
                            'OrdenTrabajo','ordenes_trabajos','orden_trabajo','descripcion',''),
                        $genisa->parametros('empleado_id',        'Empleado',              'smallint',  '',   'notnull','fk','',
                            'Empleado','empleados','empleado','apellidos',''),
                        $genisa->parametros('observacion',       'Observación',          'varchar',  '200',   'notnull','','','','','','',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('ot_id','id','ordenes_trabajos','CASCADE','CASCADE',
                            'orden_trabajo', 'belongsTo', 'OrdenTrabajo::class', 'ot_id','', ''),
                        $genisa->foreign('empleado_id','id','empleados','CASCADE','CASCADE',
                            'empleado', 'belongsTo', 'Empleado::class', 'empleado_id','', ''),

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
