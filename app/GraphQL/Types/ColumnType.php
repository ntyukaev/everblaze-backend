<?php

namespace App\GraphQL\Types;

use App\Models\Column;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ColumnType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Column',
        'description' => 'Details about Column',
        'model' => Column::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the column',
            ],
            'index' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Index of the column',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the column',
            ],
            'type' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Type of the column',
            ],
            'cells' => [
                'type' => Type::listOf(GraphQL::type('Cell')),
                'description' => 'Cells of the column',
            ],
        ];
    }

    public function resolveCellsField($root)
    {
        return $root->cell;
    }
}
