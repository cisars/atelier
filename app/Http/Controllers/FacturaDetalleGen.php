<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class FacturaDetalleGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'FacturasDetalles' ,
                'ZNOMBREZ'    => 'FacturaDetalle' ,
                'ZnombresZ'   => 'facturas_detalles' ,
                'ZnombreZ'    => 'factura_detalle' ,
                'columnas'  =>
                    [
                        $genisa->parametros('item',             'Item',               'tinyint', '' ,  'notnull', 'pk', '','','','',''),
                        $genisa->parametros('factura_detalle_id',        'Factura Detalle',              'int',  '',   'notnull','fk','',
                            'FacturaDetalle','facturas_detalles','factura_detalle','item',''),
                        $genisa->parametros('producto_id',      'Producto Id',            'smallint',  '',   'notnull','fk','',
                            'Producto','productos','producto','producto_id',''),
                        $genisa->parametros('cantidad',         'Cantidad',        'numeric',  '8,2',   'notnull','','','','','','',''),
                        $genisa->parametros('precio_unitario',  'Precio Unitario',        'numeric',  '12,0',   'notnull','','','','','','',''),
                        $genisa->parametros('sub_total',        'Sub Total',        'numeric',  '12,0',   'notnull','','','','','','',''),
                        $genisa->parametros('impuesto',         'Impuesto',          'tinyint',  '',   'notnull','','','','','','',''),
                        $genisa->parametros('monto_impuesto',   'Monto Impuesto',        'numeric',  '12,0',   'notnull','','','','','','',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('factura_detalle_id','id','facturas','CASCADE','CASCADE',
                            'factura', 'belongsTo', 'Factura::class', 'factura_detalle_id','', ''),
                        $genisa->foreign('producto_id','id','existencias_manejos','CASCADE','CASCADE',
                            'producto', 'belongsToMany', 'ExistenciaManejo::class', 'ot_id','', ''),

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
