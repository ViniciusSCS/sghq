<?php

namespace App\Repositories;

use App\Models\TypeComic;
use Ramsey\Uuid\Uuid;

class TypeComicRepository
{
    public function create($data)
    {
        return TypeComic::create([
            'uuid' => Uuid::uuid4()->toString(),
            'name' => $data['name'],
            'publisher_id' => $data['publisher']
        ]);
    }

    public function list()
    {
        return $this->query()->paginate(10);
    }

    private function query()
    {
        return TypeComic::with('publisher');
    }
}
