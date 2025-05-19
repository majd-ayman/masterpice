<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PatientResultNotification;

class MedicalRecordController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'diagnosis' => 'required',
            'prescription' => 'nullable',
            'treatment' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $medicalRecord = MedicalRecord::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'diagnosis' => $request->diagnosis,
            'prescription' => $request->prescription,
            'treatment' => $request->treatment,
            'image' => $request->hasFile('image') ? $request->file('image')->store('medical_images', 'public') : null,
        ]);

        // إرسال الإشعار للبريد الإلكتروني للمريض
        $patient = User::find($request->patient_id);
        $patient->notify(new PatientResultNotification($medicalRecord));

return redirect()->back()->with('message', 'Scan result added');    }
}
