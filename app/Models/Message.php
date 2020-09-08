<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Message extends Model
{
    use softDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

     /**
     * Get the ad that owns the message.
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
