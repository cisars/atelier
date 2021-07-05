<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use OwenIt\Auditing\Auditable;

class TalleresUsuarios extends Pivot Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    protected $table = 'talleres_usuarios';
}
