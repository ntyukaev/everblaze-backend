<?php

namespace App\GraphQL\Queries;

use App\Models\Dataset;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class DatasetsQuery extends Query {
  protected $attributes = [
    'name' => 'datasets'
  ];

  public function type(): Type
  {
    return Type::listOf(GraphQL::type('Dataset'));
  }

  public function resolve($root, $resolve)
  {
    return Dataset::all();
  }
}
