<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '諸石',
            'email' => 'sample1@sample.com',
            'password' => Hash::make('sample1'),
            'term' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => '岩澤',
            'email' => 'sample2@sample.com',
            'password' => Hash::make('sample2'),
            'term' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => '安田',
            'email' => 'sample3@sample.com',
            'password' => Hash::make('sample3'),
            'term' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => '鈴木',
            'email' => 'sample4@sample.com',
            'password' => Hash::make('sample4'),
            'term' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => '田中',
            'email' => 'sample5@sample.com',
            'password' => Hash::make('sample5'),
            'term' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
