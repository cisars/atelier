<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OrdenServicio_bk extends Model
{
    protected $table = 'ordenes_servicios';
    protected $primaryKey = ['item', 'ot_id'];
    public $incrementing = false;

    /**
     * Set the keys for a save update query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }


    //protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

// Create all cons var with data
    // Verificado
    const VERIFICADO_SI = 's'; // verificados
    const VERIFICADO_NO = 'n'; // verificados
    // Realizado
    const REALIZADO_SI = 's'; // realizados
    const REALIZADO_NO = 'n'; // realizados

// Create all cons FUNCTIONS
    // Funcion Verificado // verificados
    public function getVerificados()
    {
        return $verificados = [
        'Verificado' => OrdenServicio::VERIFICADO_SI,
        'Verificado' => OrdenServicio::VERIFICADO_NO,
        ];
    }
    // Funcion Realizado // realizados
    public function getRealizados()
    {
        return $realizados = [
        'Realizado' => OrdenServicio::REALIZADO_SI,
        'Realizado' => OrdenServicio::REALIZADO_NO,
        ];
    }

    public function orden_trabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class, 'ot_id');
    }
    public function servicio()
    {
        return $this->belongsTo(ProductoServicio::class, 'servicio_id');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }


}

?>
