<?php

namespace App\GraphQL\Queries;

use App\Models\Cell;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class CellQuery extends Query {
  protected $attributes = [
    'name' => 'cell'
  ];

  public function type(): Type
  {
    return GraphQL::type('Cell');
  }

  public function args(): array
  {
    return [
      'id' => [
        'name' => 'id',
        'type' => Type::int(),
        'rules' => ['required']
      ]
    ];
  }

  public function resolve($root, $args)
  {
    return Cell::findOrFail($args['id']);
  }
}
