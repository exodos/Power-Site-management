<?php

namespace App\Exports;

use App\Models\TransmissionClientBoards;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ClientBoardExport implements FromView
{

    public function view(): View
    {
        return view('client_boards.export', [
            'clientBoards' => TransmissionClientBoards::orderBy('id', 'ASC')->get()
        ]);
    }
}
