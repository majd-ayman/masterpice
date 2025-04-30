<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorsAdminController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('clinic')->get(); 
        $appointments = Appointment::where('is_available', 1)->get(); 
    
        return view('admin.doctors', compact('doctors', 'appointments'));
    }
}
