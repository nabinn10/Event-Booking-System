<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'regex:/^[A-Za-z\s]+$/',
                'max:255',
                'unique:users,name'
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email:rfc,dns',
                'max:255',
                'unique:users,email',
                'regex:/^[A-Za-z][A-Za-z0-9._%+-]*@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/'
            ],
            'phone_number' => [
                'required',
                'regex:/^(97|98)\d{8}$/',
                'unique:users,phone_number'
            ],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],
        ]);
    
        // Create User
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => Hash::make($validated['password']),
        ]);
    
        event(new Registered($user));
        Auth::login($user);
    
        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }
    
}
