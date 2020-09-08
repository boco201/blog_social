<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Article extends Model
{
    use softDeletes;
    use Notifiable;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    

    public function user()
    {
       return $this->belongsTo(User::class);
    }


    public function comments()
    {
       return $this->hasMany(Comment::class);
    }


    public function path()
    {
        return url("/show/{$this->id}-".Str::slug($this->title));
    }

    public static function image($fileName,$article)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/articles/', $filename);
            $article->image = $filename;
         }
    }

    public static function photo($fileName,$article)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/photos/', $filename);
            $article->photo = $filename;
         }
    }

    public static function media($fileName,$article)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/medias/', $filename);
            $article->media = $filename;
         }
    }

    public static function upload($fileName,$article)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/uploads/', $filename);
            $article->upload = $filename;
         }
    }
    //
}
