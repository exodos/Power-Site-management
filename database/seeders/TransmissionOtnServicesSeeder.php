<?php

namespace Database\Seeders;

use App\Models\TransmissionOtnServices;
use Illuminate\Database\Seeder;

class TransmissionOtnServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionOtnServices::factory(300)->create();
    }
}
