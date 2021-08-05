<?php

namespace App\Exports;

use App\Models\Ups;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UpsExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        return view('ups.export', [
            'ups' => Ups::orderBy('id', 'ASC')->get()
        ]);
    }
}
