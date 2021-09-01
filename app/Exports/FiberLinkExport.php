<?php

namespace App\Exports;

use App\Models\FiberLink;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FiberLinkExport implements FromView
{
    public function view(): View
    {
        return view('fiber_links.export', [
            'fiberLinks' => FiberLink::orderBy('id', 'ASC')->get()
        ]);
    }
}
