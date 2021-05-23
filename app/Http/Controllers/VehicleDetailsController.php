<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vehicle::latest()->paginate(5);
    
        return view('vehicle.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.create');
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
            'vehicle_no' => 'required',
            'owner_name' => 'required',
            'chassis_number' => 'required',
            'telephone_number' => 'required',
            'vehicle_type' => 'required',
            'rent_per_km' => 'required',
            'vehicle_name' => 'required',
        ]);
    
        Vehicle::create($request->all());
     
        return redirect()->route('vehicle.index')
                        ->with('success','vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        // var_dump($vehicle->vehicle_no);
        // exit();
        return view('vehicle.show',compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        // var_dump($vehicle);
        // exit();
        return view('vehicle.edit',compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'owner_name' => 'required',
            'telephone_number' => 'required',
            'rent_per_km' => 'required',
        ]);
    
        $vehicle->update($request->all());
    
        return redirect()->route('vehicle.index')
                        ->with('success','vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        
        $vehicle->delete();
    
        return redirect()->route('vehicle.index')
                        ->with('success','vehicle deleted successfully');
    }
}
