<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class EntregaGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Entregas' ,
                'ZNOMBREZ'    => 'Entrega' ,
                'ZnombresZ'   => 'entregas' ,
                'ZnombreZ'    => 'entrega' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'int', '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('taller_id',        'Taller',              'tinyint',  '',   'notnull','fk','',
                            'Taller','talleres','taller','descripcion',''),
                        $genisa->parametros('ot_id',            'OT',                   'int',  '',   'notnull','fk','',
                            'OrdenTrabajo','ordenes_trabajos','orden_trabajo','descripcion',''),
                        $genisa->parametros('cliente_id',        'Cliente',              'smallint', '',   'notnull','fk','',
                            'Cliente','clientes','cliente','razon_social',''),
                        $genisa->parametros('vehiculo_id',        'Vehículo',              'smallint',  '',   'notnull','fk','',
                            'Vehiculo','vehiculos','vehiculo','id',''),
                        $genisa->parametros('empleado_id',        'Empleado',              'smallint',  '',   'notnull','fk','',
                            'Empleado','empleados','empleado','apellidos',''),
                        $genisa->parametros('fecha',            'Fecha',                   'timestamp',      '',   'null','','','','','','',''),
                        $genisa->parametros('observacion',       'Observación',          'varchar',  '200',   'notnull','','','','','','',''),
                        $genisa->parametros('usuario',           'Usuario',              'varchar',  '12',   'notnull','fk','',
                            'Usuario','usuarios','usuario','usuario',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('taller_id','id','talleres','CASCADE','CASCADE',
                            'taller', 'belongsTo', 'Taller::class', 'taller_id','', ''),
                        $genisa->foreign('ot_id','id','ordenes_trabajos','CASCADE','CASCADE',
                            'orden_trabajo', 'belongsTo', 'OrdenTrabajo::class', 'ot_id','', ''),
                        $genisa->foreign('cliente_id','id','clientes','CASCADE','CASCADE',
                            'cliente', 'belongsTo', 'Cliente::class', 'cliente_id','', ''),
                        $genisa->foreign('vehiculo_id','id','vehiculos','CASCADE','CASCADE',
                            'vehiculo', 'belongsTo', 'Vehiculo::class', 'vehiculo_id','', ''),
                        $genisa->foreign('empleado_id','id','empleados','CASCADE','CASCADE',
                            'empleado', 'belongsTo', 'Empleado::class', 'empleado_id','', ''),
                        $genisa->foreign('usuario','usuario','usuarios','CASCADE','CASCADE',
                            'usuario', 'belongsTo', 'Usuario::class', 'usuario','', ''),

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
