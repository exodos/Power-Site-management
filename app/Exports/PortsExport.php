<?php

namespace App\Exports;

use App\Models\IpAddress;
use App\Models\Port;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PortsExport implements FromView
{

    public function view(): View
    {
        return view('ports.export', [
            'ports' => Port::orderBy('id', 'ASC')->get()
        ]);
    }
}
