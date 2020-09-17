<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        //    'name' => ['required', 'string', 'max:255'],
         //   'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'clave' => ['required', 'string', 'min:6', 'confirmed'],
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
        return Usuario::create([
            'usuario' => $data['usuario'],
          //   'name' => $data['name'],
          //  'email' => $data['email'],
            'clave' => Hash::make($data['clave']),
        ]);
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
