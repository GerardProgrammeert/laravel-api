<?php

use App\GraphQL\Mutations\CreateUserMutation;
use App\GraphQL\Query\UsersQuery;
use App\GraphQL\Type\UserType;
use Rebing\GraphQL\GraphQLController;
use Rebing\GraphQL\GraphQL;

return [
    'prefix' => 'graphql',
    'routes' => 'query/{graphql_schema?}',
    'controllers' => GraphQLController::class . '@query',
    'middleware' => [],
    'default_schema' => 'default',
    // register query
    'schemas' => [
        'default' => [
            'query' => [
                UsersQuery::class,
            ],
            'mutation' => [
                CreateUserMutation::class,
            ],
            'middleware' => []
        ],
    ],
    // register types
    'types' => [ UserType::class, ],
    'error_formatter' => ['\Rebing\GraphQL\GraphQL', 'formatError'],
    'errors_handler' => ['\Rebing\GraphQL\GraphQL', 'handleErrors'],
    'params_key'    => 'params'
];
