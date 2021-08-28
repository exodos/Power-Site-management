<?php

namespace Database\Seeders;

use App\Models\TransmissionLineBoards;
use Illuminate\Database\Seeder;

class TransmissionLineBoardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionLineBoards::factory(300)->create();
    }
}
