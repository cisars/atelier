<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Descansos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Descanso
// $nombres  = $gen->tabla['ZnombresZ'] descansos
// $nombre   = $gen->tabla['ZnombreZ'] descanso
// GENISA Begin

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Descanso extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'descansos';
    //protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

// Create all cons var with data

// Create all cons FUNCTIONS

    public function parametro()
    {
        return $this->belongsTo(Parametro::class, 'parametro_id');
    }

}
