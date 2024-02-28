<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Driver;
use App\Models\Passenger;
use App\Models\Reservations;
use App\Models\Taxi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $drivers = Driver::with(['user'])->paginate(10);
        $passengers = Passenger::with(['user'])->paginate(10);
    
        return view('UserManagement', compact( 'drivers','passengers'));
    }

//     public function softDeleteUserAndRelated($id)
// {
//     dd($id);
//     $user = User::withTrashed()->find($id);

//     if ($user) {
//         $user->delete();

//         return redirect()->back()->with('success', 'User soft deleted successfully.');
//     }

//     return redirect()->back()->with('error', 'User not found.');
// }
public function deleteDriver($driverId)
{
    $driver = Driver::findOrFail($driverId);

        $driver->user->delete();
    $driver->delete();
    return redirect()->back()->with('success', 'Driver deleted successfully.');

    
}

public function deletePassenger($passengerId)
{
    $passenger = Passenger::findOrFail($passengerId);
        $passenger->user->delete();
    $passenger->delete();
    return redirect()->back()->with('success', 'Passanger deleted successfully.');

    
}

public function addPassenger(Request $request)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'phonenumber' => 'required|string|max:20',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'profilepicture' => 'required|image',
    ]);

  
    $profilePicturePath = $request->file('profilepicture')->store('profile_pictures', 'public');

   
    $user = User::create([
        'name' => $request->input('name'),
        'phonenumber' => $request->input('phonenumber'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'profilepicture' => $profilePicturePath,
    ]);

    $user->assignRole('passenger');

    
    Passenger::create(['passenger_id' => $user->id]);

    return redirect()->back()->with('success', 'Passenger added successfully');
}
public function addDriver(Request $request)
{
    
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', 'min:8' ],
        'profilepicture' => ['required', 'image', 'max:2048'],
        'phonenumber' => ['required', 'numeric'],
        'Description' => ['required', 'string'],
        'Payment' => ['required', 'in:cash,card'],
        'vehicle_platenumber' => ['required', 'string'],
        'vehicle_type' => ['required', 'string'],
    ]);

    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'profilepicture' => $request->file('profilepicture')->store('app/public/Images', 'public'),
        'phonenumber' => $request->input('phonenumber'),
    ]);

    $user->assignRole('driver');

    
    $taxi = Taxi::create([
        'Vehicle_Platenumber' => $request->input('vehicle_platenumber'),
        'Vehicle_Type' => $request->input('vehicle_type'),
       
    ]);

    // dd($user->id);
    Driver::create([
        'Driver_id' => $user->id,
        'Taxi_id' => $taxi->id, 
        'Description' => $request->input('Description'),
        'Payment' => $request->input('Payment'),
        
    ]);

    return redirect()->back()->with('success', 'Driver registration successful! Provide additional details.');
}

public function updatePassenger(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'phonenumber' => 'required|string|max:20',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        
    ]);

    $user = User::findOrFail($id);

    $user->update([
        'name' => $request->input('name'),
        'phonenumber' => $request->input('phonenumber'),
        'email' => $request->input('email'),
    ]);

    return redirect()->back()->with('success', 'Passenger details updated successfully');
}


public function updateDriver(Request $request, $id)
{
  
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|lowercase|email|max:255|unique:users,email,' . $id,
      
    ]);

    $user = User::findOrFail($id);

    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
    ]);

  
    $driver = $user->driver;
    $driver->update([
        'Description' => $request->input('Description'),
        'Payment' => $request->input('Payment'),
      
    ]);

    return redirect()->back()->with('success', 'Driver details updated successfully');
}

public function statistics()
    {
        $driverCount = Driver::count();
        $reservationCount = Reservations::count();
        $Earnings = Reservations::sum('price');

    $reservationsPerDay = Reservations::selectRaw('Date as date, COUNT(*) as count')
        ->groupBy('date')
        ->orderBy('date')
        ->get();
        $taxi = taxi::get();
       
      
        

        return view('dashboardAdmin', compact('driverCount', 'reservationCount','taxi','Earnings','reservationsPerDay'));
    }
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
