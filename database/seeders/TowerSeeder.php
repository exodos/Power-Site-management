<?php

namespace Database\Seeders;

use App\Models\Tower;
use Illuminate\Database\Seeder;

class TowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tower::factory(300)->create();
    }
}
