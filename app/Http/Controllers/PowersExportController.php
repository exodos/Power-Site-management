<?php

namespace App\Http\Controllers;

use App\Exports\PowersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PowersExportController extends Controller
{
    public function export(){
        return Excel::download(new PowersExport, 'power.xlsx');
    }
}
