<?php

namespace App\Http\Controllers;

use App\Models\Tower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class TowerController extends Controller
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
        $towers = Tower::paginate(10);

        return view('towers.index', compact('towers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('towers.create');

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
            'id' => 'required|unique:towers',
            'towers_brand' => 'required',
            'towers_height' => 'required',
            'towers_load_capacity' => 'required',
            'towers_sharing_operator' => 'required',
            'site_id'=>'required'
        ]);

        Tower::create([
            'id' => $request->id,
            'towers_brand' => $request->towers_brand,
            'towers_height' => $request->towers_height,
            'towers_load_capacity' => $request->towers_load_capacity,
            'towers_sharing_operator' => $request->towers_sharing_operator,
            'site_id'=>$request->site_id
        ]);

        session()->flash('success', 'Tower Created Successfully.');

        return redirect()->route('towers.index');
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

        $towers = Tower::find($id);

        return View::make('towers.edit')->with('towers', $towers);
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
        $towers_id = Tower::find($id);

        $this->validate($request, [
            'id' => 'required|unique:towers',
            'towers_brand' => 'required',
            'towers_height' => 'required',
            'towers_load_capacity' => 'required',
            'towers_sharing_operator' => 'required',
            'site_id'=>'required',
        ]);


        $input = $request->all();

        $towers_id->fill($input)->save();

        session()->flash('updated', 'Towers Successfully Updated!');

        return redirect()->route('towers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tower = Tower::find($id);

        $tower->delete();

        session()->flash('deleted', 'Tower Successfully Deleted!');

        return redirect()->route('towers.index');
    }
}
