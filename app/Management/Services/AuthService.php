<?php

namespace App\Management\Services;

use Illuminate\Support\Facades\Auth;
use App\Management\Validations\AuthValidation;
use App\Management\Repositories\AuthRepository;
use App\Management\Contracts\Service\Contract;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthService implements Contract
{
    private $repository;

    private $validator;

    public function __construct()
    {
        $this->repository = new AuthRepository;

        $this->validator = new AuthValidation;
    }

    public function signUp($request)
    {
        $response = $this->validator->validate($request, true);

        if ($response === true) {
            $user = $this->repository->store($request);

            $response = ['data' => $user, 'message' => 'Successfully Created User.'];
        }

        return $response;
    }

    public function authenticate($request) 
    {
        $response = $this->validator->validate($request->all());

        if ($response === true) {
            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                $response = ['message' => 'Invalid Credentials.'];
            } else {
                $user = $request->user();
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;

                if ($request->remember_me) {
                    $token->expires_at = Carbon::now()->addWeeks(1);
                } 

                $token->save();

                $response = ['data' => [
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer', 
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
                ], 'message' => 'User Authenticated.'];
            }
        }

        return $response;
    }

    public function logout($request)
    {
        $request->user()->token()->revoke();

        return [ 'data' => [],'message' => 'Successfully Logged Out.'];
    }

    public function user($request)
    {
        return [ 'data' => $request->user(),'message' => 'User Found.'];
    }
}