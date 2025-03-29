<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

     protected function login(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
            if ( ! (auth()->user()->is_active) ) {
                
                Auth::logout();
                echo "<h2>Votre compte a été désactivé.Contacter votre administrateur</h2>";
                die;

            }
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'user_name' => 'Les identifiants fournis ne correspondent pas à nos records.',
        ]);
    }

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
