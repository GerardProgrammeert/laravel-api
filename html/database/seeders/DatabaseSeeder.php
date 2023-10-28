<?php

namespace Database\Seeders;

use Domains\Comment\Seeders\CommentSeeder;
use Domains\Post\Seeders\PostSeeder;
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
        $this->call([
            PostSeeder::class,
            CommentSeeder::class,
        ], false, ['count' => 500]);
    }
}
