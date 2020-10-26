<?php

namespace App\Models;


//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//use Illuminate\Database\Eloquent\Model;

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
    protected $hidden = [
        'clave', 'remember_token',
    ];
    protected $casts = [
        'usuario_verified_at' => 'datetime',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado', 'empleado');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente', 'cliente');
    }

    public function calendarios()
    {
        return $this->hasMany(CalendarioAtencion::class, 'usuario', 'usuario');
    }

    //-------------------
    public function getAuthPassword()
    {
        //return $this->attributes['clave'];
        return $this->clave;
    }

    public function adminlte_image(){
        //return  Auth::user()->image ;
        return "https://ui-avatars.com/api/?name=".Auth::user()->usuario ;
      //  return "https://i.pravatar.cc/40?u="..Auth::user()->usuario ;
    }

    public function isAdmin(){
        if(Auth::user()->tipo == 1 )
            return true;
        else
            return false;


    }
}

