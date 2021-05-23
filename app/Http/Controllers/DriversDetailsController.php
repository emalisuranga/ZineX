<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class DriversDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // var_dump($request->session()->get('user'));
        // exit();
        if (is_null($request->session()->get('user'))) {
            return redirect('login');
        } else {
            $data = Drivers::join('vehicles', 'vehicles.id', '=', 'drivers.vehicale_id')
                ->select('drivers.*', 'vehicles.vehicle_no', 'vehicles.id as vehicles_id')
                ->latest('drivers.created_at')->paginate(5);

            return view('drivers.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle = Vehicle::all();
        // return view('drivers.create');
        return view('drivers.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'vehicale_id' => 'required',
            'license_no' => 'required',
            'telephone_number' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

        Drivers::create($request->all());

        return redirect()->route('drivers.index')
            ->with('success', 'drivers created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function show($id, Drivers $drivers)
    {
        $vehicle = Vehicle::all();
        $drivers = Drivers::findOrFail($id);
        return view('drivers.show', compact('drivers', 'vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Drivers $drivers)
    {
        $drivers = Drivers::findOrFail($id);
        return view('drivers.edit', compact('drivers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drivers $drivers)
    {
        $request->validate([
            'name' => 'required',
            'license_no' => 'required',
            'vehicale_id' => 'required',
        ]);

        $drivers = Drivers::find($request->id);
        $drivers->vehicale_id = $request->vehicale_id;
        if($drivers->save()){
            return redirect()->route('drivers.index')
            ->with('success', 'drivers updated successfully');
        }

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Drivers $drivers)
    {
        $drivers = Drivers::findOrFail($id);
        $drivers->delete();

        return redirect()->route('drivers.index')
            ->with('success', 'drivers deleted successfully');
    }
}
