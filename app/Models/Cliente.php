<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'cliente';
    //protected $fillable = [];
    protected $guarded = [];
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'cliente', 'cliente');
    }
}
