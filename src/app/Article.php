<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id', 'title', 'category_id', 'summary','url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}