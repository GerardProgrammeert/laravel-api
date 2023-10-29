<?php

namespace Domains\Post\Seeders;

use Domains\Category\Models\Category;
use Domains\Comment\Enums\CommentableType;
use Domains\Comment\Models\Comment;
use Domains\Post\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run($count = 1): void
    {
        /** @var Collection<int, Post> $posts */
        Post::factory()
            ->has(Comment::factory(['commentable_type'=> CommentableType::POST]), 'comments')
            ->has(Category::factory()->count(3), 'categories')
            ->count($count)
            ->create();


        //create generate the model and store in database
        //make only generate the model
    }
}
