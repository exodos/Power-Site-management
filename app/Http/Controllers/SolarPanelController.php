<?php

namespace App\Http\Controllers;

use App\Models\SolarPanel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SolarPanelController extends Controller
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
        $solarpanels = SolarPanel::paginate(10);

        return view('solarpanels.index', compact('solarpanels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solarpanels.create');

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
            'id'=>'required|unique:solar_panels',
            'solar_panels_number'=>'required',
            'solar_panels_capacity'=>'required',
            'solar_panels_regulatory_model'=>'required',
            'solar_panels_module_capacity'=>'required',
            'site_id'=>'required'
        ]);

        SolarPanel::create([
            'id'=>$request->id,
            'solar_panels_number'=>$request->solar_panels_number,
            'solar_panels_capacity'=>$request->solar_panels_capacity,
            'solar_panels_regulatory_model'=>$request->solar_panels_regulatory_model,
            'solar_panels_module_capacity'=>$request->solar_panels_module_capacity,
            'site_id'=>$request->site_id
        ]);

        session()->flash('success', 'Solar Panel Created Successfully.');


        return redirect()->route('solarpanels.index');
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

        $solarpanels = SolarPanel::find($id);

        return View::make('solarpanels.edit')->with('solarpanels', $solarpanels);
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

        $solarpanels_id = SolarPanel::find($id);

        $this->validate($request, [
            'id'=>'required|unique:solar_panels',
            'solar_panels_number'=>'required',
            'solar_panels_capacity'=>'required',
            'solar_panels_regulatory_model'=>'required',
            'solar_panels_module_capacity'=>'required',
            'site_id'=>'required',
        ]);


        $input = $request->all();

        $solarpanels_id->fill($input)->save();

        session()->flash('updated', 'Solar Panel Successfully Updated!');

        return redirect()->route('solarpanels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $solarPanels = SolarPanel::find($id);

        $solarPanels->delete();

        session()->flash('deleted', 'Solar Panels Successfully Deleted!');

        return redirect()->route('solarpanels.index');
    }
}
