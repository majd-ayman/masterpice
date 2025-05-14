<?php

namespace App\Http\Controllers\Superadmen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\Department;
use App\Models\User;

class DoctorManagementController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['clinic', 'department', 'user'])->get();
        return view('superAdmin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $clinics = Clinic::all();
        $departments = Department::all();
        return view('superAdmin.doctors.create', compact('clinics', 'departments'));
    }
   
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'clinic_id' => 'required|exists:clinics,id',
            'department_id' => 'required|exists:departments,id',
            'phone' => 'nullable|string|max:20',
            'specialty' => 'nullable|string|max:100',
            'available_from' => 'nullable|date_format:H:i',
            'available_to' => 'nullable|date_format:H:i',
            'image' => 'nullable|image',
        ]);
    // |mimes:jpg,jpeg,png|max:2048'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'doctor',
        ]);
    
        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/team'), $fileName);
        }
    
        Doctor::create([
            'user_id' => $user->id,
            'clinic_id' => $request->clinic_id,
            'department_id' => $request->department_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'specialty' => $request->specialty,
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
            'image' => $fileName, 
        ]);
    
        return redirect()->route('superAdmin.doctors.index')->with('success', 'Doctor added successfully');
    }
    
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $clinics = Clinic::all();
        $departments = Department::all();
        $users = User::all();
        return view('superAdmin.doctors.edit', compact('doctor', 'clinics', 'departments','users'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'user_id' => 'required|exists:users,id|unique:doctors,user_id,' . $doctor->id,
            'clinic_id' => 'required|exists:clinics,id|unique:doctors,clinic_id,' . $doctor->id,
            'department_id' => 'required|exists:departments,id',
            'specialty' => 'required|string|max:100',
            'available_from' => 'required|date_format:H:i',
            'available_to' => 'required|date_format:H:i',
            'description' => 'nullable|string',
            'skills' => 'nullable|string',
            'educational_qualifications' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'experience' => 'nullable|integer',
            'working_days' => 'nullable|json',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/team'), $fileName);
            $data['image'] = $fileName;
        }


        $doctor->update($data);

        return redirect()->route('superAdmin.doctors.index')->with('success', 'Doctor updated successfully');
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('superAdmin.doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
