<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] OrdenesTrabajos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] OrdenTrabajo
// $nombres  = $gen->tabla['ZnombresZ'] ordenes_trabajos
// $nombre   = $gen->tabla['ZnombreZ'] orden_trabajo
// GENISA Begin

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $table = 'ordenes_trabajos';
    //protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

// Create all cons var with data
    // Tipo
    const TIPO_UNO = '0'; // tipos
    // Estado
    const ESTADO_PENDIENTE = 'p'; // estados
    const ESTADO_CANCELADO = 'c'; // estados
    const ESTADO_ACEPTADO = 'a'; // estados
    const ESTADO_REALIZADO = 'r'; // estados
    const ESTADO_VERIFICADO = 'v'; // estados
    const ESTADO_FINALIZADO = 'f'; // estados
    const ESTADO_ENTREGADO = 'e'; // estados
    // Prioridad
    const PRIORIDAD_NORMAL = 'n'; // prioridades
    const PRIORIDAD_URGENTE = 'u'; // prioridades

// Create all cons FUNCTIONS
    // Funcion Tipo // tipos
    public function getTipos()
    {
        return $tipos = [
            'Cero' => OrdenTrabajo::TIPO_UNO,
        ];
    }

    // Funcion Estado // estados
    public function getEstados()
    {
        return $estados = [
            'Estado Pendiente' => OrdenTrabajo::ESTADO_PENDIENTE,
            'Estado Cancelado' => OrdenTrabajo::ESTADO_CANCELADO,
            'Estado Aceptado' => OrdenTrabajo::ESTADO_ACEPTADO,
            'Estado Realizado' => OrdenTrabajo::ESTADO_REALIZADO,
            'Estado Verificado' => OrdenTrabajo::ESTADO_VERIFICADO,
            'Estado Finalizado' => OrdenTrabajo::ESTADO_FINALIZADO,
            'Estado Entregado' => OrdenTrabajo::ESTADO_ENTREGADO,
        ];
    }

    // Funcion Prioridad // prioridades
    public function getPrioridades()
    {
        return $prioridades = [
            'Prioridad Normal' => OrdenTrabajo::PRIORIDAD_NORMAL,
            'Prioridad Urgente' => OrdenTrabajo::PRIORIDAD_URGENTE,
        ];
    }

    public function getEstadoDescAttribute()
    {
        foreach ($this->getEstados() as $clave => $valor)
            if (trim($this->estado) == trim($valor)) {
                return $clave;
            }

        return null;

    }

    public function getPrioridadDescAttribute()
    {
        foreach ($this->getPrioridades() as $clave => $valor)
            if (trim($this->prioridad) == trim($valor)) {
                return $clave;
            }

        return null;
    }

    public function getTipoDescAttribute()
    {
        foreach ($this->getTipos() as $clave => $valor)
            if (trim($this->tipo) == trim($valor)) {
                return $clave;
            }

        return null;
    }

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'taller_id');
    }

    public function recepcion()
    {
        return $this->belongsTo(Recepcion::class, 'recepcion_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    /*public function ordenes_servicios()
    {
        return $this->hasMany(OrdenServicio::class, 'ot_id');
    }*/

    public function ordenes_servicios()
    {
        return $this->belongsToMany(ProductoServicio::class, 'ordenes_servicios',
            'ot_id', 'servicio_id')
            ->withPivot('cantidad', 'descripcion', 'realizado', 'verificado', 'usuario', 'descripcion_verificacion');
    }

    /*public function ordenes_repuestos()
    {
        return $this->hasMany(OrdenRepuesto::class, 'ot_id');
    }*/

    public function ordenes_repuestos()
    {
        /*return $this->belongsToMany(ProductoServicio::class, 'ordenes_repuestos',
            'ot_id', 'producto_id')
            ->withPivot(['item', 'cantidad', 'sector_id', 'usuario', 'observacion', 'usado', 'ot_id']);*/

        return $this->belongsToMany(ProductoServicio::class, 'ordenes_repuestos',
            'ot_id', 'producto_id')
            ->withPivot(['item', 'cantidad', 'sector_id', 'usuario', 'observacion', 'usado', 'ot_id']);


        //return $this->belongsToMany(ProductoServicio::class)->using(OrdenRepuesto::class)->withPivot('sector_id');
    }

    public function entregas()
    {
        return $this->hasMany(OrdenTrabajo::class, 'orden_trabajo_id');
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'ot_id');
    }

    public function ordenes_mecanicos()
    {
        return $this->hasMany(OrdenTrabajo::class, 'orden_trabajo_id');
    }

    public function facturas()
    {
        return $this->hasMany(OrdenTrabajo::class, 'orden_trabajo_id');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    public function bitacora()
    {
        return $this->hasMany(Bitacora::class, 'ot_id');
    }
}

?>
