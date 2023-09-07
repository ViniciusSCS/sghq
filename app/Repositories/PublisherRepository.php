<?php

namespace App\Repositories;

use App\Models\Publisher;
use Ramsey\Uuid\Uuid;

class PublisherRepository
{
    public function create($data)
    {
        return Publisher::create([
            'uuid' => Uuid::uuid4()->toString(),
            'name' => $data['name']
        ]);
    }

    public function list()
    {
        return Publisher::paginate(10);
    }
}
