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

//    protected $fillable = [
//        'usuario',
//        'clave',
//        'clave',
//        'clave',
//        'clave',
//        'clave',
//        'clave',
//    ];
    protected $guarded = [];
    protected $hidden = [
        'clave', 'remember_token',
    ];
    protected $casts = [
        'usuario_verified_at' => 'datetime',
    ];

    //Estado
    const USUARIO_ACTIVO = 'A';
    const USUARIO_INACTIVO = 'I';
    //Tipo
    const USUARIO_T_CLIENTE        = 'C';
    const USUARIO_T_EMPLEADO        = 'E';
    //Perfil
    const USUARIO_ADMIN         = 'A';
    const USUARIO_FUNCIONARIO   = 'F';
    const USUARIO_CLIENTE       = 'C';
    const USUARIO_BOOTSTRAP     = 'B';
    const USUARIO_RECEPCIONISTA = 'R';

    public function getPerfiles()
    {
        return  [
            'Administrador' => Usuario::USUARIO_ADMIN,
            'Funcionario'   => Usuario::USUARIO_FUNCIONARIO,
            'Cliente'       => Usuario::USUARIO_CLIENTE,
            'Bootstrap'     => Usuario::USUARIO_BOOTSTRAP,
            'Recepcionista' => Usuario::USUARIO_RECEPCIONISTA,
        ];
    }
    public function getTipos()
    {
        return  [
            'Cliente' => Usuario::USUARIO_T_CLIENTE,
            'Empleado'   => Usuario::USUARIO_T_EMPLEADO,
        ];
    }
    public function getEstados()
    {
        return  [
            'Activo' => Usuario::USUARIO_ACTIVO,
            'Inactivo' => Usuario::USUARIO_INACTIVO,
        ];
    }

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

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'usuario', 'usuario');
    }

//    public function usuarios_talleres()
//    {
//        return $this->hasMany(UsuarioTaller::class, 'usuario', 'usuario');
//    }

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
        if(trim(Auth::user()->perfil) == 'A' )
            return true;
        else
            return false;


    }
}

