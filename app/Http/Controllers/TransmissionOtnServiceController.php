<?php

namespace App\Http\Controllers;

use App\Exports\AirConditionersExport;
use App\Exports\OtnServiceExport;
use App\Models\TransmissionOtnNes;
use App\Models\TransmissionOtnServices;
use App\Notifications\OtnNeCreateNotify;
use App\Notifications\OtnNeDeleteNotify;
use App\Notifications\OtnNeUpdateNotify;
use App\Notifications\OtnServiceCreateNotify;
use App\Notifications\OtnServiceDeleteNotify;
use App\Notifications\OtnServiceUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Swift_SmtpTransport;

class TransmissionOtnServiceController extends Controller
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
            $otnServices = TransmissionOtnServices::where('id', 'LIKE', "%{$search}%")
                ->orWhere('service_name', 'LIKE', "%{$search}%")
                ->orWhere('customer_name', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $otnServices = TransmissionOtnServices::latest()->paginate(10);
        }

        return view('otn_services.index', compact('otnServices'));
    }


    public function export()
    {
        return Excel::download(new OtnServiceExport, 'otn_services.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('otn_services.create');

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
            'service_name' => 'required',
            'customer_name' => 'required',
            'sla_type' => 'required',
            'rate' => 'required',
            'source_ne' => 'required',
            'source_port_number' => 'required',
            'sink_ne' => 'required',
            'sink_board_id' => 'required',
            'sink_port_number' => 'required',
            'transmission_client_board_id' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $otnServices = TransmissionOtnServices::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new OtnServiceCreateNotify($otnServices));
            session()->flash('success', 'Otn Service Created Successfully.');
            return redirect()->route('otn_services.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('otn_services.index');
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
        $otnServices = TransmissionOtnServices::find($id);
        return View::make('otn_services.edit')->with('otnServices', $otnServices);
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
        $otnService = TransmissionOtnServices::find($id);

        $this->validate($request, [
            'id' => 'required',
            'service_name' => 'required',
            'customer_name' => 'required',
            'sla_type' => 'required',
            'rate' => 'required',
            'source_ne' => 'required',
            'source_port_number' => 'required',
            'sink_ne' => 'required',
            'sink_board_id' => 'required',
            'sink_port_number' => 'required',
            'transmission_client_board_id' => 'required',
            'transmission_site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $otnService->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new OtnServiceUpdateNotify($otnService));
            session()->flash('updated', 'Otn Service Successfully Updated!');
            return redirect()->route('otn_services.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('otn_services.index');
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

            $otnService = TransmissionOtnServices::find($id);
            $otnService->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new OtnServiceDeleteNotify($otnService));
            session()->flash('deleted', 'Otn Service Successfully Deleted!');
            return redirect()->route('otn_services.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('otn_services.index');
        }
    }
}
