<?php

namespace App\GraphQL\Queries;

use App\Models\Sheet;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class SheetsQuery extends Query {
  protected $attributes = [
    'name' => 'sheets'
  ];

  public function type(): Type
  {
    return Type::listOf(GraphQL::type('Sheet'));
  }

  public function resolve($root, $resolve)
  {
    return Sheet::all();
  }
}
