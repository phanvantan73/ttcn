<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttributes($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function stories()
    {
        return $this->belongsToMany(Story::class, 'user_story')->withTimestamps();
    }

    public function isAdmin()
    {
        return $this->is_admin == 1;
    }
}
