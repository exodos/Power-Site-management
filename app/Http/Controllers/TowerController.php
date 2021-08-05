<?php

namespace App\Http\Controllers;

use App\Models\SolarPanel;
use App\Models\Tower;
use App\Notifications\SolarPanelCreateNotify;
use App\Notifications\TowerCreateNotify;
use App\Notifications\TowerDeleteNotify;
use App\Notifications\TowerUpdateNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Swift_SmtpTransport;

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
        $search = request()->query('search');
        if ($search) {
            $towers = Tower::where('id', 'LIKE', "%{$search}%")
                ->orWhere('towers_type', 'LIKE', "%{$search}%")
                ->orWhere('towers_brand', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $towers = Tower::latest()->paginate(10);

        }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|unique:towers|min:6|max:6',
            'towers_type' => 'required',
            'towers_height' => 'required',
            'towers_brand' => 'required',
            'towers_soil_type' => 'required',
            'towers_foundation_type' => 'required',
            'towers_design_load_capacity' => 'required',
            'towers_sharing_operator' => 'required',
            'tower_used_load_capacity' => 'required',
            'ethio_antenna_weight' => 'required',
            'ethio_antenna_height' => 'required',
            'operator_antenna_height' => 'required',
            'operator_tower_load' => 'required',
            'operator_antenna_weight' => 'required',
            'tower_installation_date' => 'required',
            'site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('645ace6a2e58b0')
                ->setPassword('68fbc1cbe10b31');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();


            $tower = Tower::create($request->all());
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new TowerCreateNotify($tower));
            session()->flash('success', 'Tower Created Successfully.');
            return redirect()->route('towers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('towers.index');
        }
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

        $towers = Tower::find($id);

        return View::make('towers.edit')->with('towers', $towers);
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
        $tower = Tower::find($id);

        $this->validate($request, [
            'id' => 'required|min:6|max:6',
            'towers_type' => 'required',
            'towers_height' => 'required',
            'towers_brand' => 'required',
            'towers_soil_type' => 'required',
            'towers_foundation_type' => 'required',
            'towers_design_load_capacity' => 'required',
            'towers_sharing_operator' => 'required',
            'tower_used_load_capacity' => 'required',
            'ethio_antenna_weight' => 'required',
            'ethio_antenna_height' => 'required',
            'operator_antenna_height' => 'required',
            'operator_tower_load' => 'required',
            'operator_antenna_weight' => 'required',
            'tower_installation_date' => 'required',
            'site_id' => 'required',
        ]);

        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('645ace6a2e58b0')
                ->setPassword('68fbc1cbe10b31');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $input = $request->all();
            $tower->fill($input)->save();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new TowerUpdateNotify($tower));
            session()->flash('updated', 'Towers Successfully Updated!');
            return redirect()->route('towers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('towers.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525, 'tls'))
                ->setUsername('645ace6a2e58b0')
                ->setPassword('68fbc1cbe10b31');

            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();

            $tower = Tower::find($id);
            $tower->delete();
            Notification::route('mail', 'exodosbob@gmail.com')
                ->notify(new TowerDeleteNotify($tower));
            session()->flash('deleted', 'Tower Successfully Deleted!');
            return redirect()->route('towers.index');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            session()->flash('connection', $message);
            return redirect()->route('towers.index');
        }
    }
}
