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
            'user_id' => 1,
            'title' => '【Laravel】artisanコマンドでやりたいこと、ここで見つかる',
            'category_id' => 1,
            'summary' => 'Laravelのartisanコマンドがまとめられた記事になります',
            'url' => 'https://qiita.com/shimotaroo/items/6a909797e0139517b1bd',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('articles')->insert([
            'user_id' => 2,
            'title' => '【PHP】PHP入門',
            'category_id' => 2,
            'summary' => 'PHPの入門記事になります。',
            'url' => 'https://qiita.com/ne230025/items/97b7d926264402539bfb',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('articles')->insert([
            'user_id' => 3,
            'title' => '絶対に失敗しないDockerでLaravel+Vueの実行環境（LEMP環境）を構築する方法〜前編〜',
            'category_id' => 3,
            'summary' => 'DockerでLaravel+Vueの実行環境を構築する方法が載っている記事になります',
            'url' => 'https://qiita.com/shimotaroo/items/29f7878b01ee4b99b951',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('articles')->insert([
            'user_id' => 4,
            'title' => 'よく分からなくてもなんとかなるけど、分かっていないといざというとき困るWEB基礎知識',
            'category_id' => 4,
            'summary' => 'Webの基礎がまとめられた記事になります。',
            'url' => 'https://qiita.com/amenoyoya/items/dc7a5ede945547d71a6a',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('articles')->insert([
            'user_id' => 5,
            'title' => '【Laravel6.x〜】デバッグするならdd()？いやいや、ddd()を使おう！！',
            'category_id' => 1,
            'summary' => 'デバック方法ddd()の説明記事になります',
            'url' => 'https://qiita.com/shimotaroo/items/b453b09a7d8ec3583b31',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('articles')->insert([
            'user_id' => 1,
            'title' => 'PHPでデータベースに接続するときのまとめ',
            'category_id' => 2,
            'summary' => 'PHPでデータベースに接続する方法が載っている記事になります。',
            'url' => 'https://qiita.com/mpyw/items/b00b72c5c95aac573b71',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
