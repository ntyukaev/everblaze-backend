<?php

namespace App\GraphQL\Queries;

use App\Models\Column;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ColumnsQuery extends Query {
  protected $attributes = [
    'name' => 'columns'
  ];

  public function type(): Type
  {
    return Type::listOf(GraphQL::type('Column'));
  }

  public function resolve($root, $resolve)
  {
    return Column::all();
  }
}
