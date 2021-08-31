<?php

namespace Database\Seeders;

use App\Models\FiberSplicePoint;
use Illuminate\Database\Seeder;

class FiberSplicePointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FiberSplicePoint::factory(300)->create();
    }
}
