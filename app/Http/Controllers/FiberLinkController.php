<?php

namespace App\Http\Controllers;

use App\Exports\AmplifierBoardExport;
use App\Exports\FiberLinkExport;
use App\Models\FiberLink;
use App\Models\TransmissionAmplifierBoards;
use App\Notifications\AmplifierCreateNotify;
use App\Notifications\AmplifierDeleteNotify;
use App\Notifications\AmplifierUpdateNotify;
use App\Notifications\FiberLinkCreateNotification;
use App\Notifications\FiberLinkDeleteNotification;
use App\Notifications\FiberLinkUpdateNotification;
use App\Notifications\SiteDeleteNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class FiberLinkController extends Controller
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
            $fiberLinks = FiberLink::where('id', 'LIKE', "%{$search}%")
                ->orWhere('link_name', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $fiberLinks = FiberLink::latest()->paginate(10);
        }

        return view('fiber_links.index', compact('fiberLinks'));
    }


    public function export()
    {
        return Excel::download(new FiberLinkExport(), 'fiber_links.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fiber_links.create');
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
            'link_name' => 'required',
            'fiber_type' => 'required',
            'used_core' => 'required',
            'free_core' => 'required',
            'number_splice_points' => 'required',
            'average_link_loss' => 'required',
            'ofc_type' => 'required',
            'a_end_odf_connector_type' => 'required',
            'z_end_odf_connector_type' => 'required',
            'transmission_site_id' => 'required'
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $fiberLinks = FiberLink::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new FiberLinkCreateNotification($fiberLinks));
            session()->flash('success', 'Fiber Link Created Successfully.');
            return redirect()->route('fiber_links.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('fiber_links.index');
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
        $fiberLinks = FiberLink::find($id);
        return View::make('fiber_links.edit')->with('fiberLinks', $fiberLinks);
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
        $fiberLinks = FiberLink::find($id);
        $this->validate($request, [
            'id' => 'required',
            'link_name' => 'required',
            'fiber_type' => 'required',
            'used_core' => 'required',
            'free_core' => 'required',
            'number_splice_points' => 'required',
            'average_link_loss' => 'required',
            'ofc_type' => 'required',
            'a_end_odf_connector_type' => 'required',
            'z_end_odf_connector_type' => 'required',
            'transmission_site_id' => 'required'
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $fiberLinks->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new FiberLinkUpdateNotification($fiberLinks));
            session()->flash('updated', 'Fiber Links Successfully Updated!');
            return redirect()->route('fiber_links.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('fiber_links.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
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

            $fiberLinks = FiberLink::find($id);
            $fiberLinks->delete();

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new FiberLinkDeleteNotification($fiberLinks));

            session()->flash('deleted', 'Fiber Links Successfully Deleted!');
            return redirect()->route('fiber_links.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
//            session()->flash('connection', 'Connection Error! Please Check If You Have Internet Connection');
            session()->flash('connection', $message);
            return redirect()->route('fiber_links.index');
        }
    }
}
