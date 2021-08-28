<?php

namespace App\Http\Controllers;

use App\Exports\AirConditionersExport;
use App\Exports\LineBoardWdmExport;
use App\Models\TransmissionEquipment;
use App\Models\TransmissionLineBoards;
use App\Models\TransmissionLineBoardWdmTrails;
use App\Notifications\LineBoardCreateNotify;
use App\Notifications\LineBoardDeleteNotify;
use App\Notifications\LineBoardUpdateNotify;
use App\Notifications\LineBoardWdmCreateNotify;
use App\Notifications\LineBoardWdmDeleteNotify;
use App\Notifications\LineBoardWdmUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class TransmissionLineBoardWdmTrailController extends Controller
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
            $lineBoardWdmTrails = TransmissionLineBoardWdmTrails::where('id', 'LIKE', "%{$search}%")
                ->orWhere('trail_name', 'LIKE', "%{$search}%")
                ->orWhere('working_mode', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $lineBoardWdmTrails = TransmissionLineBoardWdmTrails::latest()->paginate(10);
        }

        return view('line_boards_wdm_trails.index', compact('lineBoardWdmTrails'));
    }


    public function export()
    {
        return Excel::download(new LineBoardWdmExport, 'line_board_wdm_trails.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('line_boards_wdm_trails.create');

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
            'trail_name'=> 'required',
            'working_mode'=> 'required',
            'source_ne'=> 'required',
            'source_port_number'=> 'required',
            'source_port_wave_length'=> 'required',
            'sink_ne'=> 'required',
            'sink_board_id'=> 'required',
            'sink_port_number'=> 'required',
            'sink_port_wave_length'=> 'required',
            'transmission_line_boards_id'=> 'required',
            'transmission_site_id'=> 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $lineBoardWdmTrails = TransmissionLineBoardWdmTrails::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new LineBoardWdmCreateNotify($lineBoardWdmTrails));
            session()->flash('success', 'Line Boards Wdm Trails Created Successfully.');
            return redirect()->route('line_boards_wdm_trails.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('line_boards_wdm_trails.index');
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
        $lineBoardWdmTrails = TransmissionLineBoardWdmTrails::find($id);
        return View::make('line_boards_wdm_trails.edit')->with('lineBoardWdmTrails', $lineBoardWdmTrails);
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
        $lineBoardWdmTrails = TransmissionLineBoardWdmTrails::find($id);

        $this->validate($request, [
            'id' => 'required',
            'trail_name'=> 'required',
            'working_mode'=> 'required',
            'source_ne'=> 'required',
            'source_port_number'=> 'required',
            'source_port_wave_length'=> 'required',
            'sink_ne'=> 'required',
            'sink_board_id'=> 'required',
            'sink_port_number'=> 'required',
            'sink_port_wave_length'=> 'required',
            'transmission_line_boards_id'=> 'required',
            'transmission_site_id'=> 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $lineBoardWdmTrails->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new LineBoardWdmUpdateNotify($lineBoardWdmTrails));
            session()->flash('updated', 'Line Boards Wdm Trails Successfully Updated!');
            return redirect()->route('line_boards_wdm_trails.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('line_boards_wdm_trails.index');
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

            $lineBoardWdmTrails = TransmissionLineBoardWdmTrails::find($id);
            $lineBoardWdmTrails->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new LineBoardWdmDeleteNotify($lineBoardWdmTrails));
            session()->flash('deleted', 'Line Boards Wdm Trails Successfully Deleted!');
            return redirect()->route('line_boards_wdm_trails.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('line_boards_wdm_trails.index');
        }
    }
}
