<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class FacturaDetalle extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    //
}
