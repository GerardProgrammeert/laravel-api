<?php

namespace App\GraphQL\Mutations;

use Domains\User\Models\User;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Validator;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createUser',
        'description' => 'Creates a User'
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'email' => [
                'name' =>  'email',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string()),

            ]
        ];
    }

    // protected function rules(array $args = []): array
    // {
    //     return [
    //         'name' => ['required', 'string','min:5'],
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ];
    // }

    public function resolve($root, $args)
    {
        Validator::make($args, [
            'name' => ['required', 'string','min:5'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ])->validate();

        $user = new User();
        $user->fill($args);
        $user->save();

        return $user;
    }
}