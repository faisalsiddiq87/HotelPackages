<?php

namespace App\Management\Services\Admin;

use App\Management\Contracts\Service\Contract;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class RegisterService implements Contract
{
    /**
     * Authenticate a user and redirect
     * 
     * @return mixed
     */
    public function doLogin($request) 
    {
        $inputs = $request->only('email', 'password');
        $rules = [
			'email'    => 'required|email', 
			'password' => 'required|min:3'
        ];
        
        $validator = Validator::make($inputs, $rules);
        
        if ($validator->fails()) {
            \Session::flash('login_error', $validator->messages()->toArray());
			return back();     
		} else {
            if (\Auth::guard('web')->attempt($inputs, $request->get('remember_token'))) {
                $user = \Auth::guard('web')->getLastAttempted();
				if ($user->email_verified_at) {
                    return \Redirect::to('dashboard');
				} else {
                    \Auth::guard('web')::logout(); 
                    \Session::flash('login_error', ['msg' => 'Your email is not verified.']);  
                    return back();
				}
			} else {      
                \Session::flash('login_error', ['msg' => 'Email or Password is incorrect, please try again!']);  
                return back();			
            }
        }
    }

    public function logout($request)
	{   
		\Auth::guard('web')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
    	return \Redirect::to('/');
	}
}