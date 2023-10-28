<?php

namespace Domains\Image\Factories;

use Domains\Image\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition(): array
    {   //https://5balloons.info/faker-images-in-laravel/
        return [
            'file_name' => $this->faker->image('public/storage/images',640,480, null, false),
            'title' => $this->faker->title,
            'description' => $this->faker->sentence,
        ];
    }
}