<?php

namespace App\GraphQL\Queries;

use App\Models\Dataset;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class DatasetQuery extends Query {
  protected $attributes = [
    'name' => 'dataset'
  ];

  public function type(): Type
  {
    return GraphQL::type('Dataset');
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
    return Dataset::findOrFail($args['id']);
  }
}
