<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profilepicture' => ['required', 'image', 'max:2048'], // Adjust the max file size as needed
            'phonenumber' => ['required', 'numeric'],
            'role' => ['required', 'in:passenger,driver'],
        ]);
    
        $role = $request->input('role');
        $additionalFields = [];
    
        if ($role === 'driver') {
            $request->validate([
                'Description' => ['required', 'string'],
                'Payment' => ['required', 'in:cash,card'],
            ]);
    
            $additionalFields = [
                'Description' => $request->input('Description'),
                'Payment' => $request->input('Payment'),
            ];
        }
    
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'profilepicture' => $request->file('profilepicture')->store('app/public/Images', 'public'), 
            'phonenumber' => $request->input('phonenumber'),
           
            'Description' => $additionalFields['Description'] ?? null,
            'Payment' => $additionalFields['Payment'] ?? null,
        ] + $additionalFields); 
    
        $user->assignRole($role);

            
        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }
    

    }

