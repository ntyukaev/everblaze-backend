<?php

namespace App\GraphQL\Queries;

use App\Models\Sheet;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class SheetQuery extends Query {
  protected $attributes = [
    'name' => 'sheet'
  ];

  public function type(): Type
  {
    return GraphQL::type('Sheet');
  }

  public function args(): array
  {
    return [
      'id' => [
        'name' => 'id',
        'type' => Type::int()
      ],
      'report_id' => [
        'name' => 'report_id',
        'type' => Type::int()
      ],
      'index' => [
        'name' => 'index',
        'type' => Type::int()
      ]
    ];
  }

  protected function rules(array $args = []): array
  {
    return [
      'id' => isset($args['report_id']) && isset($args['index']) ? [] : ['required'],
      'report_id' => isset($args['index']) ? ['required'] : [],
      'index' => isset($args['report_id']) ? ['required'] : []
    ];
  }

  public function resolve($root, $args)
  {
    if (isset($args['id'])) {
      return Sheet::findOrFail($args['id']);
    }
    return Sheet::where('report_id', $args['report_id'])->where('index', $args['index'])->firstOrFail();
  }
}
