<?php

namespace App\Exports;

use App\Models\Battery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class BatteriesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function view(): View
    {
        return view('batteries.export', [
            'batteries'=> Battery::orderBy('id', 'ASC')->get()
        ]);
    }
}
