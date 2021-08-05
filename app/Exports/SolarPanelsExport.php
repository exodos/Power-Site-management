<?php

namespace App\Exports;

use App\Models\SolarPanel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SolarPanelsExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function view(): View
    {
        return view('solarpanels.export', [
            'solarpanels' => SolarPanel::orderBy('id', 'ASC')->get()
        ]);
    }
}
