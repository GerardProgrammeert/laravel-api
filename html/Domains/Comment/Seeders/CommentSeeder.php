<?php

namespace Domains\Comment\Seeders;

use Domains\Comment\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run($count = 1): void
    {
        Comment::factory()->count($count)->create();
    }
}
