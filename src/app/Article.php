<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'title', 'category_id', 'summary','url'];

    public function serch($term, $category_id, $word)
    {
        $query = Article::query();

        if(!empty($term)) {
            $query->whereHas('user', function($q) use ($term){
                $q->where('term', $term);
            });
        }

        if(!empty($category_id)) {
            $query->where('category_id', $category_id);
        }

        if(!empty($word)) {
            $query->where('summary', 'like', '%'.self::escapeLike($word).'%');
        }

        $articles = $query->orderBy('created_at', 'desc')->paginate(5);

        return $articles;

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'DESC');
    }

    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

}
