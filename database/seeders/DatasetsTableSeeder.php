<?php

namespace Database\Seeders;

use App\Models\BooleanCell;
use Illuminate\Database\Seeder;
use Faker;

use App\Models\Report;
use App\Models\Dataset;
use App\Models\Row;
use App\Models\Column;
use App\Models\Cell;
use App\Models\DataType;
use App\Models\FloatCell;
use App\Models\IntegerCell;
use App\Models\StringCell;
use Error;

class DatasetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dataset
        $faker = Faker\Factory::create();
        Report::all()->each(function($report) use($faker) {
            Dataset::create([
                'report_id' => $report->id,
                'name' => $faker->name()
            ]);
        });
        
        $col_names =  config('enums.cell_types');
        // Row and Column
        Dataset::all()->each(function($dataset) use($col_names) {
            // Row
            for ($i = 0; $i < 10; $i++) {
                Row::create([
                    'dataset_id' => $dataset->id,
                    'index' => $i
                ]);
            }
            // Column
            foreach(array_keys($col_names) as $index=>$val) {
                Column::create([
                    'dataset_id' => $dataset->id,
                    'type' => $val,
                    'index' => $index,
                    'name' => $val
                ]);
            }
        });

        // Cell
        Row::all()->each(function($row) use($col_names, $faker) {
            Column::all()->each(function($column) use($row, $col_names, $faker) {
                $cell = Cell::create([
                    'row_id' => $row->id,
                    'column_id' => $column->id,
                    'type' => $column->type
                ]);
                $type_name = $column->type;
                $col_names = (object) $col_names;

                $cell_type = null;
                $cell_value = null;
                switch($type_name) {
                    case $col_names->INT:
                        $cell_type = IntegerCell::class;
                        $cell_value = $faker->randomDigit;
                        break;
                    case $col_names->STRING:
                        $cell_type = StringCell::class;
                        $cell_value = $faker->firstNameMale;
                        break;
                    case $col_names->FLOAT:
                        $cell_type = FloatCell::class;
                        $cell_value = rand(0, 10) / 10;
                        break;
                    case $col_names->BOOLEAN:
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
            });
        });
    }
}
