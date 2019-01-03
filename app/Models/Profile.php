<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
        'phone',
        'address',
        'birthday',
        'user_id',
        'gender',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGenderAttributes()
    {
        if ($this->attributes['gender'] == 1) {
            return 'Nam';
        }

        if ($this->attributes['gender'] == 0) {
            return 'Nữ';
        }

        return 'Khác';
    }
}
