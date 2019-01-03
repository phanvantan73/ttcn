<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'num_of_chaps',
        'category_id',
        'carousel',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_story')
            ->withPivot('reading_chap', 'last_reading');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function chaps()
    {
        return $this->hasMany(Chap::class);
    }

    public function getFirstChap()
    {
        return $this->chaps()->where('is_begin', 1)->first();
    }

    public function getIdNextChap($chap)
    {
        $nextChap = $this->chaps()
            ->where('created_at', '>', $chap->created_at)
            ->oldest()
            ->first();

        if ($nextChap) {
            return $nextChap->id;
        } else {
            return 0;
        }
    }

    public function getIdPreChap($chap)
    {
        $preChap = $this->chaps()
            ->where('created_at', '<', $chap->created_at)
            ->latest()
            ->first();

        if ($preChap) {
            return $preChap->id;
        } else {
            return 0;
        }
    }
}
