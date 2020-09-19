<?php

namespace App\Management\Validations;

use App\Management\Contracts\Validation\Contract;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AuthValidation implements Contract
{
    public function validate($inputs, $isSignUp = false) 
    {
        if ($isSignUp) {
            $rules = [
            'email' => 'required|string|email|unique:users',
            'name' => 'required|string',
            'password' => 'required|string|confirmed'
            ];
        } else {
            $rules = [
            'email' => 'required|string|email',
            'remember_me' => 'boolean',
            'password' => 'required|string'
            ];
        }

        $validator = Validator::make($inputs, $rules);
        
        $response = true;

        if ($validator->fails()) {
            $response = ['errors' => $validator->errors()];
        }

        return $response;
    }
}