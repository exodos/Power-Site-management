<?php

namespace Database\Seeders;

use App\Models\TransmissionOtnNes;
use Illuminate\Database\Seeder;

class TransmissionOtnNesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionOtnNes::factory(300)->create();
    }
}
