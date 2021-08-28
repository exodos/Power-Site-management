<?php

namespace App\Exports;

use App\Models\TransmissioEquipment;
use App\Models\TransmissionEquipment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EquipmentExport implements FromView
{
    public function view(): View
    {
        return view('equipment.export', [
            'transmissionEquipments' => TransmissionEquipment::orderBy('id', 'ASC')->get()
        ]);
    }
}
