<?php

namespace Domains\Post\Factories;

use Domains\Post\Models\Post;
use Domains\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'body'  => $this->faker->sentence(30),
            'created_by' => User::factory(),
        ];
    }
}
