<?php

namespace Database\Seeders;

use App\Models\BooleanCell;
use Illuminate\Database\Seeder;
use Faker;

use App\Models\Report;
use App\Models\Dataset;
use App\Models\Column;
use App\Models\Cell;
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
            Dataset::create([
                'report_id' => $report->id,
                'name' => $faker->name()
            ]);
        });
    }
}
