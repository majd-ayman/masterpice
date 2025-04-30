<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Carbon\Carbon;  

use Illuminate\Support\Facades\DB;
class AppointmentController extends Controller
{
    public function showForm()
    {
        $clinics = Clinic::all();  
        $doctors = Doctor::all();  
        return view('appointment', compact('clinics', 'doctors'));
    }

    // Function to handle appointment booking
    public function create(Request $request)
    {
        if (auth()->check()) {
            $patientId = auth()->user()->id; 
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to book an appointment.');
        }







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

        $existingAppointment = Appointment::where('doctor_id', $doctorId)
                                          ->where('appointment_date', $appointmentDate)
                                          ->where('appointment_time', $appointmentTime)
                                          ->first();

        if ($existingAppointment) {
            return redirect()->back()->with('error', 'This time slot is already booked. Please choose a different time.');
        }

        $originalTime = Carbon::createFromFormat('H:i', $appointmentTime);
        $reminderTime = $originalTime->subMinutes(10)->format('H:i');  

        Appointment::create([
            'user_id' => auth()->user()->id,  
            'clinic_id' => $request->clinic_id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $appointmentDate,
            'appointment_time' => $appointmentTime,
            'name' => $request->name,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'status' => 'scheduled',  
        ]);

        return redirect()->route('appointment.form')->with('success', "Appointment booked successfully. Please arrive at $reminderTime to avoid cancellation.");
    }

    public function getDoctors($clinicId)
    {
        $doctors = Doctor::where('clinic_id', $clinicId)->get();
        return response()->json($doctors);  
    }



    

    public function getAvailableTimes($doctorId, $date)
    {
        $start = Carbon::createFromTimeString('08:00');
        $end = Carbon::createFromTimeString('13:00');
    
        $allSlots = [];
        while ($start < $end) {
            $allSlots[] = $start->format('H:i');
            $start->addMinutes(30);
        }
    
        $bookedSlotsRaw = DB::table('appointments')
            ->where('doctor_id', $doctorId)
            ->whereDate('appointment_date', $date)
            ->pluck('appointment_time');
    
        $bookedSlots = $bookedSlotsRaw->map(function ($time) {
            return Carbon::createFromFormat('H:i:s', $time)->format('H:i');
        })->toArray();
    
        $availableSlots = array_diff($allSlots, $bookedSlots);
    
        return response()->json(array_values($availableSlots));
    }
    
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('success', 'Appointment deleted successfully.');
    }
}
