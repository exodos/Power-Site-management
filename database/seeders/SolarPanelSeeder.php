<?php

namespace Database\Seeders;

use App\Models\SolarPanel;
use Illuminate\Database\Seeder;

class SolarPanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SolarPanel::factory(200)->create();
    }
}
