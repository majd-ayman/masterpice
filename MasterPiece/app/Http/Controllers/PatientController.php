<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\MedicalRecord;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
class PatientController extends Controller
{
    public function showMyAccount()
    {

if (!Auth::check()) {
return redirect()->route('login')->with('error', 'Session expired, please log in again.');
}



        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::check() && Auth::user()->role == 'superadmen') {
            return redirect()->route('superAdmin.dashboard');
        }
        if (Auth::check() && Auth::user()->role == 'doctor') {
            return redirect()->route('doctor.dashboard');
        }
        $user = Auth::user();
        $medicalRecord = MedicalRecord::where('user_id', $user->id)->latest()->first();



        $appointments = Appointment::where('user_id', auth()->id())
                                ->where('status', 'scheduled') 
                                ->with(['doctor', 'clinic'])
                                ->orderBy('appointment_date', 'asc')
                                ->get();
        return view('user-account.my-account', compact('user', 'medicalRecord', 'appointments'));
    }


    
    public function updateProfile(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'gender' => 'required|string|in:male,female',
            'age' => 'nullable|integer|min:0',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && Storage::exists('public/profile_pictures/' . $user->profile_picture)) {
                Storage::delete('public/profile_pictures/' . $user->profile_picture);
            }

            $profilePicture = $request->file('profile_picture');
            $profilePicturePath = $profilePicture->store('profile_pictures', 'public');
            $user->profile_picture = basename($profilePicturePath);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->age = $request->age; 


        $user->save();
        

        return redirect()->route('user-account.my-account')->with('success', 'Profile updated successfully!');
    }




    public function editProfile()
{
    $user = Auth::user();
    return view('user-account.edit-profile', compact('user')); 
}

public function destroy($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();

    return redirect()->back()->with('success', 'Appointment deleted successfully.');
}



public function deleteProfilePicture()
{
    $user = auth()->user();

    if ($user->profile_picture && Storage::exists('public/profile_pictures/' . $user->profile_picture)) {
        Storage::delete('public/profile_pictures/' . $user->profile_picture);

        $user->profile_picture = null;
        $user->save();
        
        return back()->with('success', 'Profile picture deleted successfully.');
    }

    return back()->with('error', 'No profile picture found to delete.');
}




public function myAccount()
{
    $user = Auth::user();
    $appointments = Appointment::with(['doctor', 'medicalRecord'])
        ->where('user_id', $user->id)
        ->orderBy('appointment_date', 'desc')
        ->get();

    return view('user-account.my-account', compact('user', 'appointments'));
}






public function showMyHistory()
{
    $user = auth()->user();
    $medicalHistory = $user->medicalHistory()->latest()->first(); // آخر سجل طبي مسجل

    return view('user.medical_history_show', compact('medicalHistory'));
}




}


