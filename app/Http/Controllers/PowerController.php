<?php

namespace App\Http\Controllers;

use App\Models\Battery;
use App\Models\Power;
use App\Notifications\BatteryDeleteNotify;
use App\Notifications\PowerCreateNotify;
use App\Notifications\PowerDeleteNotify;
use App\Notifications\PowerUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Notification;
use Swift_SmtpTransport;

class PowerController extends Controller
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
            $powers = Power::where('id', 'LIKE', "%{$search}%")
                ->orWhere('generator_type', 'LIKE', "%{$search}%")
                ->orWhere('generator_capacity', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $powers = Power::latest()->paginate(10);
        }
        return view('powers.index', compact('powers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('powers.create');

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
            'id' => 'required|unique:powers|min:6|max:6',
            'generator_type' => 'required',
            'generator_capacity' => 'required',
            'engine_model' => 'required',
            'fuel_tanker_capacity' => 'required',
            'alternator_model' => 'required',
            'alternator_capacity' => 'required',
            'controller_mode_model' => 'required',
            'ats_model' => 'required',
            'ats_capacity' => 'required',
            'generator_foundation_size' => 'required',
            'fuel_tank_foundation_size' => 'required',
            'fuel_tanker_type' => 'required',
            'fuel_tank_Qty' => 'required',
            'starter_battery_capacity' => 'required',
            'starter_battery_type' => 'required',
            'functionality_status' => 'required',
            'dg_commission_date' => 'required',
            'dg_lld_number' => 'required',
            'grid_power_line_voltage_and_transformer_capacity' => 'required',
            'transformer_installation_date' => 'required',
            'site_id' => 'required',
            'work_order_id' => 'required|unique:powers',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $power = Power::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new PowerCreateNotify($power));
            session()->flash('success', 'Power Created Successfully.');
            return redirect()->route('powers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('powers.index');
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
        $powers = Power::find($id);
        return View::make('powers.edit')->with('powers', $powers);

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

        $power = Power::find($id);

        $this->validate($request, [
            'id' => 'required|min:6|max:6',
            'generator_type' => 'required',
            'generator_capacity' => 'required',
            'engine_model' => 'required',
            'fuel_tanker_capacity' => 'required',
            'alternator_model' => 'required',
            'alternator_capacity' => 'required',
            'controller_mode_model' => 'required',
            'ats_model' => 'required',
            'ats_capacity' => 'required',
            'generator_foundation_size' => 'required',
            'fuel_tank_foundation_size' => 'required',
            'fuel_tanker_type' => 'required',
            'fuel_tank_Qty' => 'required',
            'starter_battery_capacity' => 'required',
            'starter_battery_type' => 'required',
            'functionality_status' => 'required',
            'dg_commission_date' => 'required',
            'dg_lld_number' => 'required',
            'grid_power_line_voltage_and_transformer_capacity' => 'required',
            'transformer_installation_date' => 'required',
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
            $power->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new PowerUpdateNotify($power));
            session()->flash('updated', 'Powers Successfully Updated!');
            return redirect()->route('powers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('powers.index');
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

            $power = Power::find($id);
            $power->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new PowerDeleteNotify($power));
            session()->flash('deleted', 'Power Successfully Deleted!');
            return redirect()->route('powers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('powers.index');
        }
    }
}
