<?php

namespace App\Exports;

use App\Models\TransmissionMuxDemuxBoards;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class MuxDemuxExport implements FromView
{
    public function view(): View
    {
        return view('mux_demux_boards.export', [
            'muxDemuxBoards' => TransmissionMuxDemuxBoards::orderBy('id', 'ASC')->get()
        ]);
    }
}
