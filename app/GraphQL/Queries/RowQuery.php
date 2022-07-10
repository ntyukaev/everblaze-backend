<?php

namespace App\GraphQL\Queries;

use App\Models\Row;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class RowQuery extends Query {
  protected $attributes = [
    'name' => 'row'
  ];

  public function type(): Type
  {
    return GraphQL::type('Row');
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
    return Row::findOrFail($args['id']);
  }
}
