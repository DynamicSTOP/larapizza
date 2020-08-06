<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\HomeController;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends HomeController
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
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login', ['form' => 'login', 'hideCart' => 'true']);
    }

    public function username()
    {
        return 'phone';
    }

    public function redirectTo()
    {
        if (!empty(request()->input('checkout'))) {
            return route('checkout');
        }
        return route('index');
    }

}
