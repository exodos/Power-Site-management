<?php

namespace App\Http\Controllers;

use App\Models\IpAddress;
use App\Notifications\IpAddressCreateNotify;
use App\Notifications\IpAddressDeleteNotify;
use App\Notifications\IpAddressUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Notification;
use Swift_SmtpTransport;


class IpAddressController extends Controller
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
            $ipAddresses = IpAddress::where('class_b', 'LIKE', "%{$search}%")
                ->orWhere('class_c', 'LIKE', "%{$search}%")
                ->orWhere('usage', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $ipAddresses = IpAddress::latest()->paginate(10);

        }

        return view('ipaddresses.index', compact('ipAddresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ipaddresses.create');
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
            'class_b' => 'required|unique_with:ip_addresses,class_c',
            'class_c' => 'required',
            'usage' => 'required'
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $ipAddresses = IpAddress::create($request->all());

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new IpAddressCreateNotify($ipAddresses));
            session()->flash('success', 'Ip Address Created Successfully.');
            return redirect()->route('ipaddresses.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('ipaddresses.index');
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
        $ipAddresses = IpAddress::find($id);

        return View::make('ipaddresses.edit')->with('ipAddresses', $ipAddresses);
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
        $ipAddresses = IpAddress::find($id);

        $this->validate($request, [
            'class_b' => 'required',
            'class_c' => 'required',
            'usage' => 'required'
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $ipAddresses->fill($input)->save();

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new IpAddressUpdateNotify($ipAddresses));
            session()->flash('updated', 'Ip Address Successfully Updated!');
            return redirect()->route('ipaddresses.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('ipaddresses.index');
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

            $ipAddresses = IpAddress::find($id);

            $ipAddresses->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new IpAddressDeleteNotify($ipAddresses));
            session()->flash('deleted', 'Ip Address Successfully Deleted!');
            return redirect()->route('ipaddresses.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('ipaddresses.index');
        }
    }
}
