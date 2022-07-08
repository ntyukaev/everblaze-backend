<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Report;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        User::all()->each(function($user) use($faker) {
            Report::create([
                'user_id' => $user->id,
                'name' => $faker->name()
            ]);
        });
    }
}
