<?php

namespace Domains\Video\Factories;

use Domains\Video\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition(): array
    {
        return [
            'url' => $this->faker->url,
            'title' => $this->faker->title,
            'description' => $this->faker->sentence,
        ];
    }
}