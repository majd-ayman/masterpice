<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DoctorsAdminController extends Controller
{

public function index()
{
    $doctors = Doctor::with('clinic')->get();

    $today = Carbon::today();

    $appointments = Appointment::whereDate('appointment_date', $today)
                    ->where('status', 'scheduled')
                    ->get();

    return view('admin.doctors', compact('doctors', 'appointments'));
}

}
