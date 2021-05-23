<?php

namespace App\Http\Controllers;

use App\Models\Rental_Details;
use Illuminate\Http\Request;

class RentalDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($request->session()->get('user'))) {
            return redirect('login');
        } else {
            $data = Rental_Details::join('users', 'users.id', '=', 'rental_vehical.user_id')
                ->join('vehicles', 'vehicles.id', '=', 'rental_vehical.vehicles_id')
                ->where('rental_vehical.approved', '=', '0')
                ->select('rental_vehical.*', 'users.name as name', 'vehicles.vehicle_no as vehicle_no', 'users.telephone_number as telephone_number')
                ->latest('drivers.created_at')->paginate(5);

            return view('admin.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rental_vehical = Rental_Details::find($request->id);
        $rental_vehical->approved = '1';
        if($rental_vehical->save()){
            return redirect()->route('admin.index')
            ->with('success', 'drivers created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rental_Details  $rental_Details
     * @return \Illuminate\Http\Response
     */
    public function show(Rental_Details $rental_Details)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rental_Details  $rental_Details
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental_Details $rental_Details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rental_Details  $rental_Details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rental_Details $rental_Details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rental_Details  $rental_Details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental_Details $rental_Details)
    {
        //
    }
}
