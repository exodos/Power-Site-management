<?php

namespace Database\Seeders;

use App\Models\Rectifier;
use Illuminate\Database\Seeder;

class RectifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rectifier::factory(300)->create();
    }
}
