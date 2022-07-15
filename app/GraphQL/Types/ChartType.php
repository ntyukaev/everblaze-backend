<?php

namespace App\GraphQL\Types;

use App\Models\Chart;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ChartType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Chart',
        'description' => 'Details about Chart',
        'model' => Chart::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the chart',
            ],
            'type' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Type of the chart',
            ],
            'x' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'X position of the chart',
            ],
            'y' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'Y position of the chart',
            ],
            'fields' => [
                'type' => Type::listOf(GraphQL::type('Field')),
                'description' => 'Fields of the chart',
            ],
        ];
    }

    public function resolveFieldsField($root)
    {
        return $root->field;
    }
}
