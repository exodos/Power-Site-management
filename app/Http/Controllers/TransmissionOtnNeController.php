<?php

namespace App\Http\Controllers;

use App\Exports\NeExport;
use App\Exports\TransmissionSiteExport;
use App\Models\TransmissionEquipment;
use App\Models\TransmissionMuxDemuxBoards;
use App\Models\TransmissionOtnNes;
use App\Notifications\MuxDemuxCreateNotify;
use App\Notifications\MuxDemuxDeleteNotify;
use App\Notifications\MuxDemuxUpdateNotify;
use App\Notifications\OtnNeCreateNotify;
use App\Notifications\OtnNeDeleteNotify;
use App\Notifications\OtnNeUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class TransmissionOtnNeController extends Controller
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
            $otnNes = TransmissionOtnNes::where('id', 'LIKE', "%{$search}%")
                ->orWhere('ne_name', 'LIKE', "%{$search}%")
                ->orWhere('ne_type', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $otnNes = TransmissionOtnNes::latest()->paginate(10);
        }

        return view('otn_nes.index', compact('otnNes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('otn_nes.create');

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
            'ne_name' => 'required',
            'ne_type' => 'required',
            'ne_vendor' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $otnNes = TransmissionOtnNes::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new OtnNeCreateNotify($otnNes));
            session()->flash('success', 'Ne Created Successfully.');
            return redirect()->route('otn_nes.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('otn_nes.index');
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
        $otnNes = TransmissionOtnNes::find($id);

        return view('otn_nes.show', compact('otnNes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $otnNes = TransmissionOtnNes::find($id);
        return View::make('otn_nes.edit')->with('otnNes', $otnNes);
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
        $otnNes = TransmissionOtnNes::find($id);

        $this->validate($request, [
            'id' => 'required',
            'ne_name' => 'required',
            'ne_type' => 'required',
            'ne_vendor' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $otnNes->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new OtnNeUpdateNotify($otnNes));
            session()->flash('updated', 'NE Boards Successfully Updated!');
            return redirect()->route('otn_nes.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('otn_nes.index');
        }
    }

    public function export()
    {
        return Excel::download(new NeExport, 'otn_ne.xlsx');
    }
//    public function export()
//    {
//        return Excel::download(new TransmissionSiteExport, 'transmission_site.xlsx');
//
//    }

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

            $otnNes = TransmissionOtnNes::find($id);
            $otnNes->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new OtnNeDeleteNotify($otnNes));
            session()->flash('deleted', 'Ne Successfully Deleted!');
            return redirect()->route('otn_nes.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('otn_nes.index');
        }
    }
}
