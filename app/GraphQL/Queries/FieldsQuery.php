<?php

namespace App\GraphQL\Queries;

use App\Models\Field;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class FieldsQuery extends Query {
  protected $attributes = [
    'name' => 'fields'
  ];

  public function type(): Type
  {
    return Type::listOf(GraphQL::type('Field'));
  }

  public function args(): array
  {
    return [
      'chart_id' => [
        'name' => 'chart_id',
        'type' => Type::int()
      ]
    ];
  }

  public function resolve($root, $args)
  {
    if (isset($args['chart_id'])) {
      return Field::where('chart_id', $args['chart_id'])->get();
    }
    return Field::all();
  }
}
