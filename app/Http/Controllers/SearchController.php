<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Driver;
use App\Models\DriverSchedules;
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
        if ($startCityId == $endCityId) {
            return back()->with('error', 'Start city cannot be equal to end city.');
        }
    
       else { $routes = Routes::where('start_city_id', $startCityId)
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
               
$driverSchedule = DriverSchedules::where('driver_id', $driver->driver_id)
->where('schedule_id', $driver->schedule_id)
->first();

if ($driverSchedule) {
$scheduleDate = $driverSchedule->schedule->date;
$driverScheduleId = $driverSchedule->id;
}
 else {
  
    $scheduleDate = null;
    $driverScheduleId = null;
}

                $taxi = $driver ? Taxi::find($driver->taxi_id) : null;
               
    
                $driverAndTaxiData->push([
                    'route' => $route,
                    'driver' => $driver,
                    'taxi' => $taxi,
                    'scheduleDate' => $scheduleDate,
            'driverScheduleId' => $driverScheduleId,
                    
                ]);
            }
        
        }
    
        if ($driverAndTaxiData->isEmpty()) {
            return view('SearchResults', compact('driverAndTaxiData'))->with('noResults','No results Found'); 
        }
        else return view('SearchResults', compact('driverAndTaxiData'));
    }
}
    
    
public function search(Request $request) {
  
   
        $search = $request->input('search');
        $route = $request->input('route');
        $driverscheduleid = $request->input('driverscheduleid');
    
        // $driverAndTaxiData = Driver::whereHas('taxi', function ($query) use ($search) {
        //         $query->where('Vehicle_Type', 'like', "%$search%");dd($query);
        //     })
        //     ->whereHas('routes', function ($query) use ($route) {
        //         $query->where('id', '=', $route);
        //     })
        //     ->whereHas('driverSchedules', function ($query) use ($driverscheduleid) {
        //         $query->where('id', '=', $driverscheduleid);
        //     })
        //     ->get();
        // $driverAndTaxiData = Driver::join('taxi', 'driver.taxi_id', '=', 'taxi.id')
        // ->where('taxi.Vehicle_Type', 'like', "%$search")
        // ->where('driver.route_id', $route)
        // ->where('driver_schedule.id', '=', $driverscheduleid)
        // ->get();
        $driverAndTaxiData = Driver::join('taxi', 'driver.taxi_id', '=', 'taxi.id')
        ->join('driver_schedule', 'driver_schedule.driver_id', '=', 'driver.id')
        ->where('taxi.Vehicle_Type', 'like', "%$search%")
        ->where('driver.route_id', $route)
        ->where('driver_schedule.id', '=', $driverscheduleid)
        ->whereNull('driver.deleted_at')
        ->select('driver.*') 
        ->get();
        return view('SearchResults', compact('driverAndTaxiData', 'search'));
    }
    
    
    
}
