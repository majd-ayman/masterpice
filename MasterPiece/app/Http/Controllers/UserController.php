<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showAccount()
    {
        // استرجاع بيانات المستخدم الحالي
        $user = auth()->user(); // إذا كنت تستخدم الـ authentication وauth()

        // إرجاع الـ view مع بيانات المستخدم
        return view('my-account', compact('user'));
    }
}
