<?php

namespace App\GraphQL\Types;

use App\Models\Row;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class RowType extends GraphQLType {
  protected $attributes = [
      'name' => 'Row',
      'description' => 'Details about Row',
      'model' => Row::class
  ];

  public function fields(): array
  {
    return [
        'id' => [
            'type' => Type::nonNull(Type::int()),
            'description' => 'Id of the row'
        ],
        'index' => [
            'type' => Type::nonNull(Type::int()),
            'description' => 'Name of the row'
        ],
        'cell' => [
            'type' => Type::listOf(GraphQL::type('Cell')),
            'description' => 'Cells of the row'
        ]
    ];
  }
}
