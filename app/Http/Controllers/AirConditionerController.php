<?php

namespace App\Http\Controllers;

use App\Models\AirConditioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AirConditionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }
        $airconditioners = AirConditioner::paginate(10);

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
            'id' => 'required|unique:air_conditioners',
            'air_conditioners_model' => 'required',
            'air_conditioners_capacity' => 'required',
            'site_id' => 'required',
        ]);

        AirConditioner::create([
            'id' => $request->id,
            'air_conditioners_model' => $request->air_conditioners_model,
            'air_conditioners_capacity' => $request->air_conditioners_capacity,
            'site_id' => $request->site_id,
        ]);

        session()->flash('success', 'Air Conditioner Created Successfully.');


        return redirect()->route('airconditioners.index');
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
        $air_id = AirConditioner::find($id);
        $this->validate($request, [
            'id' => 'required|unique:air_conditioners',
            'air_conditioners_model' => 'required',
            'air_conditioners_capacity' => 'required',
            'site_id' => 'required'
        ]);

        $input = $request->all();

        $air_id->fill($input)->save();

        session()->flash('updated', 'Air Conditioners Successfully Updated!');

        return redirect()->route('airconditioners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $air_conditioner = AirConditioner::find($id);
        $air_conditioner->delete();


        session()->flash('deleted', 'Air Conditioners Successfully Deleted!');

        return redirect()->route('airconditioners.index');
    }
}
