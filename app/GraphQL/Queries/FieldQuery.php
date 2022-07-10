<?php

namespace App\GraphQL\Queries;

use App\Models\Field;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class FieldQuery extends Query {
  protected $attributes = [
    'name' => 'column'
  ];

  public function type(): Type
  {
    return GraphQL::type('Field');
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
    return Field::findOrFail($args['id']);
  }
}
