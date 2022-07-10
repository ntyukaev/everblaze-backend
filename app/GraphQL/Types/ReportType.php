<?php

namespace App\GraphQL\Types;

use App\Models\Report;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ReportType extends GraphQLType {
  protected $attributes = [
      'name' => 'Report',
      'description' => 'Details about Report',
      'model' => Report::class
  ];

  public function fields(): array
  {
    return [
        'id' => [
            'type' => Type::nonNull(Type::int()),
            'description' => 'Id of the report'
        ],
        'name' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'Name of the report'
        ],
        'dataset' => [
            'type' => Type::listOf(GraphQL::type('Dataset')),
            'description' => 'Datasets of the report'
        ],
        'sheet' => [
            'type' => Type::listOf(GraphQL::type('Sheet')),
            'description' => 'Sheets of the report'
        ]
    ];
  }
}
