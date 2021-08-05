<?php

namespace App\Http\Controllers;

use App\Exports\RectifiersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RectifiersExportController extends Controller
{
    public function export(){
        return Excel::download(new RectifiersExport, 'rectifier.xlsx');
    }
}
