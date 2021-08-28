<?php

namespace App\Http\Controllers;

use App\Exports\MuxDemuxExport;
use App\Exports\PowersExport;
use App\Models\TransmissionLineBoardWdmTrails;
use App\Models\TransmissionMuxDemuxBoards;
use App\Notifications\LineBoardWdmCreateNotify;
use App\Notifications\LineBoardWdmDeleteNotify;
use App\Notifications\LineBoardWdmUpdateNotify;
use App\Notifications\MuxDemuxCreateNotify;
use App\Notifications\MuxDemuxDeleteNotify;
use App\Notifications\MuxDemuxUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class TransmissionMuxDemuxBoardController extends Controller
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
            $muxDemuxBoards = TransmissionMuxDemuxBoards::where('id', 'LIKE', "%{$search}%")
                ->orWhere('board_name', 'LIKE', "%{$search}%")
                ->orWhere('slot_number', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $muxDemuxBoards = TransmissionMuxDemuxBoards::latest()->paginate(10);
        }

        return view('mux_demux_boards.index', compact('muxDemuxBoards'));
    }


    public function export(){
        return Excel::download(new MuxDemuxExport, 'mux_demux_boards.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mux_demux_boards.create');

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
            'number_free_ports' => 'required',
            'number_used_ports' => 'required',
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


            $muxDemuxBoards = TransmissionMuxDemuxBoards::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new MuxDemuxCreateNotify($muxDemuxBoards));
            session()->flash('success', 'Mux Demux Boards Created Successfully.');
            return redirect()->route('mux_demux_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('mux_demux_boards.index');
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
        $muxDemuxBoards = TransmissionMuxDemuxBoards::find($id);
        return View::make('mux_demux_boards.edit')->with('muxDemuxBoards', $muxDemuxBoards);
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
        $muxDemuxBoards = TransmissionMuxDemuxBoards::find($id);

        $this->validate($request, [
            'id' => 'required',
            'board_name' => 'required',
            'slot_number' => 'required',
            'type' => 'required',
            'number_free_ports' => 'required',
            'number_used_ports' => 'required',
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
            $muxDemuxBoards->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new MuxDemuxUpdateNotify($muxDemuxBoards));
            session()->flash('updated', 'Mux Demux Boards Successfully Updated!');
            return redirect()->route('mux_demux_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('mux_demux_boards.index');
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

            $muxDemuxBoards = TransmissionMuxDemuxBoards::find($id);
            $muxDemuxBoards->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new MuxDemuxDeleteNotify($muxDemuxBoards));
            session()->flash('deleted', 'Mux Demux Boards Successfully Deleted!');
            return redirect()->route('mux_demux_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('mux_demux_boards.index');
        }
    }
}
