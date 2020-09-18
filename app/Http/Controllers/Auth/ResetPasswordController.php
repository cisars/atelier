<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Hash;
use Illuminate\Foundation\Auth\ResetsPasswords;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    //-------------------
    protected function rules()
    {
        return [
            'token' => 'required',
            'usuario' => 'required|email',
            'clave' => 'required|confirmed|min:4',
        ];
    }
    protected function credentials(Request $request)
    {
        return $request->only(
            'usuario', 'clave', 'clave_confirmation', 'token'
        );
    }
    protected function setUserPassword($user, $password)
    {
        $user->new_password= Hash::make($password);
    }
}
