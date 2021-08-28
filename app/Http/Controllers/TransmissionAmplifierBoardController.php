<?php

namespace App\Http\Controllers;

use App\Exports\AmplifierBoardExport;
use App\Exports\PowersExport;
use App\Models\Tower;
use App\Models\TransmissionAmplifierBoards;
use App\Notifications\AmplifierCreateNotify;
use App\Notifications\AmplifierDeleteNotify;
use App\Notifications\AmplifierUpdateNotify;
use App\Notifications\TowerCreateNotify;
use App\Notifications\TowerDeleteNotify;
use App\Notifications\TowerUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class TransmissionAmplifierBoardController extends Controller
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
            $amplifierBoards = TransmissionAmplifierBoards::where('id', 'LIKE', "%{$search}%")
                ->orWhere('board_name', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $amplifierBoards = TransmissionAmplifierBoards::latest()->paginate(10);
        }

        return view('amplifier_boards.index', compact('amplifierBoards'));
    }


    public function export()
    {
        return Excel::download(new AmplifierBoardExport, 'amplifier_boards.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('amplifier_boards.create');

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
            'type' => 'required',
            'gain' => 'required',
            'direction' => 'required',
            'transmission_equipment_id' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $amplifierBoards = TransmissionAmplifierBoards::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new AmplifierCreateNotify($amplifierBoards));
            session()->flash('success', 'Amplifier Board Created Successfully.');
            return redirect()->route('amplifier_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('amplifier_boards.index');
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
        $amplifierBoards = TransmissionAmplifierBoards::find($id);
        return View::make('amplifier_boards.edit')->with('amplifierBoards', $amplifierBoards);
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
        $amplifierBoards = TransmissionAmplifierBoards::find($id);

        $this->validate($request, [
            'id' => 'required',
            'board_name' => 'required',
            'slot_number' => 'required',
            'type' => 'required',
            'gain' => 'required',
            'direction' => 'required',
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
            $amplifierBoards->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new AmplifierUpdateNotify($amplifierBoards));
            session()->flash('updated', 'Amplifier Boards Successfully Updated!');
            return redirect()->route('amplifier_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('amplifier_boards.index');
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

            $amplifierBoards = TransmissionAmplifierBoards::find($id);
            $amplifierBoards->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new AmplifierDeleteNotify($amplifierBoards));
            session()->flash('deleted', 'Amplifier Boards Successfully Deleted!');
            return redirect()->route('amplifier_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('amplifier_boards.index');
        }
    }
}
