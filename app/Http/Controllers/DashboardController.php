<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class DashboardController extends Controller
{
    
    public function showDashboard()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('dashboardAdmin');
        } elseif ($user->hasRole('driver')) {
            return view('dashboardDriver');
        } elseif ($user->hasRole('passenger')) {
            return view('dashboardPassenger');
        } else {
            
            abort(403, 'Unauthorized');
        }
    }
}