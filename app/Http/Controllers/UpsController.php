<?php

namespace App\Http\Controllers;

use App\Models\Ups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
        if (Auth::guest()){
            return redirect()->route('login');
        }
        $upss = Ups::paginate(10);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'id'=>'required|unique:ups',
            'ups_model'=>'required',
            'ups_capacity'=>'required',
            'number_of_ups_model'=>'required',
            'site_id'=>'required'
        ]);

        Ups::create([
            'id'=>$request->id,
            'ups_model'=>$request->ups_model,
            'ups_capacity'=>$request->ups_capacity,
            'number_of_ups_model'=>$request->number_of_ups_model,
            'site_id'=>$request->site_id
        ]);

        session()->flash('success', 'Ups Created Successfully.');

        return redirect()->route('ups.index');
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
        $ups = Ups::find($id);

        return View::make('ups.edit')->with('ups', $ups);
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

        $ups_id = Ups::find($id);

        $this->validate($request,[
            'id'=>'required|unique:ups',
            'ups_model'=>'required',
            'ups_capacity'=>'required',
            'number_of_ups_model'=>'required',
            'site_id'=>'required',
        ]);


        $input = $request->all();

        $ups_id->fill($input)->save();

        session()->flash('updated', 'Ups Successfully Updated!');

        return redirect()->route('ups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ups = Ups::find($id);

        $ups->delete();

        session()->flash('deleted', 'Ups Successfully Deleted!');

        return redirect()->route('ups.index');
    }
}
