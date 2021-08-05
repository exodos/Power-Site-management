<?php

namespace App\Http\Controllers;

use App\Exports\SolarPanelsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SolarPanelsExportController extends Controller
{
    public function export(){
        return Excel::download(new SolarPanelsExport, 'solarpanel.xlsx');
    }
}
