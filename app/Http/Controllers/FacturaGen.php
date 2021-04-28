<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class FacturaGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Facturas' ,
                'ZNOMBREZ'    => 'Factura' ,
                'ZnombresZ'   => 'facturas' ,
                'ZnombreZ'    => 'factura' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'int',       '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('sucursal_id',      'Sucursal',             'smallint',  '',   'notnull','fk','',
                            'Sucursal','sucursales','sucursal','descripcion',''),
                        $genisa->parametros('caja',             'Caja',                  'tinyint',  '',   'null','','','','','','',''),
                        $genisa->parametros('numero_factura',   'Nro Factura',           'varchar',  '15',   'notnull','','','','','','',''),
                        $genisa->parametros('cliente_id',        'Cliente',              'smallint', '',   'notnull','fk','',
                            'Cliente','clientes','cliente','razon_social',''),
                        $genisa->parametros('ot_id',            'OT',                    'int',      '',   'notnull','fk','',
                            'OrdenTrabajo','ordenes_trabajos','orden_trabajo','descripcion',''),
                        $genisa->parametros('fecha',           'Fecha',                  'timestamp', '',   'null','','','','','','',''),
                        $genisa->parametros('condicion',       'Condición',              'char',     '1',   'notnull','cons','','','tipos','','',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('cliente_id','id','clientes','CASCADE','CASCADE',
                            'cliente', 'belongsTo', 'Cliente::class', 'cliente_id','', ''),
                        $genisa->foreign('ot_id','id','ordenes_trabajos','CASCADE','CASCADE',
                            'orden_trabajo', 'belongsTo', 'OrdenTrabajo::class', 'ot_id','', ''),

                        $genisa->foreign('factura_detalle_id','id','facturas_detalles','CASCADE','CASCADE',
                            'facturas_detalles', 'hasMany', 'Factura::class', 'factura_detalle_id','', ''),

                    ],
                'constantes'  =>
                    [

                        $genisa->constantes('condicion',      'CONDICION_CREDITO',         'r' , 'condiciones',         'Condicion', 	    'Factura Credito'),
                        $genisa->constantes('condicion',      'CONDICION_CONTADO',         'n' , 'condiciones',         'Condicion', 	    'Factura Contado'),

                    ]

            ];
        $gen->dat = '001';
        $gen->tabla = $tabla;
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}
