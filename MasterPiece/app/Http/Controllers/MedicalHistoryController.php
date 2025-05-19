<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MedicalHistoryController extends Controller
{
    public function showMyHistory()
    {
        $user = auth()->user();
        $history = MedicalHistory::where('user_id', auth()->id())->first();

        return view('user-account.medical-history', compact('history'));
    }

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
    public function medicalHistoryForm()
    {
        $user = Auth::user();
        $history = MedicalHistory::where('user_id', $user->id)->first();
        return view('user-account.medical-history', compact('history'));
    }


    public function update(Request $request, $id)
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

        $history = MedicalHistory::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $history->update([
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

        return redirect()->back()->with('success', 'Medical history updated successfully.');
    }

    public function showMedicalHistoryForDoctor($userId)
    {
        $history = MedicalHistory::where('user_id', $userId)->first();

        if (!$history) {
            return redirect()->back()->with('error', 'No medical history found for this patient.');
        }

        return view('doctor.medical_history_show', compact('history'));
    }
}
