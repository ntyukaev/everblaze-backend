<?php

namespace App\GraphQL\Queries;

use App\Models\Sheet;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class SheetQuery extends Query {
  protected $attributes = [
    'name' => 'sheet'
  ];

  public function type(): Type
  {
    return GraphQL::type('Sheet');
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
    return Sheet::findOrFail($args['id']);
  }
}
