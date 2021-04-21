<?php

namespace App\Http\Controllers;

use App\Models\Battery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BatteryController extends Controller
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
        $batteries = Battery::paginate(10);

        return view('batteries.index', compact('batteries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('batteries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|unique:batteries',
            'batteries_model' => 'required',
            'number_of_batteries_group' => 'required',
            'batteries_capacity' => 'required',
            'site_id'=>'required'
        ]);

        Battery::create([
            'id' => $request->id,
            'batteries_model' => $request->batteries_model,
            'number_of_batteries_group' => $request->number_of_batteries_group,
            'batteries_capacity' => $request->batteries_capacity,
            'site_id'=>$request->site_id
        ]);

        session()->flash('success', 'Battery Created Successfully.');


        return redirect()->route('batteries.index');
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
        $battery = Battery::find($id);

        return View::make('batteries.edit')->with('battery', $battery);
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
        $battery_id = Battery::find($id);

        $this->validate($request, [
            'id'=>'required|unique:batteries',
            'batteries_model'=>'required',
            'number_of_batteries_group'=>'required',
            'batteries_capacity'=>'required',
            'site_id'=>'required'
        ]);

        $input = $request->all();

        $battery_id->fill($input)->save();

        session()->flash('updated', 'Batteries Successfully Updated!');

        return redirect()->route('batteries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $battery = Battery::find($id);

        $battery->delete();


        session()->flash('deleted', 'Battery Successfully Deleted!');

        return redirect()->route('batteries.index');
    }
}
