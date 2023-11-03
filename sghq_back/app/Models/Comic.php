<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'publication_date',
        'type_comic_id',
        'user_id',
        'deleted_at'
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
