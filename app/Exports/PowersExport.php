<?php

namespace App\Exports;

use App\Models\Power;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PowersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function view(): View
    {
        return view('powers.export', [
            'powers'=> Power::orderBy('id', 'ASC')->get()
        ]);
    }
}
