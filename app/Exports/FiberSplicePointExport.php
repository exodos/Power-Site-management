<?php

namespace App\Exports;

use App\Models\FiberSplicePoint;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FiberSplicePointExport implements FromView
{
    public function view(): View
    {
        return view('fiber_splice_points.export', [
            'fiberSplices' => FiberSplicePoint::orderBy('id', 'ASC')->get()
        ]);
    }
}
