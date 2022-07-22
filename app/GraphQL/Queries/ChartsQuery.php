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

  public function args(): array
  {
    return [
      'sheet_id' => [
        'name' => 'sheet_id',
        'type' => Type::int()
      ]
    ];
  }

  public function resolve($root, $args)
  {
    if (isset($args['sheet_id'])) {
      return Chart::where('sheet_id', $args['sheet_id'])->get();
    }
    return Chart::all();
  }
}
