<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class RecepcionesSintomas extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'recepciones_sintomas';
}
