<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Laravel'
        ]);
        DB::table('categories')->insert([
            'name' => 'PHP'
        ]);
        DB::table('categories')->insert([
            'name' => 'Docker'
        ]);
        DB::table('categories')->insert([
            'name' => 'Web基礎'
        ]);
    }
}
