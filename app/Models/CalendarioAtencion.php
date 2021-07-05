<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;


class CalendarioAtencion extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'calendarios_atenciones';
    protected $primaryKey = 'calendario_atencion';
    //protected $fillable = [];
    protected $guarded = [];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario' );
    }
}
