<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Driver;
use App\Models\Routes;
use App\Models\Taxi;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        $cities = Cities::all();

        return view('welcome', compact('cities'));
    }
    public function searchRoute(Request $request)
    {
        $startCityId = $request->input('start_city');
        $endCityId = $request->input('end_city');
        $date = $request->input('schedule');
    
        $routes = Routes::where('start_city_id', $startCityId)
            ->where('destination_city_id', $endCityId)
            ->get();
    
        $driverAndTaxiData = collect();
    
        foreach ($routes as $route) {
            $drivers = Driver::join('driver_schedule', 'driver.id', '=', 'driver_schedule.driver_id')
                ->join('schedule', 'driver_schedule.schedule_id', '=', 'schedule.id')
                ->where('route_id', $route->id)
                ->where('schedule.date', '=', $date)
                ->get();
   
            foreach ($drivers as $driver) {
                $taxi = $driver ? Taxi::find($driver->taxi_id) : null;
                $schedules = $driver ? $driver->driverSchedules->pluck('schedule') : null;
    
                $driverAndTaxiData->push([
                    'route' => $route,
                    'driver' => $driver,
                    'taxi' => $taxi,
                    'schedules' => $schedules,
                ]);
            }
        }
    
        return view('SearchResults', compact('driverAndTaxiData'));
    }
    
    

}
