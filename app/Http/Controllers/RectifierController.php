<?php

namespace App\Http\Controllers;

use App\Models\Power;
use App\Models\Rectifier;
use App\Notifications\PowerDeleteNotify;
use App\Notifications\RectifierCreateNotify;
use App\Notifications\RectifierDeleteNotify;
use App\Notifications\RectifierUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Swift_SmtpTransport;

class RectifierController extends Controller
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
            $rectifiers = Rectifier::where('id', 'LIKE', "%{$search}%")
                ->orWhere('rectifiers_model', 'LIKE', "%{$search}%")
                ->orWhere('rectifiers_capacity', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $rectifiers = Rectifier::latest()->paginate(10);

        }

        return view('rectifiers.index', compact('rectifiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rectifiers.create');

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
            'id' => 'required|unique:rectifiers|min:6|max:6',
            'rectifiers_model' => 'required',
            'rectifiers_capacity' => 'required',
            'rectifiers_module_model' => 'required',
            'number_of_rectifiers_model_slots' => 'required',
            'rectifiers_module_capacity' => 'required',
            'rectifier_module_Qty' => 'required',
            'llvd_capacity' => 'required',
            'blvd_capacity' => 'required',
            'battery_fuess_Qty' => 'required',
            'power_of_msag_msan_connected_company' => 'required',
            'monitoring_system_name' => 'required',
            'lld_number' => 'required',
            'commission_date' => 'required',
            'site_id' => 'required'
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('645ace6a2e58b0')
                ->setPassword('68fbc1cbe10b31');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $rectifier = Rectifier::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new RectifierCreateNotify($rectifier));
            session()->flash('success', 'Rectifier Created Successfully.');
            return redirect()->route('rectifiers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('rectifiers.index');
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

        $rectifiers = Rectifier::find($id);

        return View::make('rectifiers.edit')->with('rectifiers', $rectifiers);
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

        $rectifier = Rectifier::find($id);

        $this->validate($request, [
            'id' => 'required|min:6|max:6',
            'rectifiers_model' => 'required',
            'rectifiers_capacity' => 'required',
            'rectifiers_module_model' => 'required',
            'number_of_rectifiers_model_slots' => 'required',
            'rectifiers_module_capacity' => 'required',
            'rectifier_module_Qty' => 'required',
            'llvd_capacity' => 'required',
            'blvd_capacity' => 'required',
            'battery_fuess_Qty' => 'required',
            'power_of_msag_msan_connected_company' => 'required',
            'monitoring_system_name' => 'required',
            'lld_number' => 'required',
            'commission_date' => 'required',
            'site_id' => 'required'
        ]);
        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('645ace6a2e58b0')
                ->setPassword('68fbc1cbe10b31');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $rectifier->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new RectifierUpdateNotify($rectifier));
            session()->flash('updated', 'Rectifier Successfully Updated!');
            return redirect()->route('rectifiers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('rectifiers.index');
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
                ->setUsername('645ace6a2e58b0')
                ->setPassword('68fbc1cbe10b31');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $rectifier = Rectifier::find($id);
            $rectifier->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new RectifierDeleteNotify($rectifier));
            session()->flash('deleted', 'Rectifier Successfully Deleted!');
            return redirect()->route('rectifiers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('rectifiers.index');
        }
    }
}
