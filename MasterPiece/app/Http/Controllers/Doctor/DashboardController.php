<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Review;
use Carbon\Carbon;
use Auth;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $doctor = auth()->user()->doctor;

        if (!$doctor) {
            return redirect()->route('home')->with('error', 'لم يتم تسجيل بياناتك كطبيب بعد. الرجاء التواصل مع الإدارة.');
        }

        $todayAppointments = Appointment::where('doctor_id', $doctor->id)
            ->whereDate('appointment_date', Carbon::today())
            ->get();

        $upcomingAppointments = Appointment::with('user')
            ->where('doctor_id', $doctor->id)
            ->whereDate('appointment_date', '>', Carbon::today())
            ->orderBy('appointment_date')
            ->get();

        $weeklyPatientCount = Appointment::where('doctor_id', $doctor->id)
            ->whereBetween('appointment_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        $confirmedAppointmentsCount = Appointment::where('doctor_id', $doctor->id)
            ->where('status', 'confirmed')
            ->count();

        $canceledAppointmentsCount = Appointment::where('doctor_id', $doctor->id)
            ->where('status', 'canceled')
            ->count();

        $doctorReviews = Review::where('doctor_id', $doctor->id)
            ->get();

        return view('doctor.dashboard', compact(
            'todayAppointments', 'upcomingAppointments',
            'weeklyPatientCount', 'confirmedAppointmentsCount',
            'canceledAppointmentsCount', 'doctorReviews'
        ));
    }

    public function edit()
    {
        $doctor = auth()->user()->doctor;

        if (!$doctor) {
            return redirect()->route('home')->with('error', 'لم يتم تسجيل بياناتك كطبيب بعد. الرجاء التواصل مع الإدارة.');
        }

        return view('doctor.edit', compact('doctor'));
    }

    public function update(Request $request)
    {
        $doctor = auth()->user()->doctor;

        if (!$doctor) {
            return redirect()->route('home')->with('error', 'لم يتم تسجيل بياناتك كطبيب بعد. الرجاء التواصل مع الإدارة.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'specialty' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'skills' => 'nullable|string',
            'educational_qualifications' => 'nullable|string',
            'experience' => 'nullable|string',
            'working_days' => 'nullable|string',
            'expertise_area' => 'nullable|string',
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($doctor->profile_picture && file_exists(public_path('uploads/doctors/' . $doctor->profile_picture))) {
                unlink(public_path('uploads/doctors/' . $doctor->profile_picture));
            }

            $image = $request->file('profile_picture');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/doctors'), $filename);

            $doctor->profile_picture = $filename;
        }

        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->specialty = $request->specialty;
        $doctor->phone = $request->phone;
        $doctor->description = $request->description;
        $doctor->skills = $request->skills;
        $doctor->educational_qualifications = $request->educational_qualifications;
        $doctor->experience = $request->experience;
        $doctor->working_days = $request->working_days;
        $doctor->expertise_area = $request->expertise_area;

        $doctor->save();

        return redirect()->route('doctor.dashboard')->with('success', 'تم تحديث بياناتك بنجاح');
    }


    

}
