<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class OrdenTrabajoGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'OrdenesTrabajos' ,
                'ZNOMBREZ'    => 'OrdenTrabajo' ,
                'ZnombresZ'   => 'ordenes_trabajos' ,
                'ZnombreZ'    => 'orden_trabajo' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'int', '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('taller_id',        'Taller',              'tinyint',  '',   'notnull','fk','',
                            'Taller','talleres','taller','descripcion',''),
                        $genisa->parametros('fecha_recepcion', 'Fecha de Recepcion',      'date',      '',   'null','','','','','','',''),
                        $genisa->parametros('fecha_fin',       'Fecha de Finalización',   'date',      '',   'null','','','','','','',''),
                        $genisa->parametros('recepcion_id',     'Recepción',              'int',  '',   'notnull','fk','',
                            'Recepcion','recepciones','recepcion','id',''),
                        $genisa->parametros('cliente_id',        'Cliente',              'smallint',  '',   'notnull','fk','',
                            'Cliente','clientes','cliente','razon_social',''),
                        $genisa->parametros('vehiculo_id',        'Vehículo',              'smallint',  '',   'notnull','fk','',
                            'Vehiculo','vehiculos','vehiculo','id',''),
                        $genisa->parametros('empleado_id',        'Empleado',              'smallint',  '',   'notnull','fk','',
                            'Empleado','empleados','empleado','apellidos',''),
                        $genisa->parametros('grupo_id',        'Grupo de Trabajo',    'tinyint',  '',   'notnull','fk','',
                            'Grupo','grupos','grupo','apellidos',''),
                        $genisa->parametros('tipo',              'Tipo',                 'char',     '1',   'notnull','cons','','','tipos','','',''),
                        $genisa->parametros('prioridad',         'Prioridad',            'char',     '1',   'notnull','cons','','','prioridades','','',''),
                        $genisa->parametros('estado',            'Estado',               'char',     '1',   'notnull','cons','','','estados','','',''),
                        $genisa->parametros('descripcion',       'Descripción',          'varchar',  '200',   'notnull','','','','','','',''),
                        $genisa->parametros('importe_total',     'Importe Total',        'numeric',  '12,0',   'notnull','','','','','','',''),
                        $genisa->parametros('usuario',           'Usuario',              'varchar',  '12',   'notnull','fk','',
                            'Usuario','usuarios','usuario','usuario',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('taller_id','id','talleres','CASCADE','CASCADE',
                            'taller', 'belongsTo', 'Taller::class', 'taller_id','', ''),
                        $genisa->foreign('recepcion_id','id','recepciones','CASCADE','CASCADE',
                            'recepcion', 'belongsTo', 'Recepcion::class', 'recepcion_id','', ''),
                        $genisa->foreign('cliente_id','id','clientes','CASCADE','CASCADE',
                            'cliente', 'belongsTo', 'Cliente::class', 'cliente_id','', ''),
                        $genisa->foreign('vehiculo_id','id','vehiculos','CASCADE','CASCADE',
                            'vehiculo', 'belongsTo', 'Vehiculo::class', 'vehiculo_id','', ''),
                        $genisa->foreign('empleado_id','id','empleados','CASCADE','CASCADE',
                            'empleado', 'belongsTo', 'Empleado::class', 'empleado_id','', ''),
                        $genisa->foreign('grupo_id','id','grupos','CASCADE','CASCADE',
                            'grupo_trabajo', 'belongsTo', 'Grupo::class', 'grupo_id','', ''),
                        $genisa->foreign('usuario','usuario','usuarios','CASCADE','CASCADE',
                            'usuario', 'belongsTo', 'Usuario::class', 'usuario','', ''),


                        $genisa->foreign('orden_servicio_id','id','ordenes_servicios','CASCADE','CASCADE',
                            'ordenes_servicios', 'hasMany', 'OrdenTrabajo::class', 'orden_servicio_id','', ''),
                        $genisa->foreign('orden_repuesto_id','id','ordenes_repuestos','CASCADE','CASCADE',
                            'ordenes_repuestos', 'hasMany', 'OrdenTrabajo::class', 'orden_repuesto_id','', ''),
                        $genisa->foreign('entrega_id','id','entregas','CASCADE','CASCADE',
                            'entregas', 'hasMany', 'OrdenTrabajo::class', 'entrega_id','', ''),
                        $genisa->foreign('entrada_id','id','entradas','CASCADE','CASCADE',
                            'entradas', 'hasMany', 'OrdenTrabajo::class', 'entrada_id','', ''),
                        $genisa->foreign('orden_mecanico_id','id','ordenes_mecanicos','CASCADE','CASCADE',
                            'ordenes_mecanicos', 'hasMany', 'OrdenTrabajo::class', 'orden_mecanico_id','', ''),
                        $genisa->foreign('factura_id','id','facturas','CASCADE','CASCADE',
                            'facturas', 'hasMany', 'OrdenTrabajo::class', 'factura_id','', ''),


                    ],
                'constantes'  =>
                    [

                        $genisa->constantes('tipo',         'TIPO_UNO',    	            '0' , 'tipos',         'Cero', 	    'cero'),
                        $genisa->constantes('estado',         'ESTADO_PENDIENTE',          'p' , 'estados',       'Estado Pendiente', 	'Estado Pendiente'),
                        $genisa->constantes('estado',         'ESTADO_CANCELADO',          'c' , 'estados',       'Estado Cancelado', 	'Estado Cancelado'),
                        $genisa->constantes('estado',         'ESTADO_ACEPTADO',           'a' , 'estados',       'Estado Aceptado', 	'Estado Aceptado'),
                        $genisa->constantes('prioridad',      'PRIORIDAD_NORMAL',          'n' , 'prioridades',   'Prioridad Normal', 'Prioridad Normal'),
                        $genisa->constantes('prioridad',      'PRIORIDAD_URGENTE',         'n' , 'prioridades',   'Prioridad Urgente', 'Prioridad Urgente'),

                    ]

            ];
        $gen->dat = '001';
        $gen->tabla = $tabla;
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}
