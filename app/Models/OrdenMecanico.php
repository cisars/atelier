<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class OrdenMecanico extends Model Implements \OwenIt\Auditing\Contracts\Auditable
{
    use Auditable;
    //
}
