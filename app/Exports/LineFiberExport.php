<?php

namespace App\Exports;

use App\Models\TransmissionSiteLineFibers;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class LineFiberExport implements FromView
{

    public function view(): View
    {
        return view('site_line_fibers.export', [
            'siteLines' => TransmissionSiteLineFibers::orderBy('id', 'ASC')->get()
        ]);
    }
}
