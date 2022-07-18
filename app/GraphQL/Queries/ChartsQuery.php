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

  public function resolve($root, $resolve)
  {
    if (isset($root['sheet_id'])) {
      return Chart::where('sheet_id', $root['sheet_id'])->get();
    }
    return Chart::all();
  }
}
