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
use App\Models\MedicalRecord;
use App\Models\MedicalHistory;
use App\Models\User;
use App\Notifications\MedicalRecordAddedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
class DashboardController extends Controller
{
    public function index()
    {
        $doctor = auth()->user()->doctor;

        if (!$doctor) {
            return redirect()->route('home')->with('error', 'Your data has not been registered as a doctor yet. Please contact the administration.');
        }

        // $todayAppointments = Appointment::where('doctor_id', $doctor->id)
        //     ->whereDate('appointment_date', Carbon::today())
        //     ->get();



$todayAppointments = Appointment::where('doctor_id', $doctor->id)
    ->whereDate('appointment_date', Carbon::today())
    ->whereNotIn('status', ['canceled', 'cancelled'])  
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
            ->where('status', 'scheduled')
            ->count();

        $canceledAppointmentsCount = Appointment::where('doctor_id', $doctor->id)
            ->where('status', 'canceled')
            ->count();

        $doctorReviews = Review::where('doctor_id', $doctor->id)
            ->get();
     $pastAppointments = Appointment::where('doctor_id', $doctor->id)
    ->whereDate('appointment_date', '<', now()->toDateString())
    ->orderBy('appointment_date', 'desc')
    ->with(['user']) 
    ->get();



        return view('doctor.dashboard', compact(
            'todayAppointments',
            'upcomingAppointments',
            'weeklyPatientCount',
            'confirmedAppointmentsCount',
            'canceledAppointmentsCount',
                'pastAppointments' ,

            'doctorReviews'
        ));
    }

    public function edit()
    {
        $doctor = auth()->user()->doctor;

        if (!$doctor) {
            return redirect()->route('home')->with('error', 'Your data has not been registered as a doctor yet. Please contact the administration.');
        }

        return view('doctor.edit', compact('doctor'));
    }

    public function update(Request $request)
    {
        $doctor = auth()->user()->doctor;

        if (!$doctor) {
            return redirect()->route('home')->with('error', 'Your data has not been registered as a doctor yet. Please contact the administration.');
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

        return redirect()->route('doctor.dashboard')->with('success', 'Your data was updated successfully');
    }



    public function create($appointmentId)
    {
        $appointment = Appointment::with('user')->findOrFail($appointmentId);

        return view('doctor.create_medical_record', compact('appointment'));
    }


    

   public function store(Request $request)
{
    $request->validate([
        'appointment_id' => 'required|exists:appointments,id',
        'diagnosis' => 'required|string',
        'prescription' => 'nullable|string',
        'treatment' => 'nullable|string',
        'record_date' => 'required|date',
        'diagnosis_date' => 'nullable|date',
        'follow_up' => 'nullable|date',
        'image' => 'nullable|image|max:2048',
    ]);

    $appointment = Appointment::findOrFail($request->appointment_id);

    $record = new MedicalRecord();
    $record->user_id = $appointment->user_id;
    $record->doctor_id = $appointment->doctor_id;
    $record->appointment_id = $appointment->id;
    $record->diagnosis = $request->diagnosis;
    $record->prescription = $request->prescription;
    $record->treatment = $request->treatment;
    $record->record_date = $request->record_date;
    $record->diagnosis_date = $request->diagnosis_date;
    $record->follow_up = $request->follow_up;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('medical_records', $imageName, 'public');
        $record->image = $imageName;
    }

    $record->save();

    // ✅ إرسال الإشعار للمريض
    $appointment->user->notify(new MedicalRecordAddedNotification($appointment));

    // ✅ فقط واحد return في النهاية
    return redirect()->route('doctor.dashboard')->with('success', 'تم حفظ السجل الطبي وإشعار المريض.');
}




    public function showMedicalHistories($doctorId)
    {
        $doctor = Doctor::findOrFail($doctorId);

        $appointments = Appointment::where('doctor_id', $doctor->id)->pluck('id');

        $medicalHistories = MedicalHistory::whereIn('appointment_id', $appointments)->get();

        return view('doctor.medical_histories', compact('medicalHistories', 'appointments'));
    }



    public function show($userId)
    {
        $user = User::findOrFail($userId);

        $history = MedicalHistory::where('user_id', $userId)->latest()->first();

        return view('doctor.medical_history_show', compact('user', 'history'));
    }
      public function showPatientHistory($userId)
    {
        $user = User::findOrFail($userId);
        $medicalHistories = $user->medicalHistories()->latest()->get();
        $medicalHistories = MedicalHistory::where('user_id', $userId)->latest()->get();
        return view('doctor.medical_history_show', compact('user', 'medicalHistories'));
 
    }
    public function markCompleted(Appointment $appointment)
{
    if ($appointment->status !== 'scheduled') {
        return back()->with('error', 'Only scheduled appointments can be marked as completed.');
    }

    $appointment->status = 'completed';
    $appointment->save();

    return back()->with('success', 'Appointment marked as completed.');
}
}
