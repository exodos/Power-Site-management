<?php

namespace App\Http\Controllers;

use App\Exports\SitesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SitesExportController extends Controller
{
    public function export()
    {
        return Excel::download(new SitesExport(), 'sites.xlsx');
    }

}
