<?php

namespace App\Http\Controllers;

use App\Exports\WorkordersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WorkOrdersExportController extends Controller
{
    public function export(){
        return Excel::download(new WorkordersExport, 'work_order.xlsx');
    }
}
