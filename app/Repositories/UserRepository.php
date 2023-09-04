<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => strtolower($data['email']),
            'password' => bcrypt($data['password']),
        ]);
    }

    public function me($id)
    {
        return User::find($id);
    }
}
