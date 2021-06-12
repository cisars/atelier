<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EntradaDetalle extends Model
{
    protected $table = 'entradas_detalles';
    protected $primaryKey = ['item', 'entrada_id'];
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

    protected $guarded = [];

    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'entrada_id');
    }
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
    public function producto_servicio()
    {
        return $this->belongsTo(ProductoServicio::class, 'producto_id');
    }
}

?>
