<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class EntradaDetalleGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'EntradasDetalles' ,
                'ZNOMBREZ'    => 'EntradaDetalle' ,
                'ZnombresZ'   => 'entradas_detalles' ,
                'ZnombreZ'    => 'entrada_detalle' ,
                'columnas'  =>
                    [
                        $genisa->parametros('item',               'Item',               'tinyint', '' ,  'notnull', 'pk', '','','','',''),
                        $genisa->parametros('entrada_id',        'Entrada',             'int',  '',   'notnull','pkfk','',
                            'Entrada','entradas','entrada','id',''),
                        $genisa->parametros('sector_id',      'Sector Id',               'tinyint',  '',   'notnull','fk','',
                            'Sector','sectores','sector','sector_id',''),
                        $genisa->parametros('producto_id',     'Producto Id',            'smallint',  '',   'notnull','fk','',
                            'ProductoServicio','productos_servicios','producto_servicio','producto_id',''),
                        $genisa->parametros('cantidad',        'Cantidad',              'numeric',  '8,2',   'notnull','','','','','','',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('entrada_id','id','entradas','CASCADE','CASCADE',
                            'entrada', 'belongsTo', 'Entrada::class', 'entrada_id','', ''),
                        $genisa->foreign('sector_id','id','sectores','CASCADE','CASCADE',
                            'sector', 'belongsTo', 'Sector::class', 'sector_id','', ''),
                        $genisa->foreign('producto_id','id','productos_servicios','CASCADE','CASCADE',
                            'producto_servicio', 'belongsTo', 'ProductoServicio::class', 'producto_id','', ''),
//                        $genisa->foreign('sector_id','id','existencias_manejos','CASCADE','CASCADE',
//                            'sector', 'belongsToMany', 'ExistenciaManejo::class', 'ot_id','', ''),
//                        $genisa->foreign('producto_id','id','existencias_manejos','CASCADE','CASCADE',
//                            'producto', 'belongsToMany', 'ExistenciaManejo::class', 'ot_id','', ''),

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
