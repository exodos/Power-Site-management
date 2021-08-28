<?php

namespace App\Exports;

use App\Models\IpAddress;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class IpAddressesExport implements FromView
{

    public function view(): View
    {
        return view('ipaddresses.export', [
            'ipAddresses' => IpAddress::orderBy('id', 'ASC')->get()
        ]);
    }
}
