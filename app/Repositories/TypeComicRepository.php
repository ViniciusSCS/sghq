<?php

namespace App\Repositories;

use App\Models\TypeComic;

class TypeComicRepository
{
    public function create($data)
    {
        return TypeComic::create([
            'name' => $data['name'],
            'publisher_id' => $data['publisher']
        ]);
    }

    public function list()
    {
        return $this->query()->get();
    }

    private function query()
    {
        return TypeComic::with('publisher');
    }
}
