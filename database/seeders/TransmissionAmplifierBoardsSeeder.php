<?php

namespace Database\Seeders;

use App\Models\TransmissionAmplifierBoards;
use Illuminate\Database\Seeder;

class TransmissionAmplifierBoardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionAmplifierBoards::factory(300)->create();
    }
}
