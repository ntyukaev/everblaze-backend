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
      return Sheet::where('report_id', $args['report_id'])->get();
    }
    return Sheet::all();
  }
}
