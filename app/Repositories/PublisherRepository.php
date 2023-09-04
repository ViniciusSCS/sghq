<?php

namespace App\Repositories;

use App\Models\Publisher;

class PublisherRepository
{
    public function create($data)
    {
        return Publisher::create([
            'name' => $data['name']
        ]);
    }
}
