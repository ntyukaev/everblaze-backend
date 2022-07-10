<?php

namespace App\GraphQL\Types;

use App\Models\Dataset;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class DatasetType extends GraphQLType {
  protected $attributes = [
      'name' => 'Dataset',
      'description' => 'Details about Dataset',
      'model' => Dataset::class
  ];

  public function fields(): array
  {
    return [
        'id' => [
            'type' => Type::nonNull(Type::int()),
            'description' => 'Id of the dataset'
        ],
        'name' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'Name of the dataset'
        ],
        'row' => [
            'type' => Type::listOf(GraphQL::type('Row')),
            'description' => 'Rows of the dataset'
        ],
        'column' => [
            'type' => Type::listOf(GraphQL::type('Column')),
            'description' => 'Columns of the dataset'
        ]
    ];
  }
}
