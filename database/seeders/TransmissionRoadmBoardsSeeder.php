<?php

namespace Database\Seeders;

use App\Models\TransmissionRoadmBoards;
use Illuminate\Database\Seeder;

class TransmissionRoadmBoardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransmissionRoadmBoards::factory(300)->create();
    }
}
