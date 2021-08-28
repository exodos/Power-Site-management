<?php

namespace App\Exports;

use App\Models\TransmissionSite;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TransmissionSiteExport implements FromView
{

    public function view(): View
    {
        return view('transmission_site.export', [
            'transmissionSites' => TransmissionSite::orderBy('id', 'ASC')->get()
        ]);
    }
}
