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
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            WorkOrderSeeder::class,
            SiteSeeder::class,
            AirConditionerSeeder::class,
            BatterySeeder::class,
            PowerSeeder::class,
            RectifierSeeder::class,
            SolarPanelSeeder::class,
            TowerSeeder::class,
            UpsSeeder::class,
            PortSeeder::class,
            IpAddressSeeder::class,
            TransmissionSiteSeeder::class,
            TransmissionOtnNesSeeder::class,
            TransmissionEquipmentSeeder::class,
            TransmissionLineBoardsSeeder::class,
            TransmissionClientBoardsSeeder::class,
            TransmissionOtnServicesSeeder::class,
            TransmissionLineBoardWdmTrailsSeeder::class,
            TransmissionMuxDemuxBoardsSeeder::class,
            TransmissionRoadmBoardsSeeder::class,
            TransmissionAmplifierBoardsSeeder::class,
            TransmissionSiteLineFibersSeeder::class,
        ]);
    }
}
