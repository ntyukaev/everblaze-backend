<?php

namespace App\GraphQL\Queries;

use App\Models\Chart;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ChartQuery extends Query {
  protected $attributes = [
    'name' => 'chart'
  ];

  public function type(): Type
  {
    return GraphQL::type('Chart');
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
    return Chart::findOrFail($args['id']);
  }
}
