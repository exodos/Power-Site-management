<?php

namespace App\Http\Controllers;

use App\Exports\BatteriesExport;
use App\Exports\RoadmBoardExport;
use App\Models\TransmissionOtnServices;
use App\Models\TransmissionRoadmBoards;
use App\Notifications\OtnServiceCreateNotify;
use App\Notifications\OtnServiceDeleteNotify;
use App\Notifications\OtnServiceUpdateNotify;
use App\Notifications\RoadmCreateNotify;
use App\Notifications\RoadmDeleteNotify;
use App\Notifications\RoadmUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class TransmissionRoadmBoardController extends Controller
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
            $roadmBoards = TransmissionRoadmBoards::where('id', 'LIKE', "%{$search}%")
                ->orWhere('board_name', 'LIKE', "%{$search}%")
                ->orWhere('slot_number', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $roadmBoards = TransmissionRoadmBoards::latest()->paginate(10);
        }

        return view('roadm_boards.index', compact('roadmBoards'));
    }


    public function export()
    {
        return Excel::download(new RoadmBoardExport, 'roadm_boards.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roadm_boards.create');

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


            $roadmBoards = TransmissionRoadmBoards::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new RoadmCreateNotify($roadmBoards));
            session()->flash('success', 'Roadm Board Created Successfully.');
            return redirect()->route('roadm_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('roadm_boards.index');
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
        $roadmBoards = TransmissionRoadmBoards::find($id);
        return View::make('roadm_boards.edit')->with('roadmBoards', $roadmBoards);
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
        $roadmBoards = TransmissionRoadmBoards::find($id);

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
            $roadmBoards->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new RoadmUpdateNotify($roadmBoards));
            session()->flash('updated', 'Roadm Board Successfully Updated!');
            return redirect()->route('roadm_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('roadm_boards.index');
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

            $roadmBoards = TransmissionRoadmBoards::find($id);
            $roadmBoards->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new RoadmDeleteNotify($roadmBoards));
            session()->flash('deleted', 'Roadm Board Successfully Deleted!');
            return redirect()->route('roadm_boards.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('roadm_boards.index');
        }
    }
}
