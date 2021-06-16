<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'usuario';
    }


    //-------------------
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'clave' => 'required|string',
        ]);
    }
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'clave');

    }
    protected function attemptLogin(Request $request)
    {
        $crendentials = [
            'usuario' => $request->usuario,
            'password' => $request->clave,
        ];
        $this->guard()->attempt($crendentials);
        // dd($crendentials);
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
        Auth::guard()
            ->attempt(['usuario' => $request->usuario, 'password' => $request->clave], true);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/inicio');
    }
}
