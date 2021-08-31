<?php

namespace Database\Seeders;

use App\Models\Otn;
use Illuminate\Database\Seeder;

class OtnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Otn::factory(300)->create();
    }
}
