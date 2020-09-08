<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\softDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'address', 'city', 'country'
      ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function comments()
    {
       return $this->hasMany(Comment::class);
    }


    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name. ' '. $this->last_name;
    }
}
