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

        // محاولة تسجيل الدخول
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // الحصول على المستخدم الحالي

            // توجيه المستخدم بناءً على دوره
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');   // إذا كان المستخدم "سكرتير"
    
            } elseif ($user->role === 'doctor') {
                return redirect()->route('doctor.dashboard');
                 // إذا كان المستخدم "طبيب"
            } elseif ($user->role === 'superadmen') {
                return redirect()->route('superAdmin.dashboard'); // إذا كان المستخدم "مدير عام"
            } else {
                return redirect()->route('user-account.my-account'); // إذا كان المستخدم "مريض"
            }
        }

        

        return back()->with('error', 'Invalid credentials.');
    }

    // عرض صفحة التسجيل
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // معالجة طلب التسجيل
    public function register(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255', 
            'age' => 'required|integer|min:1|max:120',
        ]);

        // إنشاء مستخدم جديد
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
