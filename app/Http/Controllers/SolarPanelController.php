<?php

namespace App\Http\Controllers;

use App\Models\Rectifier;
use App\Models\SolarPanel;
use App\Notifications\RectifierDeleteNotify;
use App\Notifications\SolarPanelCreateNotify;
use App\Notifications\SolarPanelDeleteNotify;
use App\Notifications\SolarPanelUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Swift_SmtpTransport;

class SolarPanelController extends Controller
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
            $solarpanels = SolarPanel::where('id', 'LIKE', "%{$search}%")
                ->orWhere('number_solar_system', 'LIKE', "%{$search}%")
                ->orWhere('solar_panel_type', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $solarpanels = SolarPanel::latest()->paginate(10);

        }

        return view('solarpanels.index', compact('solarpanels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solarpanels.create');

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
            'id' => 'required|unique:solar_panels|min:6|max:6',
            'number_solar_system' => 'required',
            'solar_panel_type' => 'required',
            'solar_panels_module_capacity' => 'required',
            'number_of_arrays' => 'required',
            'solar_controller_type' => 'required',
            'regulator_capacity' => 'required',
            'solar_regulator_Qty' => 'required',
            'number_of_structure_group' => 'required',
            'solar_structure_front_height' => 'required',
            'solar_structure_rear_height' => 'required',
            'commission_date' => 'required',
            'site_id' => 'required',
            'work_order_id' => 'required|unique:solar_panels',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $solarPanel = SolarPanel::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new SolarPanelCreateNotify($solarPanel));
            session()->flash('success', 'Solar Panel Created Successfully.');
            return redirect()->route('solarpanels.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('solarpanels.index');
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

        $solarpanels = SolarPanel::find($id);

        return View::make('solarpanels.edit')->with('solarpanels', $solarpanels);
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

        $solarPanel = SolarPanel::find($id);

        $this->validate($request, [
            'id' => 'required|min:6|max:6',
            'number_solar_system' => 'required',
            'solar_panel_type' => 'required',
            'solar_panels_module_capacity' => 'required',
            'number_of_arrays' => 'required',
            'solar_controller_type' => 'required',
            'regulator_capacity' => 'required',
            'solar_regulator_Qty' => 'required',
            'number_of_structure_group' => 'required',
            'solar_structure_front_height' => 'required',
            'solar_structure_rear_height' => 'required',
            'commission_date' => 'required',
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
            $solarPanel->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new SolarPanelUpdateNotify($solarPanel));
            session()->flash('updated', 'Solar Panel Successfully Updated!');
            return redirect()->route('solarpanels.index');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('solarpanels.index');
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

            $solarPanel = SolarPanel::find($id);
            $solarPanel->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new SolarPanelDeleteNotify($solarPanel));
            session()->flash('deleted', 'Solar Panels Successfully Deleted!');
            return redirect()->route('solarpanels.index');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('solarpanels.index');
        }
    }
}
