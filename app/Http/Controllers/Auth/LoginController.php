<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $request;

    protected $redirectTo = '/home';

    // Inject the Request instance into the constructor
    public function __construct(Request $request)
    {
        $this->middleware('guest')->except('logout');
        $this->request = $request; // Assign the injected Request instance to the class property
    }

    protected function attemptLogin(Request $request)
    {
        $this->username(); // Set the username property before attempting login
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    public function credentials(Request $request)
    {
        $login = $request->input('user_name');

        return [
            filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name' => $login,
            'password' => $request->input('password'),
        ];
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);
    }
}