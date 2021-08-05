<?php

namespace App\Exports;

use App\Models\Rectifier;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RectifiersExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function view(): View
    {
        return view('rectifiers.export', [
            'rectifiers' => Rectifier::orderBy('id', 'ASC')->get()
        ]);
    }
}
