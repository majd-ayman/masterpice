<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Carbon\Carbon;  
use Illuminate\Support\Facades\DB;
use App\Notifications\NewAppointmentNotification;

class AppointmentController extends Controller
{
    public function showForm()
    {
        $clinics = Clinic::all();  
        $doctors = Doctor::all();  
        return view('appointment', compact('clinics', 'doctors'));
    }



    public function create(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to book an appointment.');
        }
    
        $patientId = auth()->user()->id;
    
        $request->validate([
            'clinic_id' => 'required|exists:clinics,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
        ]);
    
        $doctorId = $request->doctor_id;
        $appointmentDate = $request->appointment_date;
        $appointmentTime = $request->appointment_time;
    
        $existingAppointmentForSameDay = Appointment::where('user_id', $patientId)
                                                    ->where('doctor_id', $doctorId)
                                                    ->where('appointment_date', $appointmentDate)
                                                    ->first();
    
        if ($existingAppointmentForSameDay) {
            return redirect()->back()->with('error', 'You cannot book more than one appointment with the same doctor on the same day.');
        }
    
        $existingAppointment = Appointment::where('doctor_id', $doctorId)
                                          ->where('appointment_date', $appointmentDate)
                                          ->where('appointment_time', $appointmentTime)
                                          ->first();
    
        if ($existingAppointment) {
            return redirect()->back()->with('error', 'This time slot is already booked. Please choose a different time.');
        }
    
        $conflictAppointment = Appointment::where('user_id', $patientId)
                                          ->where('appointment_date', $appointmentDate)
                                          ->where('appointment_time', $appointmentTime)
                                          ->first();
    
        if ($conflictAppointment) {
            return redirect()->back()->with('error', 'You already have another appointment at this time.');
        }
    
        $originalTime = Carbon::createFromFormat('H:i', $appointmentTime);
        $reminderTime = $originalTime->subMinutes(10)->format('H:i');
    
        $appointment = Appointment::create([
            'user_id' => $patientId,
            'clinic_id' => $request->clinic_id,
            'doctor_id' => $doctorId,
            'appointment_date' => $appointmentDate,
            'appointment_time' => $appointmentTime,
            'name' => $request->name,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'status' => 'scheduled',
        ]);

        
        // Send notification to the doctor

       $doctor = Doctor::with('user')->find($doctorId); 
       if ($doctor && $doctor->user) {
           $doctor->user->notify(new NewAppointmentNotification($appointment));
       }

       return redirect()->route('appointment.form')->with('success', "Appointment booked successfully. Please arrive at $reminderTime to avoid cancellation.");
   }

    
    public function getDoctors($clinicId)
    {
        $doctors = Doctor::where('clinic_id', $clinicId)->get();
        return response()->json($doctors);  
    }






    public function getAvailableTimes($doctorId, $date)
    {
        $selectedDate = Carbon::parse($date)->startOfDay();
        $today = Carbon::today();
    
        if ($selectedDate < $today) {
            return response()->json(['error' => 'Invalid date.'], 400);
        }
    
        $start = Carbon::createFromTimeString('08:00');
        $end = Carbon::createFromTimeString('13:00');
    
        $allSlots = [];
        while ($start <= $end->copy()->subMinutes(30)) {
            $allSlots[] = $start->format('H:i');
            $start->addMinutes(30);
        }
    
        $bookedSlotsRaw = DB::table('appointments')
            ->where('doctor_id', $doctorId)
            ->whereDate('appointment_date', $date)
            ->where('status', 'scheduled') 

            ->pluck('appointment_time');
    
        $bookedSlots = $bookedSlotsRaw->map(function ($time) {
            return Carbon::createFromFormat('H:i:s', $time)->format('H:i');
        })->toArray();
    
        $availableSlots = array_diff($allSlots, $bookedSlots);
    
        return response()->json(array_values($availableSlots));
    }
    






    public function edit($id)
    {
        $appointment = Appointment::with(['doctor', 'user', 'clinic'])->findOrFail($id);
    
        return view('user-account.appointments-edit', compact('appointment'));
    }
    





    public function update(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);

    $appointment->appointment_date = $request->input('appointment_date');
    $appointment->appointment_time = $request->input('appointment_time');
    $appointment->notes = $request->input('notes');
    
    $appointment->save();

    return redirect()->route('user-account.my-account')->with('success', 'Appointment updated successfully!');
}










 

    public function cancel($id)
{
    $appointment = Appointment::findOrFail($id);

    if ($appointment->user_id !== auth()->id()) {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    $appointment->status = 'canceled';
    $appointment->save();

    return redirect()->back()->with('success', 'Appointment canceled successfully.');
}



}
