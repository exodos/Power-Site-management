<?php

namespace App\Exports;

use App\Models\TransmissionLineBoardWdmTrails;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class LineBoardWdmExport implements FromView
{

    public function view(): View
    {
        return view('line_boards_wdm_trails.export', [
            'lineBoardWdmTrails' => TransmissionLineBoardWdmTrails::orderBy('id', 'ASC')->get()
        ]);
    }
}
