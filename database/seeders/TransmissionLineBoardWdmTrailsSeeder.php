<?php

namespace Database\Seeders;

use App\Models\TransmissionLineBoardWdmTrails;
use Illuminate\Database\Seeder;

class TransmissionLineBoardWdmTrailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionLineBoardWdmTrails::factory(300)->create();
    }
}
