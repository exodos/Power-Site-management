<?php

namespace Database\Seeders;

use App\Models\TransmissionEquipment;
use Illuminate\Database\Seeder;

class TransmissionEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionEquipment::factory(300)->create();
    }
}
