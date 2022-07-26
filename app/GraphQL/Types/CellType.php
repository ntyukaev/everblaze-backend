<?php

namespace App\GraphQL\Types;

use App\Models\Cell;
use App\Models\FloatCell;
use App\Models\StringCell;
use App\Models\BooleanCell;
use App\Models\IntegerCell;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

define('CELL_TYPES', (object)config('enums.cell_types'));

class CellType extends GraphQLType {
  protected $attributes = [
      'name' => 'Cell',
      'description' => 'Details about Cell',
      'model' => Cell::class
  ];

  public function fields(): array
  {
    return [
        'id' => [
            'type' => Type::nonNull(Type::int()),
            'description' => 'Id of the cell'
        ],
        'type' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'Type of the cell'
        ],
        'index' => [
          'type' => Type::nonNull(Type::int()),
          'description' => 'Index of the cell'
        ],
        'value' => [
          'type' => Type::nonNull(GraphQL::type('DynamicType')),
          'description' => 'Value'
        ]
    ];
  }

  public function resolveIndexField($root) {
    return $root->row->index;
  }

  public function resolveValueField($root) {
    if ($root->type == CELL_TYPES->FLOAT) {
      return FloatCell::where('cell_id', $root->id)->value('value');
    }
    elseif ($root->type == CELL_TYPES->BOOLEAN) {
      return BooleanCell::where('cell_id', $root->id)->value('value');
    }
    elseif ($root->type == CELL_TYPES->STRING) {
      return StringCell::where('cell_id', $root->id)->value('value');
    }
    elseif ($root->type == CELL_TYPES->INT) {
      return IntegerCell::where('cell_id', $root->id)->value('value');
    }
  }
}
