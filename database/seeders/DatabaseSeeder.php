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
        $this->call([
            SiteSeeder::class,
            AirConditionerSeeder::class,
            BatterySeeder::class,
            PowerSeeder::class,
            RectifierSeeder::class,
            SolarPanelSeeder::class,
            TowerSeeder::class,
            UpsSeeder::class,
            WorkOrderSeeder::class,
        ]);
    }
}