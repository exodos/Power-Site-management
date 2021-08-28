<?php

namespace Database\Seeders;

use App\Models\TransmissionSite;
use Illuminate\Database\Seeder;

class TransmissionSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionSite::factory(300)->create();
    }
}
