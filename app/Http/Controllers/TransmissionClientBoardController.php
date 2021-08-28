<?php

namespace App\Http\Controllers;

use App\Exports\AirConditionersExport;
use App\Exports\ClientBoardExport;
use App\Models\TransmissionAmplifierBoards;
use App\Models\TransmissionClientBoards;
use App\Models\TransmissionEquipment;
use App\Notifications\AmplifierCreateNotify;
use App\Notifications\AmplifierDeleteNotify;
use App\Notifications\AmplifierUpdateNotify;
use App\Notifications\ClientCreateNotify;
use App\Notifications\ClientDeleteNotify;
use App\Notifications\ClientUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class TransmissionClientBoardController extends Controller
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
            $clientBoards = TransmissionClientBoards::where('id', 'LIKE', "%{$search}%")
                ->orWhere('board_name', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $clientBoards = TransmissionClientBoards::latest()->paginate(10);
        }

        return view('client_boards.index', compact('clientBoards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client_boards.create');

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


            $clientBoards = TransmissionClientBoards::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new ClientCreateNotify($clientBoards));
            session()->flash('success', 'Client Board Created Successfully.');
            return redirect()->route('client_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('client_boards.index');
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
        $clientBoards = TransmissionClientBoards::find($id);
        return view('client_boards.show', compact('clientBoards'));

    }


    public function export()
    {
        return Excel::download(new ClientBoardExport, 'client_boards.xlsx');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientBoards = TransmissionClientBoards::find($id);
        return View::make('client_boards.edit')->with('clientBoards', $clientBoards);
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
        $clientBoards = TransmissionClientBoards::find($id);

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
            $clientBoards->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new ClientUpdateNotify($clientBoards));
            session()->flash('updated', 'Client Boards Successfully Updated!');
            return redirect()->route('client_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('client_boards.index');
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

            $clientBoards = TransmissionClientBoards::find($id);
            $clientBoards->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new ClientDeleteNotify($clientBoards));
            session()->flash('deleted', 'Client Boards Successfully Deleted!');
            return redirect()->route('client_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('client_boards.index');
        }
    }
}
