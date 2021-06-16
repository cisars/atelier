<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailCheck;
use App\Models\Cliente;
use App\Providers\RouteServiceProvider;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

//use App\Admin;
//use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/inicio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        /*
        $this->middleware('guest:usuario');
        $this->middleware('guest:admin');
        */
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usuario' => ['required', 'string', 'max:255', 'unique:usuarios'],
            'email' => ['required'],
            'clave' => ['required', 'string', 'min:4', 'confirmed'],
            'razon_social'  => ['required'],
            'documento'  => ['required'],
            'localidad_id'  => ['required'],
            'movil'  => ['required'],
            'fecha_nacimiento'  => ['required'],
            'personeria'  => ['required'],
            'taller_id'  => ['required'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User|Usuario|\Illuminate\Database\Eloquent\Model
     */
    protected function create(array $data)
    {
        $cliente = Cliente::create([
            'razon_social' => $data['razon_social'],
            'documento' => $data['documento'],
            'localidad_id' => $data['localidad_id'],
            'email' => $data['email'],
            'movil' => $data['movil'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'personeria' => $data['personeria'],
        ]);

        $usuario =  Usuario::create([
            'usuario' => $data['usuario'],
            'cliente_id' => $cliente->id,
            'email' => $data['email'],
            'perfil' => Usuario::USUARIO_CLIENTE,
            'estado' => Usuario::USUARIO_INACTIVO,
            'clave' => Hash::make($data['clave']),
        ]);

        $usuario->talleres()->attach($data['taller_id']);


        return $usuario;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        session()->flash('title', 'Bienvenido');
        session()->flash('msg', 'Se te ha enviado un correo de verificación');

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /*
    public function showUsuarioRegisterForm()
    {
        return view('auth.register', ['url' => 'usuario']);
    }
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }
    protected function createUsuario(Request $request)
    {
        $this->validator($request->all())->validate();
        Usuario::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/usuario');
    }
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admin');
    }
    */
}
