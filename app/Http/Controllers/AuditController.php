<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $audits = Audit::where('user_id', 'LIKE', "%{$search}%")
                ->orWhere('event', 'LIKE', "%{$search}%")
                ->paginate(5);
        } else {
            $audits = \OwenIt\Auditing\Models\Audit::with('user')
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }
//        return view('audits', compact('audits'));
        return view('audits', ['audits' => $audits]);
    }
}
