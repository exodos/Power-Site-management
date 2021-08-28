<?php

namespace Database\Seeders;

use App\Models\TransmissionMuxDemuxBoards;
use Illuminate\Database\Seeder;

class TransmissionMuxDemuxBoardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionMuxDemuxBoards::factory(300)->create();
    }
}
