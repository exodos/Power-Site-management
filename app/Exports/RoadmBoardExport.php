<?php

namespace App\Exports;

use App\Models\TransmissionRoadmBoards;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RoadmBoardExport implements FromView
{
    public function view(): View
    {
        return view('roadm_boards.export', [
            'roadmBoards' => TransmissionRoadmBoards::orderBy('id', 'ASC')->get()
        ]);
    }
}
