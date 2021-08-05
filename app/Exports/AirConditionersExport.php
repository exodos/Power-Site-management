<?php

namespace App\Exports;

use App\Models\AirConditioner;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AirConditionersExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function view(): View
    {
        return view('airconditioners.export', [
            'airconditioners' => AirConditioner::orderBy('id', 'ASC')->get()
//            'airconditioners' => AirConditioner::query()->where('id','=',1952)->get()
        ]);
    }
}
