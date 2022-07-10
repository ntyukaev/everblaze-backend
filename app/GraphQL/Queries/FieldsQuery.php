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

  public function resolve($root, $resolve)
  {
    return Field::all();
  }
}
