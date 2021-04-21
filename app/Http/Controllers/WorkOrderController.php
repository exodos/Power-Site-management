<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()){
            return redirect()->route('login');
        }
        $workorders = WorkOrder::paginate(10);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'id'=>'required|unique:ups',
            'work_orders_number'=>'required',
            'site_id'=>'required'
        ]);

        WorkOrder::create([
            'id'=>$request->id,
            'work_orders_number'=>$request->work_orders_number,
            'site_id'=>$request->site_id,
        ]);

        session()->flash('success', 'Work Order Created Successfully.');

        return redirect()->route('workorders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $workorders_id = WorkOrder::find($id);

        $this->validate($request,[
            'id'=>'required|unique:work_orders',
            'work_orders_number'=>'required',
            'site_id'=>'required',
        ]);


        $input = $request->all();

        $workorders_id->fill($input)->save();

        session()->flash('updated', 'Work Orders Successfully Updated!');

        return redirect()->route('workorders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $workOrder = WorkOrder::find($id);

        $workOrder->delete();


        session()->flash('deleted', 'Work Orders Successfully Deleted!');

        return redirect()->route('workorders.index');
    }
}
