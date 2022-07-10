<?php

namespace App\GraphQL\Queries;

use App\Models\Row;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class RowsQuery extends Query {
  protected $attributes = [
    'name' => 'rows'
  ];

  public function type(): Type
  {
    return Type::listOf(GraphQL::type('Row'));
  }

  public function resolve($root, $resolve)
  {
    return Row::all();
  }
}
