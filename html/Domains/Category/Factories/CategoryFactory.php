<?php

namespace Domains\Category\Factories;

use Domains\Category\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition(): array
    {
        return [
           'title'          => $this->faker->sentence,
           'description'    => $this->faker->sentence(10),
        ];
    }
}
