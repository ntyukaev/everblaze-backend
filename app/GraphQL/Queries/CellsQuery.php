<?php

namespace App\GraphQL\Queries;

use App\Models\Cell;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class CellsQuery extends Query {
  protected $attributes = [
    'name' => 'cells'
  ];

  public function type(): Type
  {
    return Type::listOf(GraphQL::type('Cell'));
  }

  public function resolve($root, $resolve)
  {
    return Cell::all();
  }
}
