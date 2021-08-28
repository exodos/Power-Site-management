<?php

namespace App\Http\Controllers;

use App\Exports\AirConditionersExport;
use App\Exports\LineBoardExport;
use App\Models\TransmissionEquipment;
use App\Models\TransmissionLineBoards;
use App\Notifications\EquimentCreateNotify;
use App\Notifications\EquimentDeleteNotify;
use App\Notifications\EquimentUpdateNotify;
use App\Notifications\LineBoardCreateNotify;
use App\Notifications\LineBoardDeleteNotify;
use App\Notifications\LineBoardUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class TransmissionLineBoardController extends Controller
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
            $lineBoards = TransmissionLineBoards::where('id', 'LIKE', "%{$search}%")
                ->orWhere('board_name', 'LIKE', "%{$search}%")
                ->orWhere('slot_number', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $lineBoards = TransmissionLineBoards::latest()->paginate(10);
        }

        return view('line_boards.index', compact('lineBoards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('line_boards.create');

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
            'board_name' => 'required',
            'slot_number' => 'required',
            'port_capacity' => 'required',
            'number_free_ports' => 'required',
            'number_used_ports' => 'required',
            'number_ports_modules' => 'required',
            'transmission_equipment_id' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $lineBoards = TransmissionLineBoards::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new LineBoardCreateNotify($lineBoards));
            session()->flash('success', 'Line Boards Created Successfully.');
            return redirect()->route('line_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('line_boards.index');
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

        $lineBoards = TransmissionLineBoards::find($id);

        return view('line_boards.show', compact('lineBoards'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lineBoards = TransmissionLineBoards::find($id);
        return View::make('line_boards.edit')->with('lineBoards', $lineBoards);
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
        $lineBoards = TransmissionLineBoards::find($id);
        $this->validate($request, [
            'id' => 'required',
            'board_name' => 'required',
            'slot_number' => 'required',
            'port_capacity' => 'required',
            'number_free_ports' => 'required',
            'number_used_ports' => 'required',
            'number_ports_modules' => 'required',
            'transmission_equipment_id' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $lineBoards->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new LineBoardUpdateNotify($lineBoards));
            session()->flash('updated', 'Line Boards Successfully Updated!');
            return redirect()->route('line_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('line_boards.index');
        }
    }

    public function export(){
        return Excel::download(new LineBoardExport, 'line_boards.xlsx');

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

            $lineBoards = TransmissionLineBoards::find($id);
            $lineBoards->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new LineBoardDeleteNotify($lineBoards));
            session()->flash('deleted', 'Line Boards Successfully Deleted!');
            return redirect()->route('line_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('line_boards.index');
        }
    }
}
