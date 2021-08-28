<?php

namespace App\Exports;

use App\Models\TransmissionOtnServices;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OtnServiceExport implements FromView
{

    public function view(): View
    {
        return view('otn_services.export', [
            'otnServices' => TransmissionOtnServices::orderBy('id', 'ASC')->get()
        ]);
    }
}
