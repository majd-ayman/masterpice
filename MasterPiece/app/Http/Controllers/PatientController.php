<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PatientController extends Controller
{
    public function showMyAccount()
    {
        $patient = Auth::user();
        $medicalRecord = MedicalRecord::where('patient_id', $patient->id)->latest()->first();

        return view('patient.my-account', compact('patient', 'medicalRecord'));
    }

    public function downloadPdf($id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);

        $pdf = Pdf::loadView('pdf.patient_result', compact('medicalRecord'));

        return $pdf->download('patient-result.pdf');
    }
}
