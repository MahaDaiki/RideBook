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
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('driver')) {
            return redirect()->route('driver.dashboard');
        } elseif ($user->hasRole('passenger')) {
            return redirect()->route('passenger.dashboard');
        } else {
            
            abort(403, 'Unauthorized');
        }
    }
}