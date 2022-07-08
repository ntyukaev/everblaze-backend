<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ReportsTableSeeder::class);
        $this->call(SheetsTableSeeder::class);
        $this->call(DatasetsTableSeeder::class);
        $this->call(ChartsTableSeeder::class);
        $this->call(FieldsSeeder::class);
    }
}
