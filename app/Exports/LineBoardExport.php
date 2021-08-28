<?php

namespace App\Exports;

use App\Models\TransmissionLineBoards;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class LineBoardExport implements FromView
{

    public function view(): View
    {
        return view('line_boards.export', [
            'lineBoards' => TransmissionLineBoards::orderBy('id', 'ASC')->get()
        ]);
    }
}
