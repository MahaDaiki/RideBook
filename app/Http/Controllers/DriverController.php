<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Routes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }


    public function showRouteSelectionForm()
{
    

    $user = auth()->user();
    $driver = Driver::with(['taxi', 'route'])->where('driver_id', $user->id)->first();


    $routes = Routes::all();
    $routeCities = [];

    foreach ($routes as $route) {
        $startCity = $route->startCity->name;
        $endCity = $route->endCity->name;

        $routeCities[] = [
            'route_id' => $route->id,
            'startCity' => $startCity,
            'endCity' => $endCity,
        ];
    }
    return view('dashboardDriver', compact('routeCities','driver'));
}

public function updateRoute(Request $request,)
{
    $driver = Auth::user()->driver; 
    $driver->update(['Route_id' => $request->input('route_id')]);

    return redirect()->back()->with('success', 'Route updated successfully!');
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
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
