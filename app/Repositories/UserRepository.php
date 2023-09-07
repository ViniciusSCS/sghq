<?php

namespace App\Repositories;

use App\Models\User;
use Ramsey\Uuid\Uuid;

class UserRepository
{
    public function create($data)
    {
        return User::create([
            'uuid' => Uuid::uuid4()->toString(),
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
