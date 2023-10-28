<?php

namespace Domains\Comment\Factories;

use Domains\Comment\Enums\CommentableType;
use Domains\Comment\Models\Comment;
use Domains\Video\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Domains\Post\Models\Post;
use Domains\Image\Models\Image;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
       $commentableType = $this->faker->randomElement(CommentableType::cases());
        //https://arkadiuszchmura.com/posts/how-to-create-factories-for-models-with-polymorphic-relationships-in-laravel/
        //https://laracasts.com/discuss/channels/laravel/laravel-8-factory-one-to-many-polymorphic-relationship?page=1&replyId=689123
        //https://laravel.com/docs/8.x/database-testing#polymorphic-relationships
       return [
            'title' => $this->faker->title,
            'body'  => $this->faker->sentence(30),
            'commentable_type' => $commentableType,
            'commentable_id'  => match ($commentableType){
                    CommentableType::POST => Post::factory()->create(),
                    CommentableType::IMAGE => Image::factory()->create(),
                    CommentableType::VIDEO => Video::factory()->create(),
            }
       ];
    }
}