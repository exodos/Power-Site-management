<?php

namespace App\Http\Controllers;

use App\Models\Rectifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class RectifierController extends Controller
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
        $rectifiers = Rectifier::paginate(10);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|unique:rectifiers',
            'rectifiers_model' => 'required',
            'number_of_rectifiers' => 'required',
            'rectifiers_capacity' => 'required',
            'site_id'=>'required'
        ]);

        Rectifier::create([
            'id' => $request->id,
            'rectifiers_model' => $request->rectifiers_model,
            'number_of_rectifiers' => $request->number_of_rectifiers,
            'rectifiers_capacity' => $request->rectifiers_capacity,
            'site_id'=>$request->site_id
        ]);

        session()->flash('success', 'Rectifier Created Successfully.');


        return redirect()->route('rectifiers.index');
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

        $rectifiers = Rectifier::find($id);

        return View::make('rectifiers.edit')->with('rectifiers', $rectifiers);
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

        $rectifiers_id = Rectifier::find($id);

        $this->validate($request, [
            'id' => 'required|unique:rectifiers',
            'rectifiers_model' => 'required',
            'number_of_rectifiers' => 'required',
            'rectifiers_capacity' => 'required',
            'site_id'=>'required'
        ]);


        $input = $request->all();

        $rectifiers_id->fill($input)->save();

        session()->flash('updated', 'Rectifier Successfully Updated!');

        return redirect()->route('rectifiers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $rectifier = Rectifier::find($id);

        $rectifier->delete();


        session()->flash('deleted', 'Rectifier Successfully Deleted!');

        return redirect()->route('rectifiers.index');
    }
}
