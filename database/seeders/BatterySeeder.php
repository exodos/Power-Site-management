<?php

namespace Database\Seeders;

use App\Models\Battery;
use Illuminate\Database\Seeder;

class BatterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Battery::factory(300)->create();
    }
}
