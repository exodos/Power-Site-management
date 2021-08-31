<?php

namespace Database\Seeders;

use App\Models\Microwave;
use Illuminate\Database\Seeder;

class MicrowaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Microwave::factory(300)->create();
    }
}
