<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // protected $request;
    protected $redirectTo = '/home';

    protected $username;

    // Inject the Request instance into the constructor
    public function __construct(Request $request)
    {
        $this->middleware('guest')->except('logout');
    }


    public function username()
    {
        //get input value
        $loginValue = request('user_name');
        //check if its an email or just a text
        $this->username = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        //merge values
        request()->merge([$this->username => $loginValue]);
        //return login type
        return property_exists($this, 'username') ? $this->username : 'email';
    }
}

//    
