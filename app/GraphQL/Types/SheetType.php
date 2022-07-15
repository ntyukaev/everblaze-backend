<?php

namespace App\GraphQL\Types;

use App\Models\Sheet;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SheetType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Sheet',
        'description' => 'Details about Sheet',
        'model' => Sheet::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the sheet',
            ],
            'index' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Index of the sheet',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the sheet',
            ],
            'charts' => [
                'type' => Type::listOf(GraphQL::type('Chart')),
                'description' => 'Charts of the sheet',
            ],
        ];
    }

    public function resolveChartsField($root)
    {
        return $root->chart;
    }
}
