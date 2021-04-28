<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class EntradaGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Entradas' ,
                'ZNOMBREZ'    => 'Entrada' ,
                'ZnombresZ'   => 'entradas' ,
                'ZnombreZ'    => 'entrada' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'int', '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('taller_id',        'Taller',               'tinyint',  '',   'notnull','fk','',
                            'Taller','talleres','taller','descripcion',''),
                        $genisa->parametros('ot_id',            'OT',                   'int',  '',   'notnull','fk','',
                            'OrdenTrabajo','ordenes_trabajos','orden_trabajo','descripcion',''),
                        $genisa->parametros('numero_documento', 'Nro Documento',        'varchar',  '12',   'notnull','','','','','','',''),
                        $genisa->parametros('fecha',            'Fecha',                'date',      '',   'null','','','','','','',''),
                        $genisa->parametros('empleado_id',        'Empleado',           'smallint',  '',   'notnull','fk','',
                            'Empleado','empleados','empleado','apellidos',''),
                        $genisa->parametros('usuario',           'Usuario',              'varchar',  '12',   'notnull','fk','',
                            'Usuario','usuarios','usuario','usuario',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('taller_id','id','talleres','CASCADE','CASCADE',
                            'taller', 'belongsTo', 'Taller::class', 'taller_id','', ''),
                        $genisa->foreign('ot_id','id','ordenes_trabajos','CASCADE','CASCADE',
                            'orden_trabajo', 'belongsTo', 'OrdenTrabajo::class', 'ot_id','', ''),

                        $genisa->foreign('entrada_detalle_id','id','entradas_detalles','CASCADE','CASCADE',
                            'entradas_detalles', 'hasMany', 'EntradaDetalle::class', 'entrada_detalle_id','', ''),

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
