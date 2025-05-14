<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); 

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');   
    
            } elseif ($user->role === 'doctor') {
                return redirect()->route('doctor.dashboard');
            } elseif ($user->role === 'superadmen') {
                return redirect()->route('superAdmin.dashboard'); 
            } else {
                return redirect()->route('user-account.my-account'); 
            }
        }

        

        return back()->with('error', 'Invalid credentials.');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|regex:/^[0-9]{10}$/',
        
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255', 
            'age' => 'required|integer|min:1|max:120',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address, 
            'age' => $request->age,
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
