<?php

namespace Domains\User\Factories;

use Domains\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
           'name' => $name = $this->faker->name,
           'email' =>  md5($name . time()) . '@gmail.com',
           'password' => $this->faker->password,
        ];
    }
}
