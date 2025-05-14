<?php

namespace App\Http\Controllers;
use App\Models\MedicalHistory;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
   

public function create()
{
    return view('user-account.medical-history');
}
public function store(Request $request)
{
    $request->validate([
        'chronic_diseases' => 'nullable|string',
        'current_medications' => 'nullable|string',
        'allergies' => 'nullable|string',
        'past_surgeries' => 'nullable|string',
        'is_pregnant' => 'nullable|boolean',
        'family_history' => 'nullable|string',
        'lifestyle' => 'nullable|string',
        'mental_health_notes' => 'nullable|string',
        'additional_notes' => 'nullable|string',
    ]);

    MedicalHistory::create([
        'user_id' => auth()->id(),
        'chronic_diseases' => $request->chronic_diseases,
        'current_medications' => $request->current_medications,
        'allergies' => $request->allergies,
        'past_surgeries' => $request->past_surgeries,
        'is_pregnant' => $request->is_pregnant,
        'family_history' => $request->family_history,
        'lifestyle' => $request->lifestyle,
        'mental_health_notes' => $request->mental_health_notes,
        'additional_notes' => $request->additional_notes,
    ]);

    return redirect()->back()->with('success', 'The medical record was saved successfully');
}
    

}
