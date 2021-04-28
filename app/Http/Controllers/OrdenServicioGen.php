<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class OrdenServicioGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'OrdenesServicios' ,
                'ZNOMBREZ'    => 'OrdenServicio' ,
                'ZnombresZ'   => 'ordenes_servicios' ,
                'ZnombreZ'    => 'orden_servicio' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'tinyint', '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('ot_id',            'OT',                'int',  '',   'notnull','fk','',
                            'OrdenTrabajo','ordenes_trabajos','orden_trabajo','descripcion',''),
                        $genisa->parametros('servicio_id',      'Servicio',                'smallint',  '',   'notnull','fk','',
                            'Servicio','servicios','servicio','descripcion',''),
                        $genisa->parametros('cantidad',         'Cantidad',        'numeric',  '8,2',   'notnull','','','','','','',''),
                        $genisa->parametros('descripcion',      'Descripción',          'varchar',  '200',   'notnull','','','','','','',''),
                        $genisa->parametros('realizado',        'Realizado',                 'char',     '1',   'notnull','cons','','','realizados','','',''),
                        $genisa->parametros('verificado',       'Verificado',                 'char',     '1',   'notnull','cons','','','verificados','','',''),
                        $genisa->parametros('fecha_registro',   'Fecha de Registro',      'date',      '',   'null','','','','','','',''),
                        $genisa->parametros('usuario',           'Usuario',              'varchar',  '12',   'notnull','fk','',
                            'Usuario','usuarios','usuario','usuario',''),
                        $genisa->parametros('descripcion_verificacion',       'Descripción',          'varchar',  '200',   'notnull','','','','','','',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('ot_id','id','ordenes_trabajos','CASCADE','CASCADE',
                            'ot', 'belongsTo', 'OrdenTrabajo::class', 'ot_id','', ''),
                        $genisa->foreign('servicio_id','id','productos_servicios','CASCADE','CASCADE',
                            'servicio', 'belongsTo', 'ProductoServicio::class', 'ot_id','', ''),


                    ],
                'constantes'  =>
                    [

                        $genisa->constantes('verificado',     'VERIFICADO_SI',             's' , 'verificados',         'Verificado', 	    'Si'),
                        $genisa->constantes('verificado',     'VERIFICADO_NO',    	         'n' , 'verificados',         'Verificado', 	    'No'),
                        $genisa->constantes('realizado',      'REALIZADO_SI',              's' , 'realizados',       'Realizado', 	'Si'),
                        $genisa->constantes('realizado',      'REALIZADO_NO',               'n' , 'realizados',       'Realizado', 	'No'),

                    ]

            ];
        $gen->dat = '001';
        $gen->tabla = $tabla;
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}
