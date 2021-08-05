<?php

namespace App\Http\Controllers;

use App\Models\Tower;
use App\Models\Ups;
use App\Notifications\TowerDeleteNotify;
use App\Notifications\UpsCreateNotify;
use App\Notifications\UpsDeleteNotify;
use App\Notifications\UpsUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Swift_SmtpTransport;

class UpsController extends Controller
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
            $upss = Ups::where('id', 'LIKE', "%{$search}%")
                ->orWhere('ups_type', 'LIKE', "%{$search}%")
                ->orWhere('ups_model', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $upss = Ups::latest()->paginate(10);
        }
        return view('ups.index', compact('upss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ups.create');
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
            'id' => 'required|unique:ups|min:6|max:6',
            'ups_type' => 'required',
            'ups_model' => 'required',
            'ups_capacity' => 'required',
            'input_pob_type' => 'required',
            'input_pob_capacity' => 'required',
            'number_of_ups_model' => 'required',
            'battery_type' => 'required',
            'numbers_of_battery_banks' => 'required',
            'battery_capacity' => 'required',
            'battery_holding_time' => 'required',
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

            $ups = Ups::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new UpsCreateNotify($ups));
            session()->flash('success', 'Ups Created Successfully.');
            return redirect()->route('ups.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('ups.index');
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
        $ups = Ups::find($id);

        return View::make('ups.edit')->with('ups', $ups);
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

        $ups = Ups::find($id);

        $this->validate($request, [
            'id' => 'required|min:6|max:6',
            'ups_type' => 'required',
            'ups_model' => 'required',
            'ups_capacity' => 'required',
            'input_pob_type' => 'required',
            'input_pob_capacity' => 'required',
            'number_of_ups_model' => 'required',
            'battery_type' => 'required',
            'numbers_of_battery_banks' => 'required',
            'battery_capacity' => 'required',
            'battery_holding_time' => 'required',
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
            $ups->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new UpsUpdateNotify($ups));
            session()->flash('updated', 'Ups Successfully Updated!');
            return redirect()->route('ups.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('ups.index');
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

            $ups = Ups::find($id);
            $ups->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new UpsDeleteNotify($ups));
            session()->flash('deleted', 'Ups Successfully Deleted!');
            return redirect()->route('ups.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('ups.index');
        }
    }
}
