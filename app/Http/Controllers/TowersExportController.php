<?php

namespace App\Http\Controllers;

use App\Exports\TowersExport;
use Maatwebsite\Excel\Facades\Excel;

class TowersExportController extends Controller
{
    public function export(){
        return Excel::download(new TowersExport, 'towers.xlsx');
    }
}
