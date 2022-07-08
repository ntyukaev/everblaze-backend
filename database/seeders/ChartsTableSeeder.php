<?php

namespace Database\Seeders;

use App\Models\Chart;
use App\Models\Sheet;
use Illuminate\Database\Seeder;

class ChartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chart_types = (object)config('enums.chart_types');
        Sheet::all()->each(function($sheet) use($chart_types) {
            Chart::create([
                'x' => 0,
                'y' => 0,
                'sheet_id' => $sheet->id,
                'type' => $chart_types->LINE_CHART
            ]);
        });
    }
}
