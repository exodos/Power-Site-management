<?php

namespace Database\Seeders;

use App\Models\Ups;
use Illuminate\Database\Seeder;

class UpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ups::factory(200)->create();
    }
}
