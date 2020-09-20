<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Management\Services\Admin\RegisterService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function __construct(Guard $auth, RegisterService $service)
	{
        $this->auth = $auth;
        $this->service = $service;
        $this->middleware('guest:web')->except('logout');
    }
    
    public function login() 
	{
		return view('login.index');
    }
    
    public function doLogin(Request $request) 
    {
        return $this->service->doLogin($request);
    }

    public function logout(Request $request)
	{   
        return $this->service->logout($request);
	}
}
