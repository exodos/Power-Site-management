<?php

namespace App\Http\Controllers;

use App\Exports\IpAddressesExport;
use App\Exports\TransmissionSiteExport;
use App\Models\TransmissionSite;
use App\Notifications\TransmissionSiteCreateNotify;
use App\Notifications\TransmissionSiteDeleteNotify;
use App\Notifications\TransmissionSiteUpdateNotify;
use App\Notifications\UserDeleteNotify;
use App\Notifications\UserUpdateNotify;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Swift_SmtpTransport;

class TransmissionSiteController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:transmission-list|transmission-create|transmission-edit|transmission-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:transmission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:transmission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:transmission-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $search = request()->query('search');
        if ($search) {
            $transmissionSites = TransmissionSite::where('id', 'LIKE', "%{$search}%")
                ->orWhere('site_name', 'LIKE', "{$search}")
                ->paginate(5);
        } else {
            $transmissionSites = TransmissionSite::latest()->paginate(10);
        }


        return view('transmission_site.index', compact('transmissionSites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('transmission_site.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'site_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'city' => 'required',
            'region' => 'required',
            'et_region_zone' => 'required'
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $transmissionSites = TransmissionSite::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new TransmissionSiteCreateNotify($transmissionSites));
            session()->flash('success', 'Transmission Site Created Successfully.');
            return redirect()->route('transmission_site.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('transmission_site.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param TransmissionSite $transmissionSite
     * @return Response
     */

    public function show(TransmissionSite $transmissionSite)
    {
        $transmissionSites = TransmissionSite::find($transmissionSite);
        if (empty($transmissionSites)) {
            redirect()->route('transmission_site.index');
        }
        return view('transmission_site.show', compact('transmissionSite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response5
     */

    public function edit($id)
    {
        $transmissionSites = TransmissionSite::find($id);

        return view('transmission_site.edit', compact('transmissionSites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */

    public function update(Request $request, $id)
    {
        $transmissionSites = TransmissionSite::find($id);

        $this->validate($request, [
            'id' => 'required',
            'site_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'city' => 'required',
            'region' => 'required',
            'et_region_zone' => 'required'
        ]);


        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $transmissionSites->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new TransmissionSiteUpdateNotify($transmissionSites));
            session()->flash('updated', 'Transmission Site Successfully Updated!');
            return redirect()->route('transmission_site.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('transmission_site.index');
        }
    }


    public function export()
    {
        return Excel::download(new TransmissionSiteExport, 'transmission_site.xlsx');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */

    public function destroy($id)
    {
        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('d64ebeb2b3a8d6')
                ->setPassword('29853082ca6ace');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $transmissionSites = TransmissionSite::find($id);
            $transmissionSites->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new TransmissionSiteDeleteNotify($transmissionSites));
            session()->flash('deleted', 'Transmission Site Successfully Deleted!');
            return redirect()->route('transmission_site.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('transmission_site.index');
        }
    }
}
