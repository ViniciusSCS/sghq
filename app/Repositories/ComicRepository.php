<?php

namespace App\Repositories;

use App\Models\Comic;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ComicRepository
{
    public function create($data, $userUuid)
    {
        return Comic::create([
            'uuid' => Uuid::uuid4()->toString(),
            'name' => $data['name'],
            'publication_date' => $data['publication_date'],
            'type_comic_id' => $data['type_comic'],
            'user_id' => $userUuid
        ]);
    }

    public function list($userUuid)
    {
        return $this->query($userUuid)->paginate(10);
    }

    private function query($userUuid)
    {
        return Comic::select(
            '*',
            DB::raw("date_format(publication_date, '%d/%m/%Y') as publication_date"),
        )
            ->with('typeComic.publisher')
            ->with('user')
            ->where('user_id', $userUuid);
    }
}
