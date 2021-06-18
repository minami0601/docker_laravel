<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csv extends Model
{

    public function getCsvData($article)
    {
        $data = $article->select(
                    'articles.id',
                    'u.name AS user_name',
                    'u.email AS user_email',
                    'articles.category_id',
                    'articles.summary',
                    'articles.url',
                )
            ->leftJoin('users AS u', 'articles.user_id','=','u.id')
            ->orderBy('articles.created_at', 'desc')
            ->get();

        return $data;
    }

    public function csvHeader(){
        return [
                'id',
                'ユーザー名',
                'メールアドレス',
                'カテゴリ',
                '記事概要',
                'URL',
        ];
    }
    public function csvRow($row, $array_category){
        
        return [
            $row->id,
            $row->user_name,
            $row->user_email,
            $array_category[$row->category_id],
            $row->summary,
            $row->url,
        ];
    }
}
