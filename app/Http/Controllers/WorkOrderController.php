<?php

namespace App\Http\Controllers;

use App\Models\Ups;
use App\Models\WorkOrder;
use App\Notifications\UpsDeleteNotify;
use App\Notifications\WorkOrderCreateNotify;
use App\Notifications\WorkOrderDeleteNotify;
use App\Notifications\WorkOrderUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Swift_SmtpTransport;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $search = request()->query('search');
        if ($search) {
            $workorders = WorkOrder::where('id', 'LIKE', "%{$search}%")
                ->orWhere('work_orders_number', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $workorders = WorkOrder::latest()->paginate(10);
        }

        return view('workorders.index', compact('workorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workorders.create');
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
            'id' => 'required|unique:work_orders|max:6',
            'work_orders_number' => 'required',
            'site_id' => 'required'
        ]);
        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('645ace6a2e58b0')
                ->setPassword('68fbc1cbe10b31');
            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $workOrder = WorkOrder::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new WorkOrderCreateNotify($workOrder));
            session()->flash('success', 'Work Order Created Successfully.');
            return redirect()->route('workorders.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('workorders.index');
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

        $workorders = WorkOrder::findOrFail($id);

        return View::make('workorders.edit')->with('workorders', $workorders);
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
        $workOrder = WorkOrder::find($id);

        $this->validate($request, [
            'id' => 'required|min:6|max:6',
            'work_orders_number' => 'required',
            'site_id' => 'required',
        ]);
        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('645ace6a2e58b0')
                ->setPassword('68fbc1cbe10b31');
            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $workOrder->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new WorkOrderUpdateNotify($workOrder));
            session()->flash('updated', 'Work Orders Successfully Updated!');
            return redirect()->route('workorders.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('workorders.index');
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

            $workOrder = WorkOrder::find($id);
            $workOrder->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new WorkOrderDeleteNotify($workOrder));
            session()->flash('deleted', 'Work Orders Successfully Deleted!');
            return redirect()->route('workorders.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('workorders.index');
        }
    }
}
