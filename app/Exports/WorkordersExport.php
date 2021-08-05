<?php

namespace App\Exports;

use App\Models\WorkOrder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class WorkordersExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        return view('workorders.export', [
            'workorders' => WorkOrder::orderBy('id', 'ASC')->get()
        ]);
    }
}
