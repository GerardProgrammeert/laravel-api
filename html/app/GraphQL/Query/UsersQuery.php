<?php

namespace App\GraphQL\Query;

use Closure;
use Domains\User\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'users',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('User'))));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string(),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'created_at' => [
                'name' => 'created',
                'type' => Type::string(),
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        if (isset($args['id'])) {
            return User::where('id' , $args['id'])->get();
        }

        if (isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }

        if (isset($args['name'])) {
            return User::where('name', $args['name'])->get();
        }

        if (isset($args['created'])) {
            return User::where('created_at', $args['created_at'])->get();
        }

        return User::all();
    }
}

