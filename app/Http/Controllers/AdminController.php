<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Driver;
use App\Models\Taxi;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function softDeleteUserAndRelated($id)
{
    $user = User::withTrashed()->find($id);

    if ($user) {
        $passenger = $user->passenger;
        $driver = $user->driver;
        $user->delete();

        if ($passenger) {
            $passenger->delete();
        }

        if ($driver) {
            $driver->delete();
        }

        return redirect()->back()->with('success', 'User and related records soft deleted successfully.');
    }

    return redirect()->back()->with('error', 'User not found.');
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
