<?php

namespace App\GraphQL\Types;

use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType {
  protected $attributes = [
      'name' => 'User',
      'description' => 'Details about User',
      'model' => User::class
  ];

  public function fields(): array
  {
    return [
        'id' => [
            'type' => Type::nonNull(Type::int()),
            'description' => 'Id of the user'
        ],
        'name' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'Name of the user'
        ],
        'report' => [
            'type' => Type::listOf(GraphQL::type('Report')),
            'description' => 'Reports of the user'
        ],
        'email' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'Email of the user'
        ],
        'password' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'Password of the user'
        ]
    ];
  }
}