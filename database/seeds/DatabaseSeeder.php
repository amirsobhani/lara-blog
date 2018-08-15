<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 5)->create();
        factory(\App\Article::class, 20)->create();
        // $this->call(UsersTableSeeder::class);
        factory(\App\Comment::class, 10)->create();

    }
}
