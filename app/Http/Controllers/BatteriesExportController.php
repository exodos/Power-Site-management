<?php

namespace App\Http\Controllers;

use App\Exports\BatteriesExport;
use App\Models\Battery;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BatteriesExportController extends Controller
{
    public function export(){
        return Excel::download(new BatteriesExport, 'batter.xlsx');
    }
}
