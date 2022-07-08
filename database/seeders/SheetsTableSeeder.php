<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use App\Models\Report;
use App\Models\Sheet;

class SheetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        Report::all()->each(function($report) use($faker) {
            for ($i = 0; $i < 5; $i++) {
                Sheet::create([
                    'index' => $i,
                    'report_id' => $report->id,
                    'name' => $faker->name()
                ]);
            }
        });
    }
}
