<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeComic extends Model
{
    protected $table = 'types_comics';

    protected $fillable = [
        'name',
        'publisher_id'
    ];

    public function publisher()
    {
        return $this->hasOne(Publisher::class, 'id', 'publisher_id');
    }
}
