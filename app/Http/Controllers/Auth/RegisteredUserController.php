<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Passenger;
use App\Models\Taxi;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::where('id', '<>', 2)->get();
        return view('auth.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   
    public function store(Request $request): RedirectResponse
    {
        $roles = Role::where('id', '<>', 2)->get();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profilepicture' => ['required', 'image', 'max:2048'], 
            'phonenumber' => ['required', 'numeric'],
            'role' => ['required', 'in:' . $roles->pluck('name')->implode(',')],
        ]);
        $imageName = time() . '.' . $request->file('profilepicture')->getClientOriginalExtension();
$request->file('profilepicture')->move(public_path('Images'), $imageName);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'profilepicture' => 'Images/' . $imageName,
            'phonenumber' => $request->input('phonenumber'),
        ]);
    
        $role = $request->input('role');
        $user->assignRole($role); 
    
        if ($role === 'driver') {
            return redirect('/driver-details/' . $user->id)->with('success', 'Driver registration successful! Provide additional details.');
        }
       
        else {
           
                Passenger::create(['passenger_id' => $user->id]);
            
    
            return redirect()->route('login')->with('success', ucfirst($role) . 'Passenger registration successful! You can now log in.');}

    }
//     public function dumpUserWithRoles($userId)
// {
//     $user = User::findOrFail($userId);
//     $roles = $user->getRoleNames();
//     dd([
//         'user' => $user,
//         'roles' => $roles,
       
//     ]);
// }
    public function showForm($id)
{
    return view('Auth.driver-details', ['userId' => $id]);
}

public function storeDetails(Request $request)
{
    
    $request->validate([
        'driver_id' => ['required', 'exists:users,id'], 
        'Description' => ['required', 'string'],
        'Payment' => ['required', 'in:cash,card'],
        'vehicle_platenumber' => ['required', 'string', 'max:255'],
        'vehicle_type' => ['required', 'string', 'max:255'],
    ]);

    // dd($request);
    $taxi = new Taxi([
        'Vehicle_Platenumber' => $request->input('vehicle_platenumber'),
        'Vehicle_Type' => $request->input('vehicle_type'),
    ]);

    $taxi->save();
    $driver = Driver::firstOrNew(['driver_id' => $request->input('driver_id')]);
    $driver->description = $request->input('Description');
    $driver->payment = $request->input('Payment');
    $driver->driver_id = $request->input('driver_id');
    $driver->taxi_id = $taxi->id;

    $driver->save();
   
    return redirect()->route('login')->with('success', ' registration successful! You can now log in.');
   
    } 
    // view('auth.login', compact('driver'));
}
