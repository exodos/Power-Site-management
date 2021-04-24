<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class SiteController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    function __construct()
//    {
//        $this->middleware('permission:site-list|site-create|site-edit|site-delete', ['only' => ['index', 'show']]);
//        $this->middleware('permission:site-create', ['only' => ['create', 'store']]);
//        $this->middleware('permission:site-edit', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:site-delete', ['only' => ['destroy']]);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $sites = Site::latest()->paginate(10);
        return view('sites.index', compact('sites'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('sites.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required|unique:sites',
            'sites_name' => 'required',
            'sites_latitude' => 'required',
            'sites_longitude' => 'required',
            'sites_region_zone' => 'required',
            'sites_political_region' => 'required',
            'sites_category' => 'required',
            'sites_class' => 'required',
            'sites_value' => 'required',
            'sites_type' => 'required',
            'sites_configuration' => 'required',
            'monitoring_system_name' => 'required',
            'commercial_power_line_voltage' => 'required',
        ]);

        Site::create($request->all());

        session()->flash('success', 'Site Created Successfully.');
        return redirect()->route('sites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Site $site
     * @return Response
     */

    public function show(Site $site)
    {
        $sites = Site::find($site);
        if (empty($sites)) {
            redirect()->route('sites.index');
        }
        $sites = $sites->load('air_conditioners', 'batteries', 'powers', 'rectifiers', 'solar_panels', 'towers', 'ups', 'work_orders');

//        $site = $site->load('batteries');
//        $airconditioners_id = $site->air_conditioners_id;
////        $airconditioner = AirConditioner::find($airconditioners_id);
//        $batteries_id = $site->batteries_id;
//        $battery = Battery::find($batteries_id);
//        $power_id = $site->powers_id;
//        $powers = Power::find($power_id);
//        $rectifiers_id = $site->rectifiers_id;
//        $rectifiers = Rectifier::find($rectifiers_id);
//        $solar_panels_id = $site->solar_panels_id;
//        $solar_panels = SolarPanel::find($solar_panels_id);
//        $tower_id = $site->towers_id;
//        $towers = Tower::find($tower_id);
//        $ups_id = $site->ups_id;
//        $ups = Ups::find($ups_id);
//        $work_orders_id = $site->work_orders_id;
//        $work_orders = WorkOrder::find($work_orders_id);


        return view('sites.show', compact('site'));

//       die(print_r($airconditioners));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Site $site
     * @return Response
     */
    public function edit(Site $site)
    {
        return view('sites.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Site $site
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Site $site)
    {
        request()->validate([
            'id' => 'required',
            'sites_name' => 'required',
            'sites_latitude' => 'required',
            'sites_longitude' => 'required',
            'sites_region_zone' => 'required',
            'sites_political_region' => 'required',
            'sites_category' => 'required',
            'sites_class' => 'required',
            'sites_value' => 'required',
            'sites_type' => 'required',
            'sites_configuration' => 'required',
            'monitoring_system_name' => 'required',
            'commercial_power_line_voltage' => 'required',
            'distance_maintenance_center' => 'required',
        ]);

        $site->update($request->all());

        session()->flash('updated', 'Sites Successfully Updated!');
        return redirect()->route('sites.index');


//        $site->update($request->all());
//        $sites_id = Site::find($site);
//
//        $this->validate($request, [
//            'id' => 'required',
//            'sites_name' => 'required',
//            'sites_latitude' => 'required',
//            'sites_longitude' => 'required',
//            'sites_region_zone' => 'required',
//            'sites_political_region' => 'required',
//            'sites_category' => 'required',
//            'sites_class' => 'required',
//            'sites_value' => 'required',
//            'sites_type' => 'required',
//            'sites_configuration' => 'required',
//            'monitoring_system_name' => 'required',
//            'commercial_power_line_voltage' => 'required',
//            'distance_maintenance_center' => 'required',
//        ]);
//
//        $input = $request->all();
//        $sites_id->fill($input)->save();
//
//        session()->flash('updated', 'Sites Successfully Updated!');
//
//        return redirect()->route('sites.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Site $site
     * @return Response
     * @throws \Exception
     */
    public function destroy(Site $site)
    {
        try {
            $site->delete();
            session()->flash('deleted', 'Site Successfully Deleted!');
            return redirect()->route('sites.index');
        } catch (QueryException $e) {
            session()->flash('unable', 'Integrity constraint violation: Cannot Delete Site With This Id!');
            return redirect()->route('sites.index');
        }
    }
}
