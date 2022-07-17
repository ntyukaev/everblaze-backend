<?php

namespace App\GraphQL\Types;

use App\Models\Field;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class FieldType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Field',
        'description' => 'Details about Field',
        'model' => Field::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the field',
            ],
            'type' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Type of the field',
            ],
            'column' => [
                'type' => Type::nonNull(GraphQL::type('Column')),
                'description' => 'Column of the field',
            ],
        ];
    }
}
