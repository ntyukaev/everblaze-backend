<?php

namespace App\GraphQL\Unions;

use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\UnionType;
use App\Models\FloatCell;
use App\Models\StringCell;
use App\Models\IntegerCell;
use App\Models\BooleanCell;
use Exception;
use GraphQL\Type\Definition\Type;

class CellUnion extends UnionType
{
    protected $attributes = [
        'name' => 'CellUnion',
    ];

    public function types(): array
    {
        echo 'hello';
        return [
            GraphQL::type('FloatCell'),
            GraphQL::type('StringCell'),
            GraphQL::type('IntegerCell'),
            GraphQL::type('BooleanCell')
        ];
        // return [
        //     Type::float(),
        //     Type::int(),
        //     Type::boolean(),
        //     Type::string()
        // ];
    }

    // public function resolveType($value)
    // {   
    //     // throw new Exception(implode('|', $this->toArray()));
    //     if (is_float($value)) {
    //         return Type::float();
    //     }
    //     elseif (is_string($value)) {
    //         return Type::string();
    //     }
    //     elseif (is_int($value)) {
    //         return Type::int();
    //     }
    //     elseif (is_bool($value)) {
    //         return Type::boolean();
    //     }
    // }

    public function resolveType($value)
    {   
        // throw new Exception(implode('|', $this->toArray()));
        if (is_float($value)) {
            return GraphQL::type('FloatCell');
        }
        elseif (is_string($value)) {
            return GraphQL::type('StringCell');
        }
        elseif (is_int($value)) {
            return GraphQL::type('IntegerCell');
        }
        elseif (is_bool($value)) {
            return GraphQL::type('BooleanCell');
        }
    }

    // public function resolveType($value)
    // {   
    //     throw new Exception(implode('|', $this->toArray()));
    //     if ($value instanceof FloatCell) {
    //         return GraphQL::type('FloatCell');
    //     }
    //     elseif ($value instanceof StringCell) {
    //         return GraphQL::type('StringCell');
    //     }
    //     elseif ($value instanceof IntegerCell) {
    //         return GraphQL::type('IntegerCell');
    //     }
    //     elseif ($value instanceof BooleanCell) {
    //         return GraphQL::type('BooleanCell');
    //     }
    // }
}