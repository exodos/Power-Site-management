<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Notifications\PortCreateNotify;
use App\Notifications\PortDeleteNotify;
use App\Notifications\PortUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Notification;
use Swift_SmtpTransport;


class PortController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:network-list|network-create|network-edit|network-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:network-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:network-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:network-delete', ['only' => ['destroy']]);
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
            $ports = Port::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('device_role', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $ports = Port::latest()->paginate(10);

        }

        return view('ports.index', compact('ports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ports.create');
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
            'name' => 'required',
            'device_role' => 'required',
            'slot' => 'required',
            'slot_usage' => 'required',
            'card_type' => 'required',
            'port_usage' => 'required'
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $ports = Port::create($request->all());

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new PortCreateNotify($ports));
            session()->flash('success', 'Ports Created Successfully.');
            return redirect()->route('ports.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('ports.index');
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
        $ports = Port::find($id);

        return View::make('ports.edit')->with('ports', $ports);
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
        $ports = Port::find($id);


        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'device_role' => 'required',
            'slot' => 'required',
            'slot_usage' => 'required',
            'card_type' => 'required',
            'port_usage' => 'required'
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $ports->fill($input)->save();

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new PortUpdateNotify($ports));
            session()->flash('updated', 'Ports Successfully Updated!');
            return redirect()->route('ports.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('ports.index');
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

            $ports = Port::find($id);

            $ports->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new PortDeleteNotify($ports));
            session()->flash('deleted', 'Port Successfully Deleted!');
            return redirect()->route('ports.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('ports.index');
        }
    }
}
