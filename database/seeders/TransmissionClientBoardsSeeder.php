<?php

namespace Database\Seeders;

use App\Models\TransmissionClientBoards;
use Illuminate\Database\Seeder;

class TransmissionClientBoardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionClientBoards::factory(300)->create();
    }
}
