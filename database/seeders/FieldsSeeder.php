<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chart;
use App\Models\Field;

class FieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chart::all()->each(function($chart) {
            $field_types = (object)config('enums.field_types');
            Field::create([
                'column_id' => $chart->sheet->report->dataset->first()->column->first()->id,
                'chart_id' => $chart->id,
                'type' => $field_types->X
            ]);
            Field::create([
                'column_id' => $chart->sheet->report->dataset->first()->column->first()->id,
                'chart_id' => $chart->id,
                'type' => $field_types->Y
            ]);
        });
    }
}
