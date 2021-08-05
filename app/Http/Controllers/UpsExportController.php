<?php

namespace App\Http\Controllers;

use App\Exports\UpsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UpsExportController extends Controller
{
    public function export(){
        return Excel::download(new UpsExport, 'ups.xlsx');
    }
}
