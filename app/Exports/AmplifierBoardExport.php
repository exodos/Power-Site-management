<?php

namespace App\Exports;

use App\Models\TransmissionAmplifierBoards;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AmplifierBoardExport implements FromView
{

    public function view(): View
    {
        return view('amplifier_boards.export', [
            'amplifierBoards' => TransmissionAmplifierBoards::orderBy('id', 'ASC')->get()
        ]);
    }
}
