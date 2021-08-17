<?php

namespace App\Http\Controllers;


use App\Models\Site;
use App\Notifications\SiteCreateNotify;
use App\Notifications\SiteDeleteNotify;
use App\Notifications\SiteUpdateNotify;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use Swift_SmtpTransport;

class SiteController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $search = request()->query('search');
        if ($search) {
            $sites = Site::where('id', 'LIKE', "%{$search}%")
                ->orWhere('sites_name', 'LIKE', "%{$search}%")
                ->orWhere('ps_configuration', 'LIKE', "%{$search}%")
                ->orWhere('monitoring_status', 'LIKE', "{$search}")
                ->paginate(10);
        } else {
            $sites = Site::latest()->paginate(10);
        }

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
            'id' => 'required|unique:sites|min:6|max:6',
            'sites_name' => 'required',
            'ps_configuration' => 'required',
            'monitoring_status' => 'required',
            'sites_latitude' => 'required',
            'sites_longitude' => 'required',
            'sites_region_zone' => 'required',
            'sites_political_region' => 'required',
            'sites_location' => 'required',
            'sites_class' => 'required',
            'sites_value' => 'required',
            'sites_type' => 'required',
            'maintenance_center' => 'required',
            'distance_mc' => 'required',
            'list_of_ne' => 'required',
            'number_of_towers' => 'required',
            'number_of_generator' => 'required',
            'number_of_airconditioners' => 'required',
            'number_of_rectifiers' => 'required',
            'number_of_solar_system' => 'required',
            'number_of_down_links' => 'required',
            'work_order_id' => 'required|unique:sites',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $site = Site::create($request->all());

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new SiteCreateNotify($site));

            session()->flash('success', 'Site Created Successfully.');
            return redirect()->route('sites.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('sites.index');
        } catch (\Exception $e) {
            session()->flash('unable', 'Cannot Update Site With This Id!');
            return redirect()->route('sites.index');
        }

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
//        $sites = $sites->load('air_conditioners', 'batteries', 'powers', 'rectifiers', 'solar_panels', 'towers', 'ups', 'work_orders');

        return view('sites.show', compact('site'));

    }

//    public function search()
//    {
//        return view('sites.search');
//    }


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
            'id' => 'required|min:6|max:6',
            'sites_name' => 'required',
            'ps_configuration' => 'required',
            'monitoring_status' => 'required',
            'sites_latitude' => 'required',
            'sites_longitude' => 'required',
            'sites_region_zone' => 'required',
            'sites_political_region' => 'required',
            'sites_location' => 'required',
            'sites_class' => 'required',
            'sites_value' => 'required',
            'sites_type' => 'required',
            'maintenance_center' => 'required',
            'distance_mc' => 'required',
            'list_of_ne' => 'required',
            'number_of_towers' => 'required',
            'number_of_generator' => 'required',
            'number_of_airconditioners' => 'required',
            'number_of_rectifiers' => 'required',
            'number_of_solar_system' => 'required',
            'number_of_down_links' => 'required',
            'work_order_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $site->update($request->all());

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new SiteUpdateNotify($site));

            session()->flash('updated', 'Sites Successfully Updated!');
            return redirect()->route('sites.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('sites.index');
        } catch (\Exception $e) {

            session()->flash('unable', 'Cannot Update Site With This Id!');
            return redirect()->route('sites.index');
        }

//        $site->update($request->all());


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
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $site->delete();

            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new SiteDeleteNotify($site));

            session()->flash('deleted', 'Site Successfully Deleted!');
            return redirect()->route('sites.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
//            session()->flash('connection', 'Connection Error! Please Check If You Have Internet Connection');
            session()->flash('connection', $message);
            return redirect()->route('sites.index');
        } catch (\Exception $e) {

            session()->flash('unable', 'Cannot Delete Site With This Id: Please Check If This Site Id Is Connected To Any Devices');
            return redirect()->route('sites.index');
        }
    }

    public function search(Request $request)
    {

        $ps_configuration = $request->input('ps_configuration');
        $sites_region_zone = $request->input('sites_region_zone');
        $sites_political_region = $request->input('sites_political_region');

        if ($ps_configuration && !$sites_region_zone && !$sites_political_region) {
            $simpleSearch = Site::where('ps_configuration', 'LIKE', "%{$ps_configuration}%")
                ->paginate(10);
            $simpleSearch->appends(['ps_configuration' => $ps_configuration]);

        } elseif ($ps_configuration && $sites_region_zone && !$sites_political_region) {
            $simpleSearch = Site::where('ps_configuration', 'LIKE', "%{$ps_configuration}%")
                ->where('sites_region_zone', 'LIKE', "%{$sites_region_zone}%")
                ->paginate(10);
            $simpleSearch->appends(['ps_configuration' => $ps_configuration, 'sites_region_zone' => $sites_region_zone]);

        } else {
            $simpleSearch = Site::where('ps_configuration', 'LIKE', "%{$ps_configuration}%")
                ->where('sites_region_zone', 'LIKE', "%{$sites_region_zone}%")
                ->where('sites_political_region', 'LIKE', "%{$sites_political_region}%")
                ->paginate(10);
            $simpleSearch->appends(['ps_configuration' => $ps_configuration, 'sites_region_zone' => $sites_region_zone, 'sites_political_region' => $sites_political_region]);
        }

        return View('sites.search')->with('data', $simpleSearch);


//        if (!empty($ps_configuration) && empty($sites_region_zone) && empty($sites_political_region)) {
//            $search = Site::where('ps_configuration', 'LIKE', "%{$ps_configuration}%")
//                ->paginate(5);
//        } elseif (!empty($ps_configuration) && !empty($sites_region_zone) && empty($sites_political_region)) {
//            $search = Site::where('ps_configuration', 'LIKE', "%{$ps_configuration}%")
//                ->where('sites_region_zone', 'LIKE', "%{$sites_region_zone}%")
//                ->paginate(5);
//        } else {
//            $search = Site::where('ps_configuration', 'LIKE', "%{$ps_configuration}%")
//                ->where('sites_region_zone', 'LIKE', "%{$sites_region_zone}%")
//                ->where('sites_political_region', 'LIKE', "%{$sites_political_region}%")
//                ->paginate(5);
//        }

//        return view('sites.search', compact('simpleSearch'));
    }

}
