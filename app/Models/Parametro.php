<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Parametro extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'parametros';
    //protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

    public function descansos()
    {
        return $this->hasMany(Descanso::class, 'parametro_id');
    }

    public function horaTurno($hora)
    {
        foreach ( $this->descansos as $descanso )
        {
            if ( $hora >= $descanso->desde && $hora <=  $descanso->hasta )
            {
                return false;
            }
            return true;
        }
    }

    public function dibujarCupos($hora)
    {
        foreach ( $this->descansos as $descanso )
        {
            // $aux =  date('H:i', strtotime($aux.' + '.  $parametro->periodicidad .' minutes '));
            if ( $hora >= $descanso->desde && $hora <=  $descanso->hasta )
            {
                return false;
            }
            return true;
        }
    }
}
