<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chap extends Model
{
    protected $fillable = [
        'name',
        'content',
        'story_id',
        'is_begin',
        'is_end',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
