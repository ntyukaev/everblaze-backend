<?php

namespace App\GraphQL\Queries;

use App\Models\Column;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ColumnQuery extends Query {
  protected $attributes = [
    'name' => 'column'
  ];

  public function type(): Type
  {
    return GraphQL::type('Column');
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
    return Column::findOrFail($args['id']);
  }
}
