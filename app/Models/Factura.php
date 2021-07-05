<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Factura extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    //
}
