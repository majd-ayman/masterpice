<?php

namespace App\Http\Controllers\Superadmen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; 

class SuperadmenController extends Controller
{

    public function index()
    {
        $appointments = Appointment::with('user', 'clinic')
            ->orderBy('appointment_date', 'desc')
            ->take(10)
            ->get();


        return view('superAdmin.dashboard', compact('appointments'));
    }



    public function dashboard()
    {


        
        $availableDoctors = Doctor::count();
        $clinicsCount = Clinic::count();
        $totalPatients = User::count();
        $appointmentsCount = Appointment::count();
        $completedAppointments = Appointment::where('status', 'completed')->count();
        $canceledAppointments = Appointment::where('status', 'canceled')->count();
        // $reviewsCount = Review::count();
        $contactMessages = \App\Models\Contact::latest()->take(5)->get();

        return view('superAdmin.dashboard', compact(
            'availableDoctors',
            'clinicsCount',
            'totalPatients',
            'appointmentsCount',
            'completedAppointments',
            'canceledAppointments',
            // 'reviewsCount',
            'contactMessages'
        ));
    }


    public function showProfile()
    {
        $supperadmin = Auth::user();
        return view('superAdmin.showmyprofile', compact('supperadmin'));
    }

    
    public function editmyprofile()
    {
        $supperadmin = Auth::user();
        return view('superAdmin.editmyprofile', compact('supperadmin'));
    }
}
