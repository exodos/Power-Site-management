<?php

namespace App\Exports;

use App\Models\TransmissionOtnNes;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class NeExport implements FromView
{

    public function view(): View
    {
        return view('otn_nes.export', [
            'otnNes' => TransmissionOtnNes::orderBy('id', 'ASC')->get()
        ]);
    }
}
