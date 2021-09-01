<?php

namespace App\Http\Controllers;

use App\Exports\FiberLinkExport;
use App\Exports\FiberSplicePointExport;
use App\Models\FiberSplicePoint;
use App\Notifications\FiberSplicePointCreateNotify;
use App\Notifications\FiberSplicePointDeleteNotify;
use App\Notifications\FiberSplicePointUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class FiberSplicePointController extends Controller
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
            $fiberSplices = FiberSplicePoint::where('id', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $fiberSplices = FiberSplicePoint::latest()->paginate(10);
        }

        return view('fiber_splice_points.index', compact('fiberSplices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fiber_splice_points.create');
    }


    public function export()
    {
        return Excel::download(new FiberSplicePointExport(), 'fiber_splice_point.xlsx');
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
            'latitude' => 'required',
            'longitude' => 'required',
            'fiber_links_id' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $fiberSplices = FiberSplicePoint::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new FiberSplicePointCreateNotify($fiberSplices));
            session()->flash('success', 'Fiber Splice Points Created Successfully.');
            return redirect()->route('fiber_splice_points.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('fiber_splice_points.index');
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
        $fiberSplices = FiberSplicePoint::find($id);
        return View::make('fiber_splice_points.edit')->with('fiberSplices', $fiberSplices);
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
        $fiberSplices = FiberSplicePoint::find($id);
        $this->validate($request, [
            'id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'fiber_links_id' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $fiberSplices->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new FiberSplicePointUpdateNotify($fiberSplices));
            session()->flash('updated', 'Fiber Splice Point Successfully Updated!');
            return redirect()->route('fiber_splice_points.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('fiber_splice_points.index');
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

            $fiberSplices = FiberSplicePoint::find($id);
            $fiberSplices->delete();

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new FiberSplicePointDeleteNotify($fiberSplices));

            session()->flash('deleted', 'Fiber Splice Point Successfully Deleted!');
            return redirect()->route('fiber_splice_points.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
//            session()->flash('connection', 'Connection Error! Please Check If You Have Internet Connection');
            session()->flash('connection', $message);
            return redirect()->route('fiber_splice_points.index');
        }
    }
}
