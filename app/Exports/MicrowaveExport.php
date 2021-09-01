<?php

namespace App\Exports;

use App\Models\Microwave;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MicrowaveExport implements FromView
{
    public function view(): View
    {
        return view('microwaves.export', [
            'microwaves' => Microwave::orderBy('id', 'ASC')->get()
        ]);
    }
}
