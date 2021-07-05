<?php


// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Feriados
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Feriado
// $nombres  = $gen->tabla['ZnombresZ'] feriados
// $nombre   = $gen->tabla['ZnombreZ'] feriado
// GENISA Begin

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Feriado extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'feriados';
    //protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

// Create all cons var with data
    // Estado
    const ESTADO_ACTIVO = 'a'; // estados
    const ESTADO_INACTIVO = 'i'; // estados

// Create all cons FUNCTIONS
    // Funcion Estado // estados
    public function getEstados()
    {
        return $estados = [
        'Estado Activo' => Feriado::ESTADO_ACTIVO,
        'Estado Inactivo' => Feriado::ESTADO_INACTIVO,
        ];
    }



}

?>
