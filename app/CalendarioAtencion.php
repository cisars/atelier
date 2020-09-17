<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarioAtencion extends Model
{
    protected $table = 'calendarios_atenciones';
    protected $primaryKey = 'calendario_atencion';
    //protected $fillable = [];
    protected $guarded = [];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario', 'usuario');
    }
}
