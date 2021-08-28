<?php

namespace Database\Seeders;

use App\Models\TransmissionSiteLineFibers;
use Illuminate\Database\Seeder;

class TransmissionSiteLineFibersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionSiteLineFibers::factory(300)->create();
    }
}
