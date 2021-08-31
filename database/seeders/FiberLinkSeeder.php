<?php

namespace Database\Seeders;

use App\Models\FiberLink;
use Illuminate\Database\Seeder;

class FiberLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FiberLink::factory(300)->create();
    }
}
