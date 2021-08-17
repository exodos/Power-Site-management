<?php

namespace App\Http\Controllers;

use App\Models\Battery;
use App\Notifications\BatteryCreateNotify;
use App\Notifications\BatteryDeleteNotify;
use App\Notifications\BatteryUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Notification;
use Swift_SmtpTransport;


class BatteryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:site-list|site-create|site-edit|site-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:site-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:site-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:site-delete', ['only' => ['destroy']]);
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
            $batteries = Battery::where('id', 'LIKE', "%{$search}%")
                ->orWhere('batteries_type', 'LIKE', "%{$search}%")
                ->orWhere('batteries_model', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $batteries = Battery::latest()->paginate(10);

        }

        return view('batteries.index', compact('batteries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('batteries.create');
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
            'id' => 'required|unique:batteries|min:6|max:6',
            'batteries_type' => 'required',
            'batteries_model' => 'required',
            'batteries_voltage' => 'required',
            'batteries_capacity' => 'required',
            'number_of_batteries_banks' => 'required',
            'battery_holding_time' => 'required',
            'commission_date' => 'required',
            'lld_number' => 'required',
            'site_id' => 'required',
            'work_order_id' => 'required|unique:batteries',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $battery = Battery::create($request->all());

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new BatteryCreateNotify($battery));
            session()->flash('success', 'Battery Created Successfully.');
            return redirect()->route('batteries.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('batteries.index');
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
        $battery = Battery::find($id);

        return View::make('batteries.edit')->with('battery', $battery);
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
        $battery = Battery::find($id);

        $this->validate($request, [
            'id' => 'required|min:6|max:6',
            'batteries_type' => 'required',
            'batteries_model' => 'required',
            'batteries_voltage' => 'required',
            'batteries_capacity' => 'required',
            'number_of_batteries_banks' => 'required',
            'battery_holding_time' => 'required',
            'commission_date' => 'required',
            'lld_number' => 'required',
            'site_id' => 'required',
            'work_order_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $battery->fill($input)->save();

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new BatteryUpdateNotify($battery));
            session()->flash('updated', 'Batteries Successfully Updated!');
            return redirect()->route('batteries.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('batteries.index');
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

            $battery = Battery::find($id);

            $battery->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new BatteryDeleteNotify($battery));
            session()->flash('deleted', 'Battery Successfully Deleted!');
            return redirect()->route('batteries.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('batteries.index');
        }
    }
}
