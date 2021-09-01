<?php

namespace App\Http\Controllers;

use App\Exports\FiberLinkExport;
use App\Exports\MicrowaveExport;
use App\Models\FiberLink;
use App\Models\Microwave;
use App\Notifications\FiberLinkCreateNotification;
use App\Notifications\FiberLinkDeleteNotification;
use App\Notifications\FiberLinkUpdateNotification;
use App\Notifications\MicrowaveCreateNotify;
use App\Notifications\MicrowaveDeleteNotify;
use App\Notifications\MicrowaveUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class MicrowaveController extends Controller
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
            $microwaves = Microwave::where('id', 'LIKE', "%{$search}%")
                ->orWhere('site_name', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $microwaves = Microwave::latest()->paginate(10);
        }

        return view('microwaves.index', compact('microwaves'));
    }


    public function export()
    {
        return Excel::download(new MicrowaveExport(), 'microwave.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('microwaves.create');
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
            'site_name'=> 'required',
            'site_type'=> 'required',
            'installed_capacity'=> 'required',
            'maximum_capacity'=> 'required',
            'polarization'=> 'required',
            'transmission_site_id'=> 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $microwaves = Microwave::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new MicrowaveCreateNotify($microwaves));
            session()->flash('success', 'Microwave Created Successfully.');
            return redirect()->route('microwaves.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('microwaves.index');
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
        $microwaves = Microwave::find($id);
        return View::make('microwaves.edit')->with('microwaves', $microwaves);
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
        $microwaves = Microwave::find($id);
        $this->validate($request, [
            'id' => 'required',
            'site_name'=> 'required',
            'site_type'=> 'required',
            'installed_capacity'=> 'required',
            'maximum_capacity'=> 'required',
            'polarization'=> 'required',
            'transmission_site_id'=> 'required',
        ]);


        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $microwaves->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new MicrowaveUpdateNotify($microwaves));
            session()->flash('updated', 'Microwave Successfully Updated!');
            return redirect()->route('microwaves.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('microwaves.index');
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

            $microwaves = Microwave::find($id);
            $microwaves->delete();

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new MicrowaveDeleteNotify($microwaves));

            session()->flash('deleted', 'Microwave Successfully Deleted!');
            return redirect()->route('microwaves.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
//            session()->flash('connection', 'Connection Error! Please Check If You Have Internet Connection');
            session()->flash('connection', $message);
            return redirect()->route('microwaves.index');
        }
    }
}
