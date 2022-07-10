<?php

namespace App\GraphQL\Queries;

use App\Models\Chart;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ChartsQuery extends Query {
  protected $attributes = [
    'name' => 'charts'
  ];

  public function type(): Type
  {
    return Type::listOf(GraphQL::type('Chart'));
  }

  public function resolve($root, $resolve)
  {
    return Chart::all();
  }
}
