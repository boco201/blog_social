<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Comment extends Model
{
    use softDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function article()
    {
    	return $this->belongsTo(Article::class);
    }

    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
