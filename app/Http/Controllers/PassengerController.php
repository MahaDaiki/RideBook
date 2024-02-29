<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\Reservations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
 $reservations = $user->passenger->reservations;

 foreach ($reservations as $reservation) {
    $driverSchedule = $reservation->driverSchedule; 
    $driver = $driverSchedule->driver;
    // $routes = $driver->routes;
    // $route = $driver->routes;
      
    // $startCityName = $route->startCity->name;
    // $destinationCityName = $route->endCity->name;

    
 
} 
// $mostReservedRoute = $user->driver->route()
//     ->withCount('reservations')
//     ->orderByDesc('reservations_count')
//     ->first();

// dd($mostReservedRoute);
   return view('dashboardPassenger', compact('reservations'));
    }
    public function submitRating(Request $request, Reservations $reservation)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

        $reservation->update([
            'Value' => $request->input('rating'),
        ]);

        return redirect()->back()->with('success', 'Rating submitted successfully!');
    }

    public function submitFeedback(Request $request, Reservations $reservation)
    {

        $request->validate([
            'feedback' => 'required|string|max:255',
        ]);

        $reservation->update([
            'Feedback' => $request->input('feedback'),
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Passenger $passenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Passenger $passenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Passenger $passenger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Passenger $passenger)
    {
        //
    }
}
