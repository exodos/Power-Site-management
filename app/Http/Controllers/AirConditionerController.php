<?php

namespace App\Http\Controllers;

use App\Models\AirConditioner;
use App\Notifications\AirConditionerCreateNotify;
use App\Notifications\AirConditionerDeleteNotify;
use App\Notifications\AirConditionerUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Notification;
use Swift_SmtpTransport;

class AirConditionerController extends Controller
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
            $airconditioners = AirConditioner::where('id', 'LIKE', "%{$search}%")
                ->orWhere('air_conditioners_type', 'LIKE', "{$search}")
                ->orWhere('air_conditioners_model', 'LIKE', "{$search}")
                ->paginate(10);
        } else {
            $airconditioners = AirConditioner::latest()->paginate(10);
        }

        return view('airconditioners.index', compact('airconditioners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airconditioners.create');

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
            'id' => 'required|unique:air_conditioners|min:6|max:6',
            'air_conditioners_type' => 'required',
            'air_conditioners_model' => 'required',
            'air_conditioners_capacity' => 'required',
            'functional_type' => 'required',
            'gas_type' => 'required',
            'lld_number' => 'required',
            'commission_date' => 'required',
            'site_id' => 'required',
            'work_order_id' => 'required|unique:air_conditioners',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();
            $airConditioner = AirConditioner::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new AirConditionerCreateNotify($airConditioner));
            session()->flash('success', 'Air Conditioner Created Successfully');
            return redirect()->route('airconditioners.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('airconditioners.index');
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
        $air = AirConditioner::find($id);
        return View::make('airconditioners.edit')->with('air', $air);
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

        $airConditioner = AirConditioner::find($id);
        $this->validate($request, [
            'id' => 'required|min:6|max:6',
            'air_conditioners_type' => 'required',
            'air_conditioners_model' => 'required',
            'air_conditioners_capacity' => 'required',
            'functional_type' => 'required',
            'gas_type' => 'required',
            'lld_number' => 'required',
            'commission_date' => 'required',
            'site_id' => 'required',
            'work_order_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $airConditioner->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new AirConditionerUpdateNotify($airConditioner));
            session()->flash('updated', 'Air Conditioner Successfully Updated!');
            return redirect()->route('airconditioners.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('airconditioners.index');
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

            $airConditioner = AirConditioner::find($id);
            $airConditioner->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new AirConditionerDeleteNotify($airConditioner));
            session()->flash('deleted', 'Air Conditioner Successfully Deleted!');
            return redirect()->route('airconditioners.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('airconditioners.index');
        }
    }
}
