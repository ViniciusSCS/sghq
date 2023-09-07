<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'publication_date',
        'type_comic_id',
        'user_id'
    ];

    public function typeComic()
    {
        return $this->hasOne(TypeComic::class, 'uuid', 'type_comic_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'uuid', 'user_id');
    }
}
