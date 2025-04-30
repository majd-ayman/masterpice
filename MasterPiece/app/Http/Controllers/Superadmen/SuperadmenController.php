<?php

namespace App\Http\Controllers\Superadmen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;  // استيراد موديل المواعيد
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\User;
use Carbon\Carbon;
class SuperadmenController extends Controller
{
   
    public function index()
    {
        // جلب المواعيد
        $appointments = Appointment::with('user', 'clinic')  // ربط المواعيد مع المستخدم والعيادة
            ->orderBy('appointment_date', 'desc')  // ترتيب المواعيد حسب التاريخ
            ->take(10)  // تحديد عدد المواعيد المعروضة (10 مواعيد على سبيل المثال)
            ->get();

        // إرجاع العرض مع البيانات
        return view('superAdmin.dashboard', compact('appointments'));
    }

    public function dashboard()
    {
        $doctorsCount = Doctor::count();
        $clinicsCount = Clinic::count();
        $usersCount = User::count();
        $appointmentsCount = Appointment::count();
        $completedAppointments = Appointment::where('status', 'completed')->count();
        $canceledAppointments = Appointment::where('status', 'canceled')->count();
        // $reviewsCount = Review::count();
        $contactMessages = \App\Models\Contact::latest()->take(5)->get(); // جلب آخر 5 رسائل
    
        return view('superAdmin.charts', compact(
            'doctorsCount',
            'clinicsCount',
            'usersCount',
            'appointmentsCount',
            'completedAppointments',
            'canceledAppointments',
            // 'reviewsCount',
            'contactMessages'
        ));
    }
    
}
