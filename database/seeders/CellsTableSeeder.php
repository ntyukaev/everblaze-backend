<?php

namespace Database\Seeders;

use App\Models\BooleanCell;
use App\Models\Cell;
use App\Models\Column;
use App\Models\FloatCell;
use App\Models\IntegerCell;
use App\Models\StringCell;
use Illuminate\Database\Seeder;
use Error;
use Faker;

class CellsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $cell_types =  (object)config('enums.cell_types');
        Column::all()->each(function($column) use($cell_types, $faker) {
            for ($i = 0; $i < 10; $i++) {
                $cell = Cell::create([
                    'column_id' => $column->id,
                    'index' => $i,
                    'type' => $column->type
                ]);
                $type_name = $column->type;
                switch($type_name) {
                    case $cell_types->INT:
                        $cell_type = IntegerCell::class;
                        $cell_value = $faker->randomDigit;
                        break;
                    case $cell_types->STRING:
                        $cell_type = StringCell::class;
                        $cell_value = $faker->firstNameMale;
                        break;
                    case $cell_types->FLOAT:
                        $cell_type = FloatCell::class;
                        $cell_value = rand(0, 10) / 10;
                        break;
                    case $cell_types->BOOLEAN:
                        $cell_type = BooleanCell::class;
                        $cell_value = true;
                        break;
                    default:
                        throw new Error('Unknown type.');
                }
                $cell_type::create([
                    'cell_id' => $cell->id,
                    'value' => $cell_value
                ]);
            }
        });
    }
}
