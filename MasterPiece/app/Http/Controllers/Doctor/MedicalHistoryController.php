<?php

// namespace App\Http\Controllers;

// use App\Models\MedicalHistory;
// use App\Models\MedicalRecord;

// use App\Models\User;
// use Illuminate\Http\Request;

// class DoctorController extends Controller
// {
//     public function showPatientHistory($userId)
//     {
//         $user = User::findOrFail($userId);
//         $medicalHistories = $user->medicalHistories()->latest()->get();
//         $medicalHistories = MedicalHistory::where('user_id', $userId)->latest()->get();
//         return view('doctor.medical_history_show', compact('user', 'medicalHistories'));
//     }


// }
