<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class OrdenRepuestoGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'OrdenesRepuestos' ,
                'ZNOMBREZ'    => 'OrdenRepuesto' ,
                'ZnombresZ'   => 'ordenes_repuestos' ,
                'ZnombreZ'    => 'orden_repuesto' ,
                'columnas'  =>
                    [
                        $genisa->parametros('ot_id',            'OT ID',                'int',  '',   'notnull','fk','',
                            'OrdenTrabajo','ordenes_trabajos','orden_trabajo','descripcion',''),
                        $genisa->parametros('item',               'Item',               'tinyint', '' ,  'notnull', 'pk', '','','','',''),
                        $genisa->parametros('cantidad',           'Cantidad',            'numeric',  '8,2',   'notnull','','','','','','',''),
                        $genisa->parametros('producto_id',     'Producto Id',            'smallint',  '',   'notnull','fk','',
                            'Producto','productos','producto','producto_id',''),
                        $genisa->parametros('sector_id',     'Sector Id',            'tinyint',  '',   'notnull','fk','',
                            'Sector','sectores','sector','sector_id',''),
                        $genisa->parametros('usuario',           'Usuario',              'varchar',  '12',   'notnull','fk','',
                            'Usuario','usuarios','usuario','usuario',''),
                        $genisa->parametros('fecha_registro', 'Fecha de Registro',         'date',      '',   'null','','','','','','',''),
                        $genisa->parametros('observacion',     'Observación',              'varchar',   '200',   'notnull','','','','','','',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('ot_id','id','ordenes_trabajos','CASCADE','CASCADE',
                            'orden_trabajo', 'belongsTo', 'OrdenTrabajo::class', 'ot_id','', ''),
                        $genisa->foreign('producto_id','id','existencias_manejos','CASCADE','CASCADE',
                            'producto', 'belongsToMany', 'ExistenciaManejo::class', 'ot_id','', ''),
                        $genisa->foreign('sector_id','id','existencias_manejos','CASCADE','CASCADE',
                            'sector', 'belongsToMany', 'ExistenciaManejo::class', 'ot_id','', ''),

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
