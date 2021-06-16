<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'user_id' => '1',
            'title' => 'タイトル',
            'category_id' => '1' ,
            'summary' => 'これは記事概要です。これは記事概要です。これは記事概要です。これは記事概要です。',
            'url' => 'http://www.yahoo.co.jp'
        ]);
        DB::table('articles')->insert([
            'user_id' => '2',
            'title' => 'タイトル',
            'category_id' => '2' ,
            'summary' => 'これは記事概要です。これは記事概要です。これは記事概要です。これは記事概要です。',
            'url' => 'http://www.yahoo.co.jp'
        ]);
        DB::table('articles')->insert([
            'user_id' => '3',
            'title' => 'タイトル',
            'category_id' => '3' ,
            'summary' => 'これは記事概要です。これは記事概要です。これは記事概要です。これは記事概要です。',
            'url' => 'http://www.yahoo.co.jp'
        ]);
        DB::table('articles')->insert([
            'user_id' => '1',
            'title' => 'タイトル',
            'category_id' => '4' ,
            'summary' => 'これは記事概要です。これは記事概要です。これは記事概要です。これは記事概要です。',
            'url' => 'http://www.yahoo.co.jp'
        ]);
        DB::table('articles')->insert([
            'user_id' => '2',
            'title' => 'タイトル',
            'category_id' => '1' ,
            'summary' => 'これは記事概要です。これは記事概要です。これは記事概要です。これは記事概要です。',
            'url' => 'http://www.yahoo.co.jp'
        ]);
        DB::table('articles')->insert([
            'user_id' => '3',
            'title' => 'タイトル',
            'category_id' => '4' ,
            'summary' => 'これは記事概要です。これは記事概要です。これは記事概要です。これは記事概要です。',
            'url' => 'http://www.yahoo.co.jp'
        ]);
        DB::table('articles')->insert([
            'user_id' => '3',
            'title' => 'タイトル',
            'category_id' => '2' ,
            'summary' => 'これは記事概要です。これは記事概要です。これは記事概要です。これは記事概要です。',
            'url' => 'http://www.yahoo.co.jp'
        ]);
        DB::table('articles')->insert([
            'user_id' => '2',
            'title' => 'タイトル',
            'category_id' => '3' ,
            'summary' => 'これは記事概要です。これは記事概要です。これは記事概要です。これは記事概要です。',
            'url' => 'http://www.yahoo.co.jp'
        ]);
    }
}
