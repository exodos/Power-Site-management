<?php

namespace App\Exports;

use App\Models\Tower;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TowersExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        return view('towers.export', [
            'towers' => Tower::orderBy('id', 'ASC')->get()
        ]);
    }
}
