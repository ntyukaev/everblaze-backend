<?php

namespace Database\Seeders;

use App\Models\Column;
use App\Models\Dataset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColumnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cell_types =  config('enums.cell_types');
        Dataset::all()->each(function($dataset) use($cell_types) {
            foreach(array_keys($cell_types) as $index=>$val) {
                Column::create([
                    'dataset_id' => $dataset->id,
                    'type' => $val,
                    'index' => $index,
                    'name' => $val
                ]);
            }
        });
    }
}
