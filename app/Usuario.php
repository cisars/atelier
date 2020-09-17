<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

// datos del model user original
// ** 2. https://www.siddharthshukla.in/blog/how-to-use-multiple-authentication-guards-in-laravel-6-app/
// ** 1. https://styde.net/crear-login-personalizado-en-laravel/

// fin datos del model user original

class Usuario extends Authenticatable
{
    use Notifiable;
    protected $table = 'usuarios';
    protected $primaryKey = 'usuario';
    public $incrementing = false;

    protected $fillable = [
        'usuario', 'clave'
    ];

    public function getAuthPassword()
    {
        return $this->attributes['clave'];
    }

    public function empleado()
    {
            return $this->belongsTo(Empleado::class, 'empleado', 'empleado');
    }

    public function calendarios()
    {
        return $this->hasMany(CalendarioAtencion::class, 'usuario', 'usuario');
    }
}
