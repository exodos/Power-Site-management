<?php

namespace Database\Seeders;

use App\Models\AirConditioner;
use Illuminate\Database\Seeder;

class AirConditionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AirConditioner::factory(200)->create();

    }
}
