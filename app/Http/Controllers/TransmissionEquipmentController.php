<?php

namespace App\Http\Controllers;

use App\Exports\EquipmentExport;
use App\Exports\IpAddressesExport;
use App\Models\TransmissionClientBoards;
use App\Models\TransmissionEquipment;
use App\Models\TransmissionSite;
use App\Notifications\ClientCreateNotify;
use App\Notifications\ClientDeleteNotify;
use App\Notifications\ClientUpdateNotify;
use App\Notifications\EquimentCreateNotify;
use App\Notifications\EquimentDeleteNotify;
use App\Notifications\EquimentUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class TransmissionEquipmentController extends Controller
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
            $transmissionEquipments = TransmissionEquipment::where('id', 'LIKE', "%{$search}%")
                ->orWhere('subrack_name', 'LIKE', "%{$search}%")
                ->orWhere('subrack_type', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $transmissionEquipments = TransmissionEquipment::latest()->paginate(10);
        }

        return view('equipment.index', compact('transmissionEquipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipment.create');

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
            'subrack_name' => 'required',
            'subrack_type' => 'required',
            'equipment_type' => 'required',
            'number_used_slots' => 'required',
            'number_free_slots' => 'required',
            'vendor' => 'required',
            'transmission_otn_nes_id' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $transmissionEquipments = TransmissionEquipment::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new EquimentCreateNotify($transmissionEquipments));
            session()->flash('success', 'Equipment Created Successfully.');
            return redirect()->route('equipment.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('equipment.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
     */
    public function show($id)
    {
        $transmissionEquipments = TransmissionEquipment::find($id);

        return view('equipment.show', compact('transmissionEquipments'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transmissionEquipments = TransmissionEquipment::find($id);
        return View::make('equipment.edit')->with('transmissionEquipments', $transmissionEquipments);
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
        $transmissionEquipments = TransmissionEquipment::find($id);

        $this->validate($request, [
            'id' => 'required',
            'subrack_name' => 'required',
            'subrack_type' => 'required',
            'equipment_type' => 'required',
            'number_used_slots' => 'required',
            'number_free_slots' => 'required',
            'vendor' => 'required',
            'transmission_otn_nes_id' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $transmissionEquipments->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new EquimentUpdateNotify($transmissionEquipments));
            session()->flash('updated', 'Equipments Successfully Updated!');
            return redirect()->route('equipment.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('equipment.index');
        }
    }


    public function export()
    {
        return Excel::download(new EquipmentExport, 'equipment.xlsx');

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

            $equipments = TransmissionEquipment::find($id);
            $equipments->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new EquimentDeleteNotify($equipments));
            session()->flash('deleted', 'Equipment Successfully Deleted!');
            return redirect()->route('equipment.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('equipment.index');
        }
    }
}
