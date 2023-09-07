<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeComic extends Model
{
    protected $table = 'types_comics';

    protected $fillable = [
        'uuid',
        'name',
        'publisher_id'
    ];

    public function publisher()
    {
        return $this->hasOne(Publisher::class, 'uuid', 'publisher_id');
    }
}
