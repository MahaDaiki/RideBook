<?php

namespace App\Http\Controllers;

use App\Models\DriverSchedules;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function confirmReservation(Request $request)
    {
        $user = Auth::user()->passenger;
        $request->validate([
            'number_of_people' => 'required|integer|min:1',
           
        ]);

        $driverScheduleId = $request->input('driver_schedule_id');
        $numberOfPeople = $request->input('number_of_people');

        $driverSchedule = DriverSchedules::findOrFail($driverScheduleId);

        $driver = $driverSchedule->driver;
        $taxi = $driver->taxi;

    
        if ($numberOfPeople > $taxi->Available_Seats) {
            return redirect()->back()->with('error', 'The number of people cannot be greater than the available seats in the Taxi.');
        }

       else Reservations::create([
            'driver_schedule_id' => $driverScheduleId,
            'Available_Seats' => $numberOfPeople,
            'price' => mt_rand(50, 200), 
            'passenger_id' => $user->id
        ]);

        $taxi->decrement('Available_Seats', $numberOfPeople);

        return redirect()->route('SearchResults')->with('success', 'Reservation confirmed successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
