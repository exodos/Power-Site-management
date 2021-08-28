<?php

namespace App\Http\Controllers;

use App\Exports\LineFiberExport;
use App\Exports\PowersExport;
use App\Models\TransmissionSite;
use App\Models\TransmissionSiteLineFibers;
use App\Notifications\SiteLineCreateNotify;
use App\Notifications\SiteLineDeleteNotify;
use App\Notifications\SiteLineUpdateNotify;
use App\Notifications\TransmissionSiteCreateNotify;
use App\Notifications\TransmissionSiteDeleteNotify;
use App\Notifications\TransmissionSiteUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class TransmissionSiteLineFiberController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:transmission-list|transmission-create|transmission-edit|transmission-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:transmission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:transmission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:transmission-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $siteLines = TransmissionSiteLineFibers::where('id', 'LIKE', "%{$search}%")
                ->orWhere('direction_name', 'LIKE', "%{$search}%")
                ->orWhere('cabling_method', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $siteLines = TransmissionSiteLineFibers::latest()->paginate(10);
        }

        return view('site_line_fibers.index', compact('siteLines'));
    }


    public function export()
    {
        return Excel::download(new LineFiberExport, 'site_line_fibers.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site_line_fibers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'direction_name' => 'required',
            'cabling_method' => 'required',
            'fiber_type' => 'required',
            'core_number' => 'required',
            'next_hope_ne_id' => 'required',
            'next_hope_distance' => 'required',
            'transmission_otn_nes_id' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $siteLines = TransmissionSiteLineFibers::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new SiteLineCreateNotify($siteLines));
            session()->flash('success', 'Line Fiber Created Successfully.');
            return redirect()->route('site_line_fibers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('site_line_fibers.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siteLines = TransmissionSiteLineFibers::find($id);
        return View::make('site_line_fibers.edit')->with('siteLines', $siteLines);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siteLines = TransmissionSiteLineFibers::find($id);

        $this->validate($request, [
            'id' => 'required',
            'direction_name' => 'required',
            'cabling_method' => 'required',
            'fiber_type' => 'required',
            'core_number' => 'required',
            'next_hope_ne_id' => 'required',
            'next_hope_distance' => 'required',
            'transmission_otn_nes_id' => 'required',
            'transmission_site_id' => 'required',
        ]);


        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $siteLines->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new SiteLineUpdateNotify($siteLines));
            session()->flash('updated', 'Line Fiber Successfully Updated!');
            return redirect()->route('site_line_fibers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('transmission_site.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $siteLines = TransmissionSiteLineFibers::find($id);
            $siteLines->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new SiteLineDeleteNotify($siteLines));
            session()->flash('deleted', 'Line Fiber Successfully Deleted!');
            return redirect()->route('site_line_fibers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('site_line_fibers.index');
        }
    }
}
