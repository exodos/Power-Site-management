<?php

namespace App\Http\Controllers;

use App\Models\Power;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PowerController extends Controller
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
        $powers = Power::paginate(10);
        return view('powers.index', compact('powers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('powers.create');

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
            'id' => 'required|unique:powers',
            'powers_type' => 'required',
            'dg_model' => 'required',
            'dg_capacity' => 'required',
            'fuel_tanker_capacity' => 'required',
            'site_id'=>'required'
        ]);

        Power::create([
            'id' => $request->id,
            'powers_type' => $request->powers_type,
            'dg_model' => $request->dg_model,
            'dg_capacity' => $request->dg_capacity,
            'fuel_tanker_capacity' => $request->fuel_tanker_capacity,
            'site_id'=>$request->site_id
        ]);

        session()->flash('success', 'Power Created Successfully.');

        return redirect()->route('powers.index');

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
        $powers = Power::find($id);
        return View::make('powers.edit')->with('powers', $powers);

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

        $powers_id = Power::find($id);

        $this->validate($request, [
            'id'=>'required|unique:powers',
            'powers_type'=>'required',
            'dg_model'=>'required',
            'dg_capacity'=>'required',
            'fuel_tanker_capacity'=>'required',
            'site_id'=>'required',
        ]);


        $input = $request->all();

        $powers_id->fill($input)->save();

        session()->flash('updated', 'Powers Successfully Updated!');

        return redirect()->route('powers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $power = Power::find($id);

        $power->delete();

        session()->flash('deleted', 'Power Successfully Deleted!');

        return redirect()->route('powers.index');
    }
}
