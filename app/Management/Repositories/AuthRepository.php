<?php

namespace App\Management\Repositories;

use App\User;
use App\Management\Contracts\Repository\Contract;

class AuthRepository implements Contract
{
    public function store($data)
    {
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        $user->save();

        return $user;
    }
}