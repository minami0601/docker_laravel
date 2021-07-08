<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'title', 'category_id', 'summary','url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'DESC');
    }
}
