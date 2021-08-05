<?php

namespace App\Http\Controllers;

use App\Exports\AirConditionersExport;
use Maatwebsite\Excel\Facades\Excel;

class AirConditionersExportController extends Controller
{
    public function export()
    {
        return Excel::download(new AirConditionersExport, 'airconditioner.xlsx');
    }
}
