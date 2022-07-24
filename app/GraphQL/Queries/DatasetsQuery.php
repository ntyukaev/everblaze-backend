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

  public function args(): array
  {
    return [
      'report_id' => [
        'name' => 'report_id',
        'type' => Type::int()
      ]
    ];
  }

  public function resolve($root, $args)
  {
    if (isset($args['report_id'])) {
      return Dataset::where('report_id', $args['report_id'])->get();
    }
    return Dataset::all();
  }
}
